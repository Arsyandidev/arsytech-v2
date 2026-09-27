@extends('layouts.app')

@section('title', $kategori['title'])
@section('description', $kategori['description'])

@section('content')
@include('layouts.components.page-head', [
    'title' => $kategori['heading'],
    'subtitle' => $kategori['lead'],
    'breadcrumbs' => [
        'Solusi' => route('solusi.index'),
        $kategori['name'] => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 rv">
        <span class="eyebrow">{!! $kategori['name'] !!}</span>
        <h2>{!! $kategori['intro']['title'] !!}</h2>
        @foreach ($kategori['intro']['paragraphs'] as $paragraph)
          <p class="lead-sm mt-3">{!! $paragraph !!}</p>
        @endforeach
        <div class="d-flex flex-wrap gap-2 mt-4">
          <a href="{{ route('kontak') }}" class="btn btn-brand">Diskusikan kebutuhan Anda <i class="bi bi-arrow-right ms-1"></i></a>
          <a href="#aplikasi" class="btn btn-outline-ink">Lihat aplikasinya</a>
        </div>
      </div>
      <div class="col-lg-6 rv">
        <div class="mock">
          <div class="mock-bar"><span class="mock-dot"></span><span class="mock-dot"></span><span class="mock-dot"></span>
            <span class="mock-url">{!! $kategori['name'] !!}</span></div>
          <div class="mock-body"><div class="mock-main">
            <div class="mock-head"><span class="mock-title">{{ count($kategori['apps']) }} aplikasi dalam kelompok ini</span><span class="mock-chip">Bisa dihubungkan ke ERP</span></div>
            <div class="chartbox">
              @foreach ($kategori['apps'] as $app)
                <div class="rowline" style="padding:.6rem 0"><span class="nm"><i class="bi {{ $app['icon'] }} me-2" style="color:var(--brand)"></i>{!! $app['name'] !!}</span><span class="badge-soft b-new">{!! $app['short'] !!}</span></div>
              @endforeach
            </div>
          </div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft" id="aplikasi">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow">Aplikasi di dalamnya</span>
      <h2>Pilih yang paling Anda butuhkan</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:62ch">
        Setiap aplikasi kami sesuaikan dengan alur kerja dan istilah yang sudah dipakai tim Anda.
        Fitur di bawah adalah titik awal, dan bisa ditambah atau dikurangi.
      </p>
    </div>
    <div class="row g-4 justify-content-center">
      @foreach ($kategori['apps'] as $app)
        <div class="col-md-6 col-lg-4 rv">
          <div class="card-x d-flex flex-column h-100">
            <div class="ico"><i class="bi {{ $app['icon'] }}"></i></div>
            <span class="app-abbr">{!! $app['short'] !!}</span>
            <h3>{!! $app['name'] !!}</h3>
            <p>{!! $app['body'] !!}</p>
            <ul class="feat-list tight mt-3 mb-3" style="font-size:.875rem">
              @foreach ($app['features'] as $feature)
                <li>{!! $feature !!}</li>
              @endforeach
            </ul>
            @if ($app['detail'])
              <a class="card-link stretched-link mt-auto" href="{{ route('solusi.show', $app['detail']) }}">Pelajari {!! $app['short'] !!} <i class="bi bi-arrow-right"></i></a>
            @else
              <a class="card-link stretched-link mt-auto" href="{{ route('kontak') }}">Tanyakan aplikasi ini <i class="bi bi-arrow-right"></i></a>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4 rv">
        <span class="eyebrow">Tanya jawab</span>
        <h2>Yang sering ditanyakan</h2>
        <p class="lead-sm mt-3">Pertanyaan lain? <a href="{{ route('faq') }}">Lihat FAQ lengkap</a> atau tanya langsung lewat WhatsApp.</p>
        <a href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener" class="btn btn-wa mt-3"><i class="bi bi-whatsapp me-1"></i> Tanya lewat WhatsApp</a>
      </div>
      <div class="col-lg-8">@include('layouts.components.accordion', ['id' => 'faq-'.$slug, 'items' => $kategori['faq']])</div>
    </div>
  </div>
</section>

<section class="section-tight section-soft">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-5 rv">
        <h2 class="h3" style="font-size:clamp(1.3rem,1.15rem + .6vw,1.65rem)">Layanan Arsytech lainnya</h2>
        <p class="lead-sm mt-2">ERP sebagai inti, dan kelompok aplikasi lain yang bisa disambungkan.</p>
      </div>
      <div class="col-lg-7 rv"><div class="d-flex flex-wrap"><a class="tech" href="{{ route('solusi.show', 'erp') }}" style="text-decoration:none"><i class="bi bi-arrow-right-short"></i>Enterprise Resource Planning</a>@foreach ($kategoriList as $otherSlug => $other)@if ($otherSlug !== $slug)<a class="tech" href="{{ route('solusi.show', $otherSlug) }}" style="text-decoration:none"><i class="bi bi-arrow-right-short"></i>{!! $other['name'] !!}</a>@endif
@endforeach</div></div>
    </div>
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
