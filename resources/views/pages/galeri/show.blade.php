@extends('layouts.app')

@section('title', $gallery->title.' | Galeri Arsytech')
@section('description', \Illuminate\Support\Str::limit(trim(preg_replace('/\s+/', ' ', $gallery->description ?: 'Dokumentasi kegiatan '.$gallery->title.'.')), 155))
@if ($gallery->photos->isNotEmpty())
  @section('og_image', $gallery->photos->first()->url())
@endif

@section('content')
@include('layouts.components.page-head', [
    'title' => e($gallery->title),
    'meta' => '<span><i class="bi bi-calendar3"></i>'.$gallery->displayDate()->translatedFormat('d F Y').'</span><span><i class="bi bi-images"></i>'.$gallery->photos->count().' foto</span>',
    'back' => route('galeri.index'),
    'breadcrumbs' => [
        'Galeri' => route('galeri.index'),
        e(\Illuminate\Support\Str::limit($gallery->title, 60)) => null,
    ],
])

<section class="section">
  <div class="container">
    @unless ($gallery->is_published)
      <div class="preview-note mb-4"><i class="bi bi-eye-slash"></i> Album ini belum ditayangkan. Hanya tim internal yang bisa melihat halaman ini.</div>
    @endunless

    @if ($gallery->description)
      <div class="gallery-desc rv">
        @foreach (preg_split('/\n\s*\n/', trim($gallery->description)) as $paragraph)
          <p>{!! nl2br(e($paragraph)) !!}</p>
        @endforeach
      </div>
    @endif

    @php($photos = $gallery->photos)
    @if ($photos->isNotEmpty())
      <div class="gallery-hero rv">
        <button type="button" @class(['gh-main', 'gh-solo' => $photos->count() === 1]) data-lightbox="0" aria-label="Buka foto 1 dari {{ $photos->count() }}">
          <img src="{{ $photos[0]->url() }}" alt="{{ $photos[0]->caption ?: $gallery->title }}">
          <span class="gh-zoom"><i class="bi bi-zoom-in"></i></span>
          @if ($photos[0]->caption)
            <span class="gh-cap">{{ $photos[0]->caption }}</span>
          @endif
        </button>
        @if ($photos->count() > 1)
          <div class="gh-side">
            @foreach ($photos->slice(1, 2) as $index => $photo)
              <button type="button" class="gh-item" data-lightbox="{{ $index }}" aria-label="Buka foto {{ $index + 1 }} dari {{ $photos->count() }}">
                <img src="{{ $photo->thumbUrl() }}" alt="{{ $photo->caption ?: $gallery->title }}" loading="lazy">
                @if ($loop->last && $photos->count() > 3)
                  <span class="gh-more">+{{ $photos->count() - 3 }} foto</span>
                @endif
              </button>
            @endforeach
          </div>
        @endif
      </div>

      @if ($photos->count() > 3)
        <div class="d-flex align-items-center justify-content-between mt-5 mb-3 rv">
          <h2 class="h4 m-0">Semua foto</h2>
          <span class="small" style="color:var(--muted)">Klik foto untuk memperbesar</span>
        </div>
        <div class="photo-wall">
          @foreach ($photos as $index => $photo)
            <figure class="pw-item rv">
              <button type="button" data-lightbox="{{ $index }}" aria-label="Buka foto {{ $index + 1 }} dari {{ $photos->count() }}">
                <img src="{{ $photo->thumbUrl() }}" alt="{{ $photo->caption ?: $gallery->title }}" loading="lazy">
              </button>
              @if ($photo->caption)
                <figcaption>{{ $photo->caption }}</figcaption>
              @endif
            </figure>
          @endforeach
        </div>
      @endif
    @endif
  </div>
</section>

@if ($others->isNotEmpty())
  <section class="section section-soft">
    <div class="container">
      <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4 rv">
        <div>
          <span class="eyebrow">Galeri</span>
          <h2>Kegiatan lainnya</h2>
        </div>
        <a href="{{ route('galeri.index') }}" class="btn btn-outline-ink">Lihat semua album <i class="bi bi-arrow-right ms-1"></i></a>
      </div>
      <div class="row g-4">
        @foreach ($others as $other)
          <div class="col-sm-6 col-lg-4 rv">
            @include('pages.galeri.card', ['gallery' => $other])
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif

@include('layouts.components.cta-band')

@if ($photos->isNotEmpty())
  <div class="modal fade lightbox" id="lightbox" tabindex="-1" aria-label="Pratinjau foto" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="lb-top">
          <span class="lb-count" data-lb-count>1 / {{ $photos->count() }}</span>
          <span class="lb-title">{{ $gallery->title }}</span>
          <button type="button" class="lb-close" data-bs-dismiss="modal" aria-label="Tutup"><i class="bi bi-x-lg"></i></button>
        </div>
        <div id="lbCarousel" class="carousel slide lb-stage" data-bs-interval="false" data-bs-touch="true">
          <div class="carousel-inner">
            @foreach ($photos as $index => $photo)
              <div @class(['carousel-item', 'active' => $loop->first])>
                <figure class="lb-figure">
                  <img data-src="{{ $photo->url() }}" alt="{{ $photo->caption ?: $gallery->title }}" @if ($photo->width) width="{{ $photo->width }}" height="{{ $photo->height }}" @endif>
                  <figcaption>{{ $photo->caption }}</figcaption>
                </figure>
              </div>
            @endforeach
          </div>
          @if ($photos->count() > 1)
            <button class="lb-nav lb-prev" type="button" data-bs-target="#lbCarousel" data-bs-slide="prev" aria-label="Foto sebelumnya"><i class="bi bi-chevron-left"></i></button>
            <button class="lb-nav lb-next" type="button" data-bs-target="#lbCarousel" data-bs-slide="next" aria-label="Foto berikutnya"><i class="bi bi-chevron-right"></i></button>
          @endif
        </div>
        @if ($photos->count() > 1)
          <div class="lb-thumbs" data-lb-thumbs>
            @foreach ($photos as $index => $photo)
              <button type="button" @class(['active' => $loop->first]) data-bs-target="#lbCarousel" data-bs-slide-to="{{ $index }}" aria-label="Foto {{ $index + 1 }}"><img src="{{ $photo->thumbUrl() }}" alt="" loading="lazy"></button>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
@endif
@endsection

@push('scripts')
<script src="{{ \App\Support\Asset::url('assets/js/gallery.js') }}"></script>
@endpush
