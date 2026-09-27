@extends('layouts.app')

@section('title', ($category ? $category.' | ' : '').'Blog Arsytech: Catatan Seputar Sistem Bisnis')
@section('description', 'Tulisan dari tim Arsytech tentang ERP, WMS, HRIS, CRM, dan pengalaman kami merapikan operasional perusahaan di Indonesia.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Blog',
    'subtitle' => 'Catatan dari tim kami: pengalaman di proyek, cara kami bekerja, dan hal-hal yang sering ditanyakan klien soal sistem bisnis.',
    'breadcrumbs' => $category ? ['Blog' => route('blog.index'), e($category) => null] : ['Blog' => null],
])

<section class="section">
  <div class="container">
    <div class="blog-bar rv">
      <nav class="chips" aria-label="Kategori artikel">
        <a @class(['chip', 'on' => ! $category]) href="{{ route('blog.index', array_filter(['q' => $search])) }}">Semua</a>
        @foreach ($categories as $item)
          <a @class(['chip', 'on' => $category === $item]) href="{{ route('blog.index', array_filter(['kategori' => $item, 'q' => $search])) }}">{{ $item }}</a>
        @endforeach
      </nav>
      <form class="blog-search" method="get" action="{{ route('blog.index') }}" role="search">
        @if ($category)<input type="hidden" name="kategori" value="{{ $category }}">@endif
        <i class="bi bi-search"></i>
        <input type="search" name="q" value="{{ $search }}" placeholder="Cari artikel…" aria-label="Cari artikel">
      </form>
    </div>

    @if ($search !== '')
      <p class="blog-result rv">{{ $posts->total() }} artikel ditemukan untuk <strong>“{{ $search }}”</strong>. <a href="{{ route('blog.index', array_filter(['kategori' => $category])) }}">Hapus pencarian</a></p>
    @endif

    @if ($featured)
      <article class="bfeat rv">
        <a class="bfeat-img" href="{{ route('blog.show', $featured) }}" tabindex="-1" aria-hidden="true">
          @if ($featured->coverUrl())
            <img src="{{ $featured->coverUrl() }}" alt="">
          @else
            <span class="bcard-ph">@include('layouts.components.brand-mark', ['color' => '#E4545A'])</span>
          @endif
        </a>
        <div class="bfeat-body">
          <div class="d-flex flex-wrap gap-2 align-items-center">
            <span class="bfeat-tag">Terbaru</span>
            @if ($featured->category)
              <a class="post-cat" href="{{ route('blog.index', ['kategori' => $featured->category]) }}">{{ $featured->category }}</a>
            @endif
          </div>
          <h2><a href="{{ route('blog.show', $featured) }}">{{ $featured->title }}</a></h2>
          <p>{{ \Illuminate\Support\Str::limit($featured->summary(), 220) }}</p>
          <div class="post-meta">
            <span>{{ $featured->published_at->translatedFormat('d F Y') }}</span>
            <span>{{ $featured->readingMinutes() }} menit baca</span>
          </div>
          <a href="{{ route('blog.show', $featured) }}" class="btn btn-brand mt-4 align-self-start">Baca artikel <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
      </article>
    @endif

    @if ($posts->isEmpty() && ! $featured)
      <div class="empty-state rv">
        <div class="ico mx-auto"><i class="bi bi-journal-text"></i></div>
        @if ($search !== '' || $category)
          <h2>Belum ada artikel yang cocok</h2>
          <p>Coba kata kunci lain, atau lihat semua artikel.</p>
          <a href="{{ route('blog.index') }}" class="btn btn-outline-ink mt-2">Lihat semua artikel</a>
        @else
          <h2>Artikel pertama sedang ditulis</h2>
          <p>Kami sedang menyiapkan tulisan dari pengalaman proyek. Sambil menunggu, silakan lihat pertanyaan yang paling sering diajukan klien.</p>
          <a href="{{ route('faq') }}" class="btn btn-outline-ink mt-2">Buka FAQ <i class="bi bi-arrow-right ms-1"></i></a>
        @endif
      </div>
    @elseif ($posts->isNotEmpty())
      <div class="row g-4 {{ $featured ? 'mt-2' : '' }}">
        @foreach ($posts as $post)
          <div class="col-md-6 col-lg-4 rv">
            @include('pages.blog.card', ['post' => $post])
          </div>
        @endforeach
      </div>
      @if ($posts->hasPages())
        <div class="pager mt-5">{{ $posts->links() }}</div>
      @endif
    @endif
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
