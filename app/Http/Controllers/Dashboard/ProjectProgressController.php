<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProjectProgressAttachment;
use App\Models\ProjectProgressReport;
use App\Support\ImageUploader;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class ProjectProgressController extends Controller
{
    public function index(Request $request)
    {
        $reports = ProjectProgressReport::query()
            ->withCount('attachments')
            ->when($request->filled('q'), function ($query) use ($request) {
                $q = trim((string) $request->query('q'));

                $query->where(function ($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                        ->orWhere('project_name', 'like', "%{$q}%")
                        ->orWhere('client_name', 'like', "%{$q}%")
                        ->orWhere('project_code', 'like', "%{$q}%")
                        ->orWhere('report_number', 'like', "%{$q}%");
                });
            })
            ->latest('report_date')
            ->latest('id')
            ->paginate(12);

        $reports->appends($request->query());

        return view('dashboard.project-progress.index', compact('reports'));
    }

    public function create()
    {
        return view('dashboard.project-progress.form', [
            'report' => new ProjectProgressReport([
                'overall_progress' => 0,
                'report_date' => today(),
                'modules' => [
                    ['module_scope' => '', 'feature_description' => '', 'status' => 'Dalam Proses', 'deliverable_notes' => ''],
                ],
                'action_items' => [],
            ]),
        ]);
    }

    public function store(Request $request)
    {
        $report = ProjectProgressReport::create($this->validated($request));
        $this->syncAttachments($request, $report);

        return redirect()->route('dashboard.progres.edit', $report)->with('success', 'Laporan progres proyek berhasil dibuat.');
    }

    public function edit(ProjectProgressReport $progres)
    {
        if (empty($progres->modules)) {
            $progres->modules = [
                ['module_scope' => '', 'feature_description' => '', 'status' => 'Dalam Proses', 'deliverable_notes' => ''],
            ];
        }

        $progres->load('attachments');

        return view('dashboard.project-progress.form', ['report' => $progres]);
    }

    public function update(Request $request, ProjectProgressReport $progres)
    {
        $progres->update($this->validated($request));
        $this->syncAttachments($request, $progres);

        return redirect()->route('dashboard.progres.edit', $progres)->with('success', 'Laporan progres proyek berhasil diperbarui.');
    }

    public function destroy(ProjectProgressReport $progres)
    {
        $title = $progres->title;
        $progres->delete();

        return redirect()->route('dashboard.progres.index')->with('success', "Laporan '{$title}' berhasil dihapus.");
    }

    public function pdf(ProjectProgressReport $progres)
    {
        set_time_limit(300);
        ini_set('memory_limit', '512M');

        $progres->load('attachments');

        $pdf = Pdf::loadView('dashboard.project-progress.pdf', [
            'report' => $progres,
            'formattedDate' => optional($progres->report_date)->translatedFormat('d M Y'),
        ])->setPaper('a4');

        $filename = 'progres-proyek-'.str($progres->project_code ?: $progres->project_name)->slug().'-'.$progres->id.'.pdf';

        return $pdf->download($filename);
    }

    protected function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'report_number' => ['nullable', 'string', 'max:50'],
            'project_name' => ['required', 'string', 'max:200'],
            'project_code' => ['nullable', 'string', 'max:120'],
            'client_name' => ['required', 'string', 'max:200'],
            'development_period' => ['required', 'string', 'max:200'],
            'main_status' => ['required', 'string', 'max:200'],
            'overall_progress' => ['required', 'integer', 'between:0,100'],
            'report_date' => ['nullable', 'date'],
            'prepared_by_name' => ['nullable', 'string', 'max:150'],
            'prepared_by_title' => ['nullable', 'string', 'max:150'],
            'modules' => ['required', 'array', 'min:1'],
            'modules.*.module_scope' => ['required', 'string', 'max:200'],
            'modules.*.feature_description' => ['required', 'string', 'max:500'],
            'modules.*.status' => ['required', Rule::in(['Selesai', 'Dalam Proses', 'Belum Dimulai'])],
            'modules.*.deliverable_notes' => ['nullable', 'string', 'max:500'],
            'action_items_text' => ['nullable', 'string', 'max:6000'],
            'existing_attachment_captions' => ['nullable', 'array'],
            'existing_attachment_captions.*' => ['nullable', 'string', 'max:500'],
            'delete_attachments' => ['nullable', 'array'],
            'delete_attachments.*' => ['integer'],
            'new_attachments' => ['nullable', 'array'],
            'new_attachments.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'new_attachments_captions' => ['nullable', 'array'],
            'new_attachments_captions.*' => ['nullable', 'string', 'max:500'],
        ]);

        $items = preg_split('/\r\n|\r|\n/', trim((string) $request->input('action_items_text')));
        $data['action_items'] = collect($items)->map(fn ($item) => trim($item))->filter()->values()->all();
        unset($data['action_items_text']);

        return $data;
    }

    protected function syncAttachments(Request $request, ProjectProgressReport $report): void
    {
        $report->loadMissing('attachments');
        $attachmentIds = $report->attachments->pluck('id')->all();

        $captionInputs = Arr::wrap($request->input('existing_attachment_captions', []));

        foreach ($report->attachments as $attachment) {
            if (array_key_exists($attachment->id, $captionInputs)) {
                $attachment->update([
                    'caption' => trim((string) $captionInputs[$attachment->id]) ?: null,
                ]);
            }
        }

        $deleteIds = collect(Arr::wrap($request->input('delete_attachments', [])))
            ->map(fn ($id) => (int) $id)
            ->filter(fn ($id) => in_array($id, $attachmentIds, true));

        if ($deleteIds->isNotEmpty()) {
            ProjectProgressAttachment::whereIn('id', $deleteIds->all())->get()->each->delete();
        }

        $files = Arr::wrap($request->file('new_attachments', []));
        $newCaptions = Arr::wrap($request->input('new_attachments_captions', []));
        $sortOrder = (int) $report->attachments()->max('sort_order');

        foreach ($files as $index => $file) {
            if (! $file) {
                continue;
            }

            $stored = ImageUploader::store($file, 'project-progress/'.$report->id.'/attachments', 2000, 1000);
            $sortOrder++;

            $report->attachments()->create($stored + [
                'caption' => trim((string) ($newCaptions[$index] ?? '')) ?: null,
                'sort_order' => $sortOrder,
            ]);
        }
    }
}
