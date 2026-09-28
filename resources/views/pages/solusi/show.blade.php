@extends('layouts.app')

@section('title', $solusi['title'])
@section('description', $solusi['description'])

@section('content')
@include('layouts.components.page-head', [
    'title' => $solusi['heading'],
    'subtitle' => $solusi['lead'],
    'breadcrumbs' => array_merge(
        ['Solusi' => route('solusi.index')],
        $parent ? [$parent['name'] => route('solusi.show', $parentSlug)] : [],
        [$solusi['short'] => null],
    ),
])

<section class="section">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 rv">
        <span class="eyebrow">Masalah yang diselesaikan</span>
        <h2>{!! $solusi['intro']['title'] !!}</h2>
        @foreach ($solusi['intro']['paragraphs'] as $paragraph)
          <p class="lead-sm mt-3">{!! $paragraph !!}</p>
        @endforeach
        <div class="d-flex flex-wrap gap-2 mt-4">
          <a href="{{ route('kontak') }}" class="btn btn-brand">Diskusikan kebutuhan {{ $solusi['short'] }} <i class="bi bi-arrow-right ms-1"></i></a>
          @if ($parent)
            <a href="{{ route('solusi.show', $parentSlug) }}" class="btn btn-outline-ink">Lihat aplikasi lain</a>
          @else
            <a href="{{ route('solusi.index') }}" class="btn btn-outline-ink">Lihat solusi lain</a>
          @endif
        </div>
      </div>
      <div class="col-lg-6 rv">@include('pages.solusi.mocks.'.$slug)</div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow">Modul utama</span>
      <h2>Sistem disesuaikan dengan cara kerja bisnis Anda</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:62ch">
        Modul di bawah merupakan gambaran umum. Lingkup dapat disesuaikan, baik dengan menambah, mengurangi, maupun menyesuaikan proses dengan istilah dan alur kerja yang sudah digunakan tim Anda
      </p>
    </div>
    <div class="row g-4">
      @foreach ($solusi['modules'] as $module)
        <div class="col-md-6 col-lg-4 rv"><div class="card-x">
          <div class="ico ico-sm"><i class="bi {{ $module['icon'] }}"></i></div>
          <h3 style="font-size:1rem">{!! $module['title'] !!}</h3>
          <p>{!! $module['body'] !!}</p></div></div>
      @endforeach
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow">Hasil yang bisa diharapkan</span>
      <h2>Perubahan setelah proses mulai terintegrasi</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:60ch">
        Setiap implementasi memiliki kondisi awal dan target yang berbeda. Angka berikut merupakan contoh hasil dari proyek ERP yang telah kami kerjakan dan bukan merupakan angka yang kami janjikan untuk setiap proyek.
      </p>
    </div>
    <div class="row g-4">
      @foreach ($solusi['outcomes'] as $outcome)
        <div class="col-md-4 rv"><div class="card-x text-center flat">
          <div style="font-size:clamp(1.8rem,1.5rem + 1.2vw,2.4rem);font-weight:800;color:var(--brand);letter-spacing:-.04em;line-height:1.1">{!! $outcome['value'] !!}</div>
          <div style="font-size:.9375rem;font-weight:700;color:var(--ink);margin-top:.4rem">{!! $outcome['label'] !!}</div>
          <p style="font-size:.8125rem;margin-top:.35rem">{!! $outcome['body'] !!}</p></div></div>
      @endforeach
    </div>
  </div>
</section>

<section class="section-tight section-soft">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-5 rv">
        <h2 class="h3" style="font-size:clamp(1.3rem,1.15rem + .6vw,1.65rem)">Solusi yang Relevan dengan Industri Anda</h2>
        <p class="lead-sm mt-2">Setiap industri memiliki alur kerja dan kebutuhan yang berbeda. Kami menyesuaikan sistem dengan proses yang sudah berjalan, bukan memaksakan satu pola untuk semua bisnis.</p>
      </div>
      <div class="col-lg-7 rv"><div class="d-flex flex-wrap">@foreach ($industriList as $industriSlug => $industri)<a class="tech" href="{{ route('industri.index').'#'.$industriSlug }}" style="text-decoration:none"><i class="bi bi-arrow-right-short"></i>{!! $industri['name'] !!}</a>@endforeach</div></div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4 rv">
        <span class="eyebrow">Tanya jawab</span>
        <h2>Pertanyaan seputar {{ $solusi['short'] }}</h2>
        <p class="lead-sm mt-3">Belum terjawab? <a href="{{ route('faq') }}">Lihat FAQ lengkap</a> atau tanya langsung lewat WhatsApp.</p>
        <a href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener" class="btn btn-wa mt-3"><i class="bi bi-whatsapp me-1"></i> Tanya lewat WhatsApp</a>
      </div>
      <div class="col-lg-8">@include('layouts.components.accordion', ['id' => 'faq-'.$slug, 'items' => $solusi['faq']])</div>
    </div>
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
