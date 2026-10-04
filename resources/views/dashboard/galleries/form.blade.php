@extends('layouts.dashboard')

@section('title', $gallery->exists ? 'Ubah album' : 'Buat album')

@section('crumbs')
  <a href="{{ route('dashboard.galeri.index') }}">Galeri</a> / {{ $gallery->exists ? \Illuminate\Support\Str::limit($gallery->title, 40) : 'Album baru' }}
@endsection

@section('actions')
  @if ($gallery->exists)
    <a href="{{ route('galeri.show', $gallery) }}" target="_blank" rel="noopener" class="btn btn-soft d-none d-sm-inline-flex"><i class="bi bi-eye me-1"></i> {{ $gallery->is_published ? 'Lihat' : 'Pratinjau' }}</a>
  @endif
@endsection

@section('content')
<div class="row g-4">
  <div @class(['col-xl-4' => $gallery->exists, 'col-xl-7' => ! $gallery->exists])>
    <form method="post" action="{{ $gallery->exists ? route('dashboard.galeri.update', $gallery) : route('dashboard.galeri.store') }}" class="panel" novalidate>
      @csrf
      @if ($gallery->exists)
        @method('PUT')
      @endif
      <div class="panel-head"><h2>Detail album</h2></div>
      <div class="panel-body">
        <div class="mb-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" @class(['form-control', 'is-invalid' => $errors->has('title')]) id="title" name="title" value="{{ old('title', $gallery->title) }}" maxlength="200" placeholder="Misalnya: Kick-off proyek ERP PT Sumber Makmur" data-slug-source="#slug" required>
          @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Alamat album</label>
          <div @class(['slug-field', 'is-invalid' => $errors->has('slug')])>
            <span>/galeri/</span>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $gallery->slug) }}" maxlength="200" data-slug-locked="{{ $gallery->exists ? '1' : '' }}">
          </div>
          @error('slug')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
          <label for="event_date" class="form-label">Tanggal kegiatan</label>
          <input type="date" @class(['form-control', 'is-invalid' => $errors->has('event_date')]) id="event_date" name="event_date" value="{{ old('event_date', optional($gallery->event_date)->format('Y-m-d')) }}">
          @error('event_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Deskripsi</label>
          <textarea @class(['form-control', 'is-invalid' => $errors->has('description')]) id="description" name="description" rows="6" maxlength="5000" placeholder="Ceritakan singkat kegiatannya: apa, di mana, dan siapa saja yang terlibat.">{{ old('description', $gallery->description) }}</textarea>
          @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
          <div class="form-hint">Pisahkan paragraf dengan baris kosong.</div>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" role="switch" id="is_published" name="is_published" value="1" @checked(old('is_published', $gallery->is_published))>
          <label class="form-check-label" for="is_published">Tampilkan di situs</label>
        </div>
      </div>
      <div class="panel-foot d-flex flex-wrap gap-2 justify-content-between">
        <button type="submit" class="btn btn-brand">{{ $gallery->exists ? 'Simpan detail' : 'Simpan & lanjut tambah media' }}</button>
        @if ($gallery->exists)
          <button type="button" class="btn btn-soft-danger" data-delete-form="#deleteGallery"><i class="bi bi-trash3 me-1"></i> Hapus album</button>
        @endif
      </div>
    </form>
  </div>

  @if ($gallery->exists)
    <div class="col-xl-8">
      <div class="panel">
        <div class="panel-head">
          <h2>Foto &amp; video <span class="text-muted-2 fw-semibold" data-photo-count>({{ $gallery->photos->count() }})</span></h2>
          <span class="small text-muted-2">Seret untuk mengubah urutan. Media pertama jadi sampul.</span>
        </div>
        <div class="panel-body">
          <div class="dropzone mb-4" data-dropzone data-upload-url="{{ route('dashboard.galeri.foto.store', $gallery) }}">
            <i class="bi bi-cloud-arrow-up"></i>
            <strong>Klik atau seret foto dan video ke sini</strong>
            <small>Foto otomatis diperkecil. Video MP4, MOV, atau WebM maksimal 10 MB per file dan tidak dikompresi oleh aplikasi.</small>
            <input type="file" accept="image/jpeg,image/png,image/webp,video/mp4,video/quicktime,video/webm" multiple>
          </div>
          <div class="photo-grid" data-photo-grid data-reorder-url="{{ route('dashboard.galeri.foto.urutan', $gallery) }}">
            @foreach ($gallery->photos as $photo)
              @include('dashboard.galleries.photo', ['photo' => $photo])
            @endforeach
          </div>
          <div class="empty py-4" data-photo-empty @if ($gallery->photos->isNotEmpty()) hidden @endif>
            <p class="mb-0">Album ini belum punya foto atau video.</p>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>

@if ($gallery->exists)
  <form method="post" action="{{ route('dashboard.galeri.destroy', $gallery) }}" id="deleteGallery" data-confirm="Hapus album ini beserta semua foto dan videonya? Tindakan ini tidak bisa dibatalkan.">
    @csrf
    @method('DELETE')
  </form>
@endif
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
@endpush
