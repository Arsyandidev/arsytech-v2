@extends('layouts.dashboard')

@section('title', 'Galeri')

@section('actions')
  <a href="{{ route('dashboard.galeri.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg me-1"></i> <span class="d-none d-sm-inline">Buat album</span></a>
@endsection

@section('content')
<form class="filter-bar mb-4" method="get">
  <input type="search" class="form-control" name="q" value="{{ request('q') }}" placeholder="Cari judul album…">
</form>

@if ($galleries->isEmpty())
  <div class="panel">
    <div class="empty">
      <div class="ico"><i class="bi bi-images"></i></div>
      @if (request('q'))
        <h3>Tidak ada album yang cocok</h3>
        <p class="mb-0">Coba kata kunci lain.</p>
      @else
        <h3>Belum ada album</h3>
        <p class="mb-3">Buat album untuk setiap kegiatan, lalu unggah foto-fotonya sekaligus.</p>
        <a href="{{ route('dashboard.galeri.create') }}" class="btn btn-brand btn-sm">Buat album</a>
      @endif
    </div>
  </div>
@else
  <div class="row g-4">
    @foreach ($galleries as $gallery)
      <div class="col-sm-6 col-xl-4 col-xxl-3">
        <div class="album-card">
          <a class="cv" href="{{ route('dashboard.galeri.edit', $gallery) }}">
            @if ($gallery->cover)
              <img src="{{ $gallery->cover->thumbUrl() }}" alt="" loading="lazy">
            @else
              <i class="bi bi-images fs-2"></i>
            @endif
            <span class="count"><i class="bi bi-image me-1"></i>{{ $gallery->photos_count }}</span>
          </a>
          <div class="bd">
            <span @class(['badge-status', 's-live' => $gallery->is_published, 's-draft' => ! $gallery->is_published])>{{ $gallery->is_published ? 'Tayang' : 'Draf' }}</span>
            <h3><a class="t-title text-decoration-none" style="color:var(--ink)" href="{{ route('dashboard.galeri.edit', $gallery) }}">{{ $gallery->title }}</a></h3>
            <div class="small text-muted-2">{{ $gallery->displayDate()->translatedFormat('d F Y') }}</div>
          </div>
          <div class="ft">
            <a href="{{ route('galeri.show', $gallery) }}" target="_blank" rel="noopener" class="btn btn-icon btn-soft" title="{{ $gallery->is_published ? 'Lihat di situs' : 'Pratinjau' }}"><i class="bi bi-eye"></i></a>
            <a href="{{ route('dashboard.galeri.edit', $gallery) }}" class="btn btn-icon btn-soft" title="Ubah"><i class="bi bi-pencil"></i></a>
            <form method="post" action="{{ route('dashboard.galeri.destroy', $gallery) }}" data-confirm="Hapus album &quot;{{ $gallery->title }}&quot; beserta {{ $gallery->photos_count }} fotonya? Tindakan ini tidak bisa dibatalkan.">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-icon btn-soft-danger" title="Hapus"><i class="bi bi-trash3"></i></button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  @if ($galleries->hasPages())
    <div class="mt-4">{{ $galleries->links() }}</div>
  @endif
@endif
@endsection
