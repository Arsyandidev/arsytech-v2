@extends('layouts.dashboard')

@section('title', $report->exists ? 'Ubah progres proyek' : 'Buat progres proyek')

@section('crumbs')
  <a href="{{ route('dashboard.progres.index') }}">Progres proyek</a> / {{ $report->exists ? \Illuminate\Support\Str::limit($report->title, 40) : 'Laporan baru' }}
@endsection

@section('actions')
  @if ($report->exists)
    <a href="{{ route('dashboard.progres.pdf', $report) }}" class="btn btn-soft"><i class="bi bi-file-earmark-pdf me-1"></i> Generate PDF</a>
  @endif
@endsection

@section('content')
@php
  $statusOptions = ['Selesai', 'Dalam Proses', 'Belum Dimulai'];
  $modules = old('modules', $report->modules ?? [['module_scope' => '', 'feature_description' => '', 'status' => 'Dalam Proses', 'deliverable_notes' => '']]);
  $actionItemsText = old('action_items_text', is_array($report->action_items) ? implode("\n", $report->action_items) : '');
@endphp

<form method="post" action="{{ $report->exists ? route('dashboard.progres.update', $report) : route('dashboard.progres.store') }}" enctype="multipart/form-data" novalidate>
  @csrf
  @if ($report->exists)
    @method('PUT')
  @endif

  <div class="row g-4">
    <div class="col-xl-8">
      <div class="panel mb-4">
        <div class="panel-head"><h2>Informasi laporan</h2></div>
        <div class="panel-body">
          <div class="row g-3">
            <div class="col-md-7">
              <label class="form-label" for="title">Judul laporan</label>
              <input type="text" @class(['form-control', 'is-invalid' => $errors->has('title')]) id="title" name="title" value="{{ old('title', $report->title) }}" maxlength="200" required>
              @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-5">
              <label class="form-label" for="report_number">Nomor progres</label>
              <input type="text" @class(['form-control', 'is-invalid' => $errors->has('report_number')]) id="report_number" name="report_number" value="{{ old('report_number', $report->report_number) }}" maxlength="50" placeholder="Contoh: #02">
              @error('report_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
              <label class="form-label" for="project_name">Nama proyek</label>
              <input type="text" @class(['form-control', 'is-invalid' => $errors->has('project_name')]) id="project_name" name="project_name" value="{{ old('project_name', $report->project_name) }}" maxlength="200" required>
              @error('project_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
              <label class="form-label" for="project_code">Kode proyek</label>
              <input type="text" @class(['form-control', 'is-invalid' => $errors->has('project_code')]) id="project_code" name="project_code" value="{{ old('project_code', $report->project_code) }}" maxlength="120">
              @error('project_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
              <label class="form-label" for="client_name">Klien</label>
              <input type="text" @class(['form-control', 'is-invalid' => $errors->has('client_name')]) id="client_name" name="client_name" value="{{ old('client_name', $report->client_name) }}" maxlength="200" required>
              @error('client_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
              <label class="form-label" for="development_period">Periode pengembangan</label>
              <input type="text" @class(['form-control', 'is-invalid' => $errors->has('development_period')]) id="development_period" name="development_period" value="{{ old('development_period', $report->development_period) }}" maxlength="200" placeholder="Contoh: Minggu ke-3 (19 Sep - 26 Sep 2026)" required>
              @error('development_period')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
              <label class="form-label" for="main_status">Status utama</label>
              <input type="text" @class(['form-control', 'is-invalid' => $errors->has('main_status')]) id="main_status" name="main_status" value="{{ old('main_status', $report->main_status) }}" maxlength="200" placeholder="Contoh: On-Schedule (Sesuai Timeline)" required>
              @error('main_status')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-3">
              <label class="form-label" for="overall_progress">Total progres (%)</label>
              <input type="number" @class(['form-control', 'is-invalid' => $errors->has('overall_progress')]) id="overall_progress" name="overall_progress" min="0" max="100" value="{{ old('overall_progress', $report->overall_progress) }}" required>
              @error('overall_progress')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-3">
              <label class="form-label" for="report_date">Tanggal laporan</label>
              <input type="date" @class(['form-control', 'is-invalid' => $errors->has('report_date')]) id="report_date" name="report_date" value="{{ old('report_date', optional($report->report_date)->format('Y-m-d')) }}">
              @error('report_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
          </div>
        </div>
      </div>

      <div class="panel mb-4">
        <div class="panel-head d-flex justify-content-between align-items-center">
          <h2>Status modul & fitur</h2>
          <button type="button" class="btn btn-sm btn-soft" id="addModule"><i class="bi bi-plus-lg me-1"></i> Tambah baris</button>
        </div>
        <div class="panel-body pt-0">
          @error('modules')<div class="text-danger small mb-2">{{ $message }}</div>@enderror
          <div class="table-responsive">
            <table class="table dash-table" id="modulesTable">
              <thead>
                <tr>
                  <th>Modul / scope</th>
                  <th>Sub-fitur / deskripsi</th>
                  <th>Status</th>
                  <th>Catatan / deliverable</th>
                  <th class="text-end">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($modules as $idx => $module)
                  <tr>
                    <td>
                      <input type="text" @class(['form-control form-control-sm', 'is-invalid' => $errors->has("modules.$idx.module_scope")]) name="modules[{{ $idx }}][module_scope]" value="{{ old("modules.$idx.module_scope", $module['module_scope'] ?? '') }}" required>
                    </td>
                    <td>
                      <input type="text" @class(['form-control form-control-sm', 'is-invalid' => $errors->has("modules.$idx.feature_description")]) name="modules[{{ $idx }}][feature_description]" value="{{ old("modules.$idx.feature_description", $module['feature_description'] ?? '') }}" required>
                    </td>
                    <td>
                      <select @class(['form-select form-select-sm', 'is-invalid' => $errors->has("modules.$idx.status")]) name="modules[{{ $idx }}][status]" required>
                        @foreach ($statusOptions as $status)
                          <option value="{{ $status }}" @selected(old("modules.$idx.status", $module['status'] ?? 'Dalam Proses') === $status)>{{ $status }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <input type="text" @class(['form-control form-control-sm', 'is-invalid' => $errors->has("modules.$idx.deliverable_notes")]) name="modules[{{ $idx }}][deliverable_notes]" value="{{ old("modules.$idx.deliverable_notes", $module['deliverable_notes'] ?? '') }}">
                    </td>
                    <td class="text-end">
                      <button type="button" class="btn btn-icon btn-soft-danger js-remove-row" title="Hapus baris"><i class="bi bi-trash3"></i></button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="panel mb-4">
        <div class="panel-head"><h2>Action items / kebutuhan dari klien</h2></div>
        <div class="panel-body">
          <textarea @class(['form-control', 'is-invalid' => $errors->has('action_items_text')]) name="action_items_text" rows="6" placeholder="Tulis satu poin per baris.">{{ $actionItemsText }}</textarea>
          @error('action_items_text')<div class="invalid-feedback">{{ $message }}</div>@enderror
          <div class="form-hint">Setiap baris akan tampil sebagai bullet list di PDF.</div>
        </div>
      </div>

      <div class="panel mb-4">
        <div class="panel-head"><h2>Lampiran foto / gambar</h2></div>
        <div class="panel-body">
          @if ($report->exists && $report->attachments->isNotEmpty())
            <div class="row g-3 mb-4">
              @foreach ($report->attachments as $attachment)
                <div class="col-md-6">
                  <div class="border rounded-3 p-2">
                    <img src="{{ $attachment->thumbUrl() }}" alt="Lampiran" class="img-fluid rounded mb-2" style="width:100%;height:180px;object-fit:cover;">
                    <label class="form-label mb-1">Caption</label>
                    <input type="text" class="form-control form-control-sm" name="existing_attachment_captions[{{ $attachment->id }}]" value="{{ old('existing_attachment_captions.'.$attachment->id, $attachment->caption) }}" maxlength="500">
                    <div class="form-check mt-2">
                      <input class="form-check-input" type="checkbox" id="delete_attachment_{{ $attachment->id }}" name="delete_attachments[]" value="{{ $attachment->id }}">
                      <label class="form-check-label small" for="delete_attachment_{{ $attachment->id }}">Hapus lampiran ini</label>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif

          <div id="newAttachmentRows" class="d-grid gap-3"></div>
          <button type="button" class="btn btn-sm btn-soft" id="addAttachmentRow"><i class="bi bi-plus-lg me-1"></i> Tambah lampiran</button>
          @error('new_attachments')<div class="text-danger small mt-2">{{ $message }}</div>@enderror
          @error('new_attachments.*')<div class="text-danger small mt-2">{{ $message }}</div>@enderror
          @error('new_attachments_captions.*')<div class="text-danger small mt-2">{{ $message }}</div>@enderror
          <div class="form-hint mt-2">Format: JPG, PNG, WEBP. Maksimal 10MB per file.</div>
        </div>
      </div>
    </div>

    <div class="col-xl-4">
      <div class="panel mb-4">
        <div class="panel-head"><h2>Penanggung jawab</h2></div>
        <div class="panel-body">
          <div class="mb-3">
            <label class="form-label" for="prepared_by_name">Dibuat oleh (nama)</label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('prepared_by_name')]) id="prepared_by_name" name="prepared_by_name" value="{{ old('prepared_by_name', $report->prepared_by_name) }}" maxlength="150">
            @error('prepared_by_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="prepared_by_title">Dibuat oleh (jabatan)</label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('prepared_by_title')]) id="prepared_by_title" name="prepared_by_title" value="{{ old('prepared_by_title', $report->prepared_by_title) }}" maxlength="150">
            @error('prepared_by_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="panel-foot d-flex gap-2">
          <button type="submit" class="btn btn-brand flex-grow-1">{{ $report->exists ? 'Simpan perubahan' : 'Simpan laporan' }}</button>
        </div>
      </div>

      @if ($report->exists)
        <div class="panel">
          <div class="panel-body d-flex align-items-center justify-content-between gap-2">
            <a href="{{ route('dashboard.progres.pdf', $report) }}" class="btn btn-soft w-100"><i class="bi bi-file-earmark-pdf me-1"></i> Generate PDF</a>
            <button type="button" class="btn btn-soft-danger" data-delete-form="#deleteReport"><i class="bi bi-trash3"></i></button>
          </div>
        </div>
      @endif
    </div>
  </div>
</form>

@if ($report->exists)
  <form method="post" action="{{ route('dashboard.progres.destroy', $report) }}" id="deleteReport" data-confirm="Hapus laporan ini? Data yang dihapus tidak bisa dikembalikan.">
    @csrf
    @method('DELETE')
  </form>
@endif
@endsection

@push('scripts')
<script>
  (function () {
    const table = document.querySelector('#modulesTable tbody');
    const addBtn = document.getElementById('addModule');

    if (!table || !addBtn) {
      return;
    }

    const statusOptions = @json($statusOptions);

    const bindRemoveButtons = () => {
      table.querySelectorAll('.js-remove-row').forEach((btn) => {
        btn.onclick = () => {
          if (table.querySelectorAll('tr').length === 1) {
            return;
          }
          btn.closest('tr').remove();
          reindexRows();
        };
      });
    };

    const attachmentRows = document.getElementById('newAttachmentRows');
    const addAttachmentBtn = document.getElementById('addAttachmentRow');
    let attachmentIndex = 0;

    const createAttachmentRow = () => {
      const row = document.createElement('div');
      row.className = 'border rounded-3 p-3';
      row.innerHTML = `
        <div class="row g-2 align-items-end">
          <div class="col-md-6">
            <label class="form-label mb-1">File gambar</label>
            <input type="file" class="form-control form-control-sm" name="new_attachments[${attachmentIndex}]" accept="image/jpeg,image/png,image/webp">
          </div>
          <div class="col-md-5">
            <label class="form-label mb-1">Caption</label>
            <input type="text" class="form-control form-control-sm" name="new_attachments_captions[${attachmentIndex}]" maxlength="500" placeholder="Caption gambar...">
          </div>
          <div class="col-md-1 d-grid">
            <button type="button" class="btn btn-soft-danger btn-sm js-remove-attachment"><i class="bi bi-trash3"></i></button>
          </div>
        </div>
      `;

      row.querySelector('.js-remove-attachment').addEventListener('click', () => row.remove());
      attachmentRows.appendChild(row);
      attachmentIndex++;
    };

    const reindexRows = () => {
      table.querySelectorAll('tr').forEach((tr, idx) => {
        tr.querySelectorAll('input, select').forEach((field) => {
          field.name = field.name.replace(/modules\[\d+\]/, `modules[${idx}]`);
        });
      });
    };

    addBtn.addEventListener('click', () => {
      const idx = table.querySelectorAll('tr').length;
      const row = document.createElement('tr');
      row.innerHTML = `
        <td><input type="text" class="form-control form-control-sm" name="modules[${idx}][module_scope]" required></td>
        <td><input type="text" class="form-control form-control-sm" name="modules[${idx}][feature_description]" required></td>
        <td>
          <select class="form-select form-select-sm" name="modules[${idx}][status]" required>
            ${statusOptions.map((status) => `<option value="${status}">${status}</option>`).join('')}
          </select>
        </td>
        <td><input type="text" class="form-control form-control-sm" name="modules[${idx}][deliverable_notes]"></td>
        <td class="text-end"><button type="button" class="btn btn-icon btn-soft-danger js-remove-row" title="Hapus baris"><i class="bi bi-trash3"></i></button></td>
      `;
      table.appendChild(row);
      bindRemoveButtons();
      reindexRows();
    });

    if (addAttachmentBtn && attachmentRows) {
      addAttachmentBtn.addEventListener('click', createAttachmentRow);
      if (attachmentRows.children.length === 0) {
        createAttachmentRow();
      }
    }

    bindRemoveButtons();
  })();
</script>
@endpush
