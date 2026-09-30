@extends('layouts.app')

@section('title', $post->title.' | Blog Arsytech')
@section('description', \Illuminate\Support\Str::limit($post->summary(), 155))
@section('og_type', 'article')
@if ($post->coverUrl())
  @section('og_image', $post->coverUrl())
@endif

@php
    app(\App\Support\StructuredData::class)->add(array_filter([
        '@type' => 'BlogPosting',
        'headline' => $post->title,
        'description' => $post->summary(),
        'image' => $post->coverUrl(),
        'datePublished' => optional($post->published_at)->toIso8601String(),
        'dateModified' => $post->updated_at->toIso8601String(),
        'author' => $post->author ? ['@type' => 'Person', 'name' => $post->author->name] : ['@type' => 'Organization', 'name' => config('arsytech.name')],
        'publisher' => ['@id' => url('/').'/#organization'],
        'mainEntityOfPage' => url()->current(),
    ]));
@endphp

@section('content')
@include('layouts.components.page-head', [
    'title' => e($post->title),
    'meta' => collect([
        $post->category ? '<span><i class="bi bi-bookmark"></i>'.e($post->category).'</span>' : null,
        '<span><i class="bi bi-calendar3"></i>'.($post->published_at ?? $post->updated_at)->translatedFormat('d F Y').'</span>',
        '<span><i class="bi bi-clock"></i>'.$post->readingMinutes().' menit baca</span>',
    ])->filter()->join(''),
    'back' => route('blog.index'),
    'backLabel' => 'Semua artikel',
    'breadcrumbs' => [
        'Blog' => route('blog.index'),
        e(\Illuminate\Support\Str::limit($post->title, 50)) => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-8">
        @unless ($post->isPublished())
          <div class="preview-note mb-4"><i class="bi bi-eye-slash"></i> {{ $post->isScheduled() ? 'Artikel ini dijadwalkan terbit '.$post->published_at->translatedFormat('d F Y, H.i').'.' : 'Ini masih draf.' }} Hanya tim internal yang bisa melihat halaman ini.</div>
        @endunless
        @if ($post->coverUrl())
          <img class="article-cover rv" src="{{ $post->coverUrl() }}" alt="{{ $post->title }}">
        @endif
        @if ($post->excerpt)
          <p class="article-lead">{{ $post->excerpt }}</p>
        @endif
        <div class="article">
          {!! $post->html() !!}
        </div>

        <div class="article-foot">
          <div class="article-author">
            <span class="dash-avatar-sm">{{ \Illuminate\Support\Str::of(optional($post->author)->name ?? 'Arsytech')->explode(' ')->take(2)->map(fn ($part) => mb_substr($part, 0, 1))->join('') }}</span>
            <div>
              <div class="small" style="color:var(--muted)">Ditulis oleh</div>
              <strong>Redaksi Arsytech</strong>
            </div>
          </div>
          <div class="share">
            <span>Bagikan</span>
            <a href="https://wa.me/?text={{ urlencode($post->title.' '.url()->current()) }}" target="_blank" rel="noopener" aria-label="Bagikan lewat WhatsApp"><i class="bi bi-whatsapp"></i></a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Bagikan ke LinkedIn"><i class="bi bi-linkedin"></i></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Bagikan ke Facebook"><i class="bi bi-facebook"></i></a>
            <button type="button" data-copy-link="{{ url()->current() }}" aria-label="Salin tautan"><i class="bi bi-link-45deg"></i></button>
          </div>
        </div>
      </div>

      <aside class="col-lg-4">
        <div class="article-side">
          <div class="side-cta">
            <span class="eyebrow on-dark">Konsultasi gratis</span>
            <h3>Punya kasus serupa di perusahaan Anda?</h3>
            <p>Ceritakan kondisinya. Kami balas dalam 1&times;24 jam kerja.</p>
            <a href="{{ route('kontak') }}" class="btn btn-brand w-100">Hubungi Kami</a>
            <a href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener" class="btn btn-outline-light-2 w-100 mt-2"><i class="bi bi-whatsapp me-1"></i> Chat WhatsApp</a>
          </div>
          @if ($latest->isNotEmpty())
            <div class="side-list">
              <h3>Artikel terbaru</h3>
              @foreach ($latest as $item)
                <a href="{{ route('blog.show', $item) }}">
                  <span class="t">{{ $item->title }}</span>
                  <span class="d">{{ $item->published_at->translatedFormat('d M Y') }}</span>
                </a>
              @endforeach
            </div>
          @endif
        </div>
      </aside>
    </div>
  </div>
</section>

@if ($related->isNotEmpty())
  <section class="section section-soft">
    <div class="container">
      <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4 rv">
        <div>
          <span class="eyebrow">Baca juga</span>
          <h2>Artikel lainnya</h2>
        </div>
        <a href="{{ route('blog.index') }}" class="btn btn-outline-ink">Semua artikel <i class="bi bi-arrow-right ms-1"></i></a>
      </div>
      <div class="row g-4">
        @foreach ($related as $item)
          <div class="col-md-6 col-lg-4 rv">
            @include('pages.blog.card', ['post' => $item])
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif

@include('layouts.components.cta-band')
@endsection

@push('scripts')
<script>
document.querySelectorAll('[data-copy-link]').forEach(function (btn) {
  btn.addEventListener('click', function () {
    navigator.clipboard.writeText(btn.dataset.copyLink).then(function () {
      btn.innerHTML = '<i class="bi bi-check2"></i>';
      setTimeout(function () { btn.innerHTML = '<i class="bi bi-link-45deg"></i>'; }, 1800);
    });
  });
});
</script>
@endpush
