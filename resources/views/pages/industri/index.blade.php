@extends('layouts.app')

@section('title', 'Industri yang Kami Layani | Arsytech')
@section('description', 'Cara Arsytech menangani manufaktur, distribusi & logistik, retail & FMCG, serta pemerintahan & NGO: kendala umum tiap sektor dan modul yang paling cepat terasa hasilnya.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Tiap sektor punya masalahnya sendiri',
    'subtitle' => 'Modul yang dipakai sering sama, tetapi urutan pengerjaannya biasanya berbeda. Di sini Anda bisa melihat kendala yang umum di industri Anda dan kombinasi sistem yang biasanya paling cepat memberi hasil.',
    'breadcrumbs' => [
        'Industri' => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="row g-4">
      @foreach ($industriList as $slug => $item)
        <div class="col-md-6 rv"><div class="card-x">
          <div class="ico"><i class="bi {{ $item['icon'] }}"></i></div>
          <h3>{!! $item['name'] !!}</h3>
          <p>{!! $item['summary'] !!}</p>
          <p class="mt-3" style="font-size:.8125rem;color:var(--ink-3)"><strong>Keluhan yang paling sering kami dengar:</strong><br>
            <em>“{!! $item['complaint'] !!}”</em></p>
          <ul class="gate-list mt-3">@foreach ($item['modules'] as $module)<li>{!! $module !!}</li>@endforeach</ul>
          <a class="card-link stretched-link" href="{{ route('industri.show', $slug) }}">Lihat pendekatan kami <i class="bi bi-arrow-right"></i></a>
        </div></div>
      @endforeach
    </div>
    <p class="text-center mt-5 mb-0 rv" style="font-size:.9375rem;color:var(--muted)">
      <i class="bi bi-info-circle me-1"></i>
      Kami juga mengerjakan proyek untuk jasa konsultan, pendidikan, kesehatan, dan koperasi.
      <a href="{{ route('kontak') }}">Ceritakan sektor Anda</a>. Kemungkinan besar polanya mirip.
    </p>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5 rv">
        <span class="eyebrow">Pola yang berulang</span>
        <h2>Sektornya beda, kendalanya mirip</h2>
        <p class="lead-sm mt-3">
          Selama enam tahun mengerjakan proyek di berbagai industri, keluhan yang kami dengar hampir selalu
          kembali ke tiga hal ini.
        </p>
      </div>
      <div class="col-lg-7">
        <div class="row g-3">
          <div class="col-md-4 rv"><div class="pain">
            <h4><i class="bi bi-1-circle me-2" style="color:var(--brand)"></i>Data tidak tunggal</h4>
            <p>Tiap divisi punya versi angkanya sendiri, jadi waktu rapat habis untuk membahas angka mana yang benar.</p></div></div>
          <div class="col-md-4 rv"><div class="pain">
            <h4><i class="bi bi-2-circle me-2" style="color:var(--brand)"></i>Proses tergantung orang</h4>
            <p>Kalau satu orang cuti, persetujuan ikut tertahan. Siapa menyetujui apa dan kapan juga tidak tercatat.</p></div></div>
          <div class="col-md-4 rv"><div class="pain">
            <h4><i class="bi bi-3-circle me-2" style="color:var(--brand)"></i>Laporan selalu terlambat</h4>
            <p>Angka baru siap dua minggu setelah periode berakhir, padahal keputusan sering harus diambil lebih cepat.</p></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
