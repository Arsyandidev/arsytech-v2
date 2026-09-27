<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $galleries = Gallery::with('cover')
            ->withCount('photos')
            ->when($request->filled('q'), fn ($query) => $query->where('title', 'like', '%'.$request->query('q').'%'))
            ->latestEvent()
            ->paginate(12)
            ->withQueryString();

        return view('dashboard.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('dashboard.galleries.form', ['gallery' => new Gallery(['event_date' => today()])]);
    }

    public function store(Request $request)
    {
        $gallery = new Gallery();
        $this->save($request, $gallery);

        return redirect()->route('dashboard.galeri.edit', $gallery)->with('success', 'Album dibuat. Sekarang tambahkan foto-fotonya.');
    }

    public function edit(Gallery $gallery)
    {
        $gallery->load('photos');

        return view('dashboard.galleries.form', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $this->save($request, $gallery);

        return redirect()->route('dashboard.galeri.edit', $gallery)->with('success', 'Detail album sudah disimpan.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->photos->each->delete();
        $gallery->delete();

        return redirect()->route('dashboard.galeri.index')->with('success', 'Album "'.$gallery->title.'" beserta fotonya sudah dihapus.');
    }

    protected function save(Request $request, Gallery $gallery): void
    {
        $request->merge(['slug' => Str::slug($request->input('slug') ?: $request->input('title'))]);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:200', Rule::unique('galleries', 'slug')->ignore($gallery->id)],
            'description' => ['nullable', 'string', 'max:5000'],
            'event_date' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $data['is_published'] = $request->boolean('is_published');

        $gallery->fill($data)->save();
    }
}
