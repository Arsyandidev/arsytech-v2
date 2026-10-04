@extends('layouts.app')

@section('title', 'Galeri Kegiatan | Arsytech')
@section('description', 'Dokumentasi kegiatan tim Arsytech: kick-off proyek, pelatihan pengguna, kunjungan ke klien, dan acara internal.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Galeri kegiatan',
    'subtitle' => 'Dokumentasi dari lapangan: kick-off proyek, pelatihan pengguna di lokasi klien, sampai acara internal tim kami.',
    'breadcrumbs' => [
        'Galeri' => null,
    ],
])

<section class="section">
  <div class="container">
    @if ($galleries->isEmpty())
      <div class="empty-state rv">
        <div class="ico mx-auto"><i class="bi bi-images"></i></div>
        <h2>Belum ada album yang ditampilkan</h2>
        <p>Dokumentasi kegiatan kami akan muncul di sini. Sementara itu, silakan lihat layanan yang kami kerjakan.</p>
        <a href="{{ route('solusi.index') }}" class="btn btn-outline-ink mt-2">Lihat Solusi Kami <i class="bi bi-arrow-right ms-1"></i></a>
      </div>
    @else
      <div class="row g-4 g-lg-5">
        @foreach ($galleries as $gallery)
          <div class="col-sm-6 col-lg-4 rv">
            @include('pages.galeri.card', ['gallery' => $gallery])
          </div>
        @endforeach
      </div>
      @if ($galleries->hasPages())
        <div class="pager mt-5">{{ $galleries->links() }}</div>
      @endif
    @endif
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
