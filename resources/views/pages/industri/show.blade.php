@extends('layouts.app')

@section('title', $industri['title'])
@section('description', $industri['description'])

@section('content')
@include('layouts.components.page-head', [
    'title' => $industri['heading'],
    'subtitle' => $industri['lead'],
    'breadcrumbs' => [
        'Industri' => route('industri.index'),
        $industri['name'] => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5 rv">
        <span class="eyebrow">Kendala khas sektor</span>
        <h2>{!! $industri['opening']['title'] !!}</h2>
        @foreach ($industri['opening']['paragraphs'] as $paragraph)
          <p class="lead-sm mt-3">{!! $paragraph !!}</p>
        @endforeach
        <a href="{{ route('kontak') }}" class="btn btn-brand mt-4">Ceritakan kondisi Anda <i class="bi bi-arrow-right ms-1"></i></a>
      </div>
      <div class="col-lg-7">
        <div class="row g-3">
          @foreach ($industri['pains'] as $pain)
            <div class="col-md-6 rv"><div class="pain">
              <h4><i class="bi {{ $pain['icon'] }} me-2" style="color:var(--brand)"></i>{!! $pain['title'] !!}</h4>
              <p>{!! $pain['body'] !!}</p></div></div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5 rv">
        <span class="eyebrow">Urutan yang kami sarankan</span>
        <h2>Dibangun bertahap</h2>
        <p class="lead-sm mt-3">
          Urutan di samping adalah pola yang paling sering berhasil di sektor ini. Urutannya tetap bisa diubah,
          karena prioritasnya mengikuti masalah yang paling mahal buat Anda saat ini.
        </p>
        <div class="card-x mt-4" style="background:var(--brand-soft);border-color:var(--brand-line);height:auto">
          <div class="d-flex gap-3">
            <i class="bi bi-graph-up" style="color:var(--brand);font-size:1.5rem"></i>
            <div><h3 style="font-size:.9375rem;margin-bottom:.3rem">Kenapa bertahap?</h3>
              <p style="font-size:.875rem;color:var(--ink-3)">Karena tim Anda tetap harus bekerja selama sistem dibangun.
                Kalau fase pertama berjalan baik, fase berikutnya biasanya jauh lebih mudah diterima.</p></div>
          </div>
        </div>
      </div>
      <div class="col-lg-7"><div class="ps-lg-4">
        @foreach ($industri['phases'] as $phase)
          <div class="step rv"><span class="num">{{ $loop->iteration }}</span><h3>{!! $phase['title'] !!}</h3>
            <p>{!! $phase['body'] !!}</p><span class="out"><i class="bi bi-check2-circle"></i> {!! $phase['result'] !!}</span></div>
        @endforeach
      </div></div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 rv">
        <span class="eyebrow">Studi kasus</span>
        <h2>{!! $industri['case']['title'] !!}</h2>
        <p class="lead-sm mt-3">{!! $industri['case']['before'] !!}</p>
        <p class="lead-sm mt-3">{!! $industri['case']['after'] !!}</p>
        <a href="{{ route('studi-kasus') }}" class="btn btn-outline-ink mt-4">Lihat studi kasus lain <i class="bi bi-arrow-right ms-1"></i></a>
      </div>
      <div class="col-lg-6 rv">
        <div class="row g-3">
          @foreach ($industri['case']['metrics'] as $metric)
            <div class="col-6"><div class="card-x text-center flat">
              <div style="font-size:clamp(1.6rem,1.4rem + 1vw,2.1rem);font-weight:800;color:var(--brand);letter-spacing:-.04em;line-height:1.1">{!! $metric['value'] !!}</div>
              <div style="font-size:.8125rem;font-weight:700;color:var(--ink);margin-top:.35rem">{!! $metric['label'] !!}</div>
              <p style="font-size:.75rem;margin-top:.2rem">{!! $metric['body'] !!}</p></div></div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4 rv">
        <span class="eyebrow">Tanya jawab</span>
        <h2>Pertanyaan khas sektor ini</h2>
        <p class="lead-sm mt-3">Pertanyaan lain? <a href="{{ route('faq') }}">Lihat FAQ lengkap</a> atau hubungi kami langsung.</p>
      </div>
      <div class="col-lg-8">@include('layouts.components.accordion', ['id' => 'faq-industri-'.$slug, 'items' => $industri['faq']])</div>
    </div>
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
