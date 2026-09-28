@extends('layouts.app')

@section('title', 'Industri yang Kami Layani | Arsytech')
@section('description', 'Cara Arsytech menangani manufaktur, distribusi & logistik, retail & FMCG, serta pemerintahan & NGO: kendala umum tiap sektor dan modul yang paling cepat terasa hasilnya.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Setiap Industri Punya Cara Kerja yang Berbeda',
    'subtitle' => 'Kami menyesuaikan sistem dengan proses yang berjalan di lapangan. Di sini Anda dapat melihat beberapa kendala yang umum ditemui di industri manufaktur dan bagaimana sistem dapat dibangun secara bertahap untuk mengatasinya',
    'breadcrumbs' => [
        'Industri' => null,
    ],
])

<section class="section" id="sektor">
  <div class="container">
    <div class="ind-tabs rv" role="tablist" aria-label="Pilih industri">
      @foreach ($industriList as $slug => $item)
        <button type="button" @class(['ind-tab', 'active' => $loop->first]) id="tab-{{ $slug }}" data-bs-toggle="tab" data-bs-target="#industri-{{ $slug }}" data-slug="{{ $slug }}" role="tab" aria-controls="industri-{{ $slug }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
          <span class="ico ico-sm"><i class="bi {{ $item['icon'] }}"></i></span>
          <span class="ind-tab-txt"><strong>{!! $item['name'] !!}</strong><small>{!! $item['summary'] !!}</small></span>
        </button>
      @endforeach
    </div>

    <div class="tab-content mt-5">
      @foreach ($industriList as $slug => $item)
        <div @class(['tab-pane fade', 'show active' => $loop->first]) id="industri-{{ $slug }}" role="tabpanel" aria-labelledby="tab-{{ $slug }}" tabindex="0">
          <div class="row g-5">
            <div class="col-lg-5">
              <span class="eyebrow">{!! $item['name'] !!}</span>
              <h2>{!! $item['opening']['title'] !!}</h2>
              @foreach ($item['opening']['paragraphs'] as $paragraph)
                <p class="lead-sm mt-3">{!! $paragraph !!}</p>
              @endforeach
              <div class="ind-quote mt-4">
                <i class="bi bi-quote"></i>
                <div><strong>Keluhan yang sering kami temui</strong>{!! $item['complaint'] !!}</div>
              </div>
              <div class="mt-4">
                <div class="ind-label">Modul yang biasanya dipakai</div>
                <ul class="gate-list mt-2">@foreach ($item['modules'] as $module)<li>{!! $module !!}</li>@endforeach</ul>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="ind-label mb-3">Tantangan yang Sering Dihadapi</div>
              <div class="row g-3">
                @foreach ($item['pains'] as $pain)
                  <div class="col-md-6"><div class="pain">
                    <h4><i class="bi {{ $pain['icon'] }} me-2" style="color:var(--brand)"></i>{!! $pain['title'] !!}</h4>
                    <p>{!! $pain['body'] !!}</p></div></div>
                @endforeach
              </div>
            </div>
          </div>

          <div class="ind-block mt-5">
            <div class="row g-5">
              <div class="col-lg-7">
                <span class="eyebrow">Urutan Implementasi</span>
                <h3 class="ind-h3">Dibangun secara bertahap</h3>
                <p class="lead-sm mt-2 mb-4">Tidak semua modul harus dibangun sekaligus. Tahapan berikut merupakan salah satu pendekatan yang dapat digunakan dan dapat disesuaikan dengan kebutuhan serta prioritas bisnis</p>
                @foreach ($item['phases'] as $phase)
                  <div class="step in"><span class="num">{{ $loop->iteration }}</span><h3>{!! $phase['title'] !!}</h3>
                    <p>{!! $phase['body'] !!}</p><span class="out"><i class="bi bi-check2-circle"></i> {!! $phase['result'] !!}</span></div>
                @endforeach
              </div>
              <div class="col-lg-5">
                <div class="ind-case">
                  <span class="eyebrow">Studi Kasus</span>
                  <div class="row g-3 mt-3">
                    @foreach ($item['case']['metrics'] as $metric)
                      <div class="col-6"><div class="ind-metric">
                        <div class="v">{!! $metric['value'] !!}</div>
                        <div class="l">{!! $metric['label'] !!}</div>
                        <div class="d">{!! $metric['body'] !!}</div>
                      </div></div>
                    @endforeach
                  </div>
                  <a href="{{ route('kontak') }}" class="btn btn-brand w-100 mt-4">Diskusikan kasus serupa <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="row g-5 mt-1">
            <div class="col-lg-4">
              <span class="eyebrow">Tanya jawab</span>
              <h3 class="ind-h3">Pertanyaan khas sektor ini</h3>
              <p class="lead-sm mt-2">Pertanyaan lain? <a href="{{ route('faq') }}">Lihat FAQ lengkap</a> atau hubungi kami langsung.</p>
            </div>
            <div class="col-lg-8">@include('layouts.components.accordion', ['id' => 'faq-industri-'.$slug, 'items' => $item['faq']])</div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- <p class="text-center mt-5 mb-0 rv" style="font-size:.9375rem;color:var(--muted)">
      <i class="bi bi-info-circle me-1"></i>
      Kami juga mengerjakan proyek untuk jasa konsultan, pendidikan, kesehatan, dan koperasi.
      <a href="{{ route('kontak') }}">Ceritakan sektor Anda</a>. Kemungkinan besar polanya mirip.
    </p> --}}
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5 rv">
        <span class="eyebrow">Pola yang berulang</span>
        <h2>Kendala yang Sering Muncul</h2>
        <p class="lead-sm mt-3">
          Dari berbagai proyek dan kebutuhan bisnis yang kami temui, ada beberapa kendala yang terus muncul meskipun industrinya berbeda
        </p>
      </div>
      <div class="col-lg-7">
        <div class="row g-3">
          <div class="col-md-4 rv"><div class="pain">
            <h4><i class="bi bi-1-circle me-2" style="color:var(--brand)"></i>Data Tidak Tunggal</h4>
            <p>Setiap divisi memiliki catatan dan versi angkanya sendiri. Akibatnya, waktu rapat sering habis untuk mencocokkan data sebelum bisa membahas apa yang sebenarnya perlu dilakukan</p></div></div>
          <div class="col-md-4 rv"><div class="pain">
            <h4><i class="bi bi-2-circle me-2" style="color:var(--brand)"></i>Proses Bergantung pada Orang Tertentu</h4>
            <p>Ketika satu orang tidak tersedia, proses persetujuan bisa ikut tertahan. Riwayat siapa yang menyetujui, apa yang disetujui, dan kapan proses dilakukan juga tidak selalu tercatat dengan baik</p></div></div>
          <div class="col-md-4 rv"><div class="pain">
            <h4><i class="bi bi-3-circle me-2" style="color:var(--brand)"></i>Laporan Terlambat</h4>
            <p>Data baru siap setelah proses rekap selesai, bahkan bisa membutuhkan waktu berminggu-minggu setelah periode berakhir. Padahal keputusan bisnis sering kali perlu dibuat jauh lebih cepat</p></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('layouts.components.cta-band')
@endsection

@push('scripts')
<script>
(function () {
  var tabs = document.querySelectorAll('.ind-tab');
  function open(slug, scroll) {
    var tab = document.getElementById('tab-' + slug);
    if (!tab) return;
    bootstrap.Tab.getOrCreateInstance(tab).show();
    if (scroll) document.getElementById('sektor').scrollIntoView({ behavior: 'smooth' });
  }
  tabs.forEach(function (tab) {
    tab.addEventListener('shown.bs.tab', function () {
      history.replaceState(null, '', '#' + tab.dataset.slug);
      document.querySelectorAll(tab.dataset.bsTarget + ' .rv').forEach(function (el) { el.classList.add('in'); });
    });
  });
  if (location.hash) open(location.hash.slice(1), true);
  window.addEventListener('hashchange', function () { open(location.hash.slice(1), true); });
})();
</script>
@endpush
