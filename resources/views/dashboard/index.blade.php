@extends('layouts.dashboard')

@section('title', 'Ringkasan')

@section('actions')
  <a href="{{ route('dashboard.blog.create') }}" class="btn btn-brand d-none d-sm-inline-flex"><i class="bi bi-plus-lg me-1"></i> Tulis artikel</a>
@endsection

@section('content')
<p class="text-muted-2 mb-4">Halo, {{ \Illuminate\Support\Str::before(auth()->user()->name, ' ') }}. Ini keadaan konten situs saat ini.</p>

<div class="row g-3 mb-4">
  <div class="col-sm-6 col-xl-3"><div class="stat-card"><div class="ico ico-sm"><i class="bi bi-journal-check"></i></div><div><div class="v">{{ $stats['published'] }}</div><div class="l">Artikel terbit</div></div></div></div>
  <div class="col-sm-6 col-xl-3"><div class="stat-card"><div class="ico ico-sm"><i class="bi bi-pencil-square"></i></div><div><div class="v">{{ $stats['drafts'] + $stats['scheduled'] }}</div><div class="l">Draf &amp; terjadwal</div></div></div></div>
  <div class="col-sm-6 col-xl-3"><div class="stat-card"><div class="ico ico-sm"><i class="bi bi-collection"></i></div><div><div class="v">{{ $stats['galleries'] }}</div><div class="l">Album galeri</div></div></div></div>
  <div class="col-sm-6 col-xl-3"><div class="stat-card"><div class="ico ico-sm"><i class="bi bi-image"></i></div><div><div class="v">{{ $stats['photos'] }}</div><div class="l">Foto tersimpan</div></div></div></div>
</div>

<div class="row g-4">
  <div class="col-lg-7">
    <div class="panel h-100">
      <div class="panel-head">
        <h2>Artikel terakhir diubah</h2>
        <a href="{{ route('dashboard.blog.index') }}" class="small fw-bold text-decoration-none">Semua artikel <i class="bi bi-arrow-right"></i></a>
      </div>
      @forelse ($posts as $post)
        <a class="recent-item" href="{{ route('dashboard.blog.edit', $post) }}">
          @if ($post->coverThumbUrl())
            <img class="t-thumb" src="{{ $post->coverThumbUrl() }}" alt="">
          @else
            <span class="t-thumb"><i class="bi bi-file-earmark-text"></i></span>
          @endif
          <div class="flex-grow-1 min-w-0">
            <div class="t text-truncate">{{ $post->title }}</div>
            <div class="s">Diubah {{ $post->updated_at->diffForHumans() }}</div>
          </div>
          @include('dashboard.posts.status', ['post' => $post])
        </a>
      @empty
        <div class="empty">
          <div class="ico"><i class="bi bi-journal-plus"></i></div>
          <h3>Belum ada artikel</h3>
          <p class="mb-3">Tulisan pertama bisa berupa cerita proyek, tips, atau kabar perusahaan.</p>
          <a href="{{ route('dashboard.blog.create') }}" class="btn btn-brand btn-sm">Tulis artikel</a>
        </div>
      @endforelse
    </div>
  </div>
  <div class="col-lg-5">
    <div class="panel h-100">
      <div class="panel-head">
        <h2>Album terbaru</h2>
        <a href="{{ route('dashboard.galeri.index') }}" class="small fw-bold text-decoration-none">Semua album <i class="bi bi-arrow-right"></i></a>
      </div>
      @forelse ($galleries as $gallery)
        <a class="recent-item" href="{{ route('dashboard.galeri.edit', $gallery) }}">
          @if ($gallery->cover)
            <img class="t-thumb" src="{{ $gallery->cover->thumbUrl() }}" alt="">
          @else
            <span class="t-thumb"><i class="bi bi-images"></i></span>
          @endif
          <div class="flex-grow-1 min-w-0">
            <div class="t text-truncate">{{ $gallery->title }}</div>
            <div class="s">{{ $gallery->photos_count }} foto · {{ $gallery->displayDate()->translatedFormat('d M Y') }}</div>
          </div>
          <span @class(['badge-status', 's-live' => $gallery->is_published, 's-draft' => ! $gallery->is_published])>{{ $gallery->is_published ? 'Tayang' : 'Draf' }}</span>
        </a>
      @empty
        <div class="empty">
          <div class="ico"><i class="bi bi-images"></i></div>
          <h3>Belum ada album</h3>
          <p class="mb-3">Simpan dokumentasi kegiatan, kunjungan klien, atau acara internal di sini.</p>
          <a href="{{ route('dashboard.galeri.create') }}" class="btn btn-brand btn-sm">Buat album</a>
        </div>
      @endforelse
    </div>
  </div>
</div>
@endsection
