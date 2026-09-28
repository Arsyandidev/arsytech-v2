@extends('layouts.app')

@section('title', 'Solusi Arsytech: ERP dan Aplikasi Bisnis Terintegrasi | Arsytech')
@section('description', 'Arsytech Nawasena Service: ERP sebagai layanan inti, ditambah aplikasi operasional bisnis (HRIS, WMS, CRM, akuntansi), aplikasi pemasaran, dan e-learning untuk perusahaan.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'ERP sebagai inti, ditambah aplikasi yang saling terhubung',
    'subtitle' => 'Arsytech Nawasena Service terdiri dari ERP sebagai layanan inti dan tiga kelompok aplikasi: operasional bisnis, pemasaran, dan e-learning. Semuanya bisa dipakai bertahap sesuai kesiapan tim Anda.',
    'breadcrumbs' => [
        'Solusi' => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 rv">
        <span class="eyebrow">Layanan inti</span>
        <h2>{!! $erp['card']['title'] !!}</h2>
        <p class="lead-sm mt-3">{!! $erp['card']['body'] !!}</p>
        <ul class="feat-list mt-3" style="font-size:.9375rem">
          @foreach ($erp['card']['features'] as $feature)
            <li>{!! $feature !!}</li>
          @endforeach
        </ul>
        <div class="d-flex flex-wrap gap-2 mt-4">
          <a href="{{ route('solusi.show', 'erp') }}" class="btn btn-brand">Pelajari ERP <i class="bi bi-arrow-right ms-1"></i></a>
          <a href="{{ route('kontak') }}" class="btn btn-outline-ink">Diskusikan kebutuhan ERP</a>
        </div>
      </div>
      <div class="col-lg-6 rv">@include('pages.solusi.mocks.erp')</div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow">Arsytech Nawasena Service</span>
      <h2>Tiga kelompok aplikasi pendukung</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:62ch">
        Setiap kelompok berisi beberapa aplikasi yang bisa dipakai sendiri atau dihubungkan ke ERP.
        Pilih salah satu untuk melihat aplikasi di dalamnya.
      </p>
    </div>
    <div class="row g-4">
      @foreach ($kategoriList as $slug => $item)
        <div class="col-lg-4 rv">
          <a class="card-x card-tap d-flex flex-column h-100" href="{{ route('solusi.show', $slug) }}">
            <div class="ico"><i class="bi {{ $item['icon'] }}"></i></div>
            <h3>{!! $item['name'] !!}</h3>
            <p>{!! $item['summary'] !!}</p>
            <ul class="feat-list tight mt-3 mb-4" style="font-size:.875rem">
              @foreach ($item['apps'] as $app)
                <li>{!! $app['name'] !!}</li>
              @endforeach
            </ul>
            <span class="card-link mt-auto">Lihat aplikasinya <i class="bi bi-arrow-right"></i></span>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>


<section class="section">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 rv">
        <span class="eyebrow">Kenapa disatukan</span>
        <h2>Manfaatnya terasa saat modul terhubung</h2>
        <p class="lead-sm mt-3">
          Satu modul saja sudah membantu. Manfaat terbesarnya baru terasa ketika penerimaan barang di gudang
          langsung membentuk jurnal, absensi langsung dihitung ke payroll, dan deal yang ditutup sales otomatis
          menjadi sales order.
        </p>
        <ul class="feat-list mt-3" style="font-size:.9375rem">
          <li>Data cukup diinput sekali untuk semua divisi</li>
          <li>Satu identitas pengguna untuk semua modul (SSO)</li>
          <li>Hak akses diatur per peran, bukan per aplikasi</li>
          <li>Laporan lintas divisi tanpa ekspor-impor manual</li>
        </ul>
        <a href="{{ route('kontak') }}" class="btn btn-brand mt-4">Diskusikan kombinasi modul <i class="bi bi-arrow-right ms-1"></i></a>
      </div>
      <div class="col-lg-6 rv">
        <div class="mock">
          <div class="mock-bar"><span class="mock-dot"></span><span class="mock-dot"></span><span class="mock-dot"></span>
            <span class="mock-url">Alur data antar modul</span></div>
          <div class="mock-body"><div class="mock-main">
            <div class="mock-head"><span class="mock-title">Satu transaksi, empat modul</span><span class="mock-chip">Otomatis</span></div>
            <div class="chartbox">
              <div class="rowline" style="padding:.6rem 0"><span class="nm"><i class="bi bi-box-seam me-2" style="color:var(--brand)"></i>WMS: Barang diterima di gudang</span><span class="badge-soft b-ok">Pemicu</span></div>
              <div class="rowline" style="padding:.6rem 0"><span class="nm"><i class="bi bi-diagram-3 me-2" style="color:var(--brand)"></i>ERP: Stok &amp; PO diperbarui</span><span class="badge-soft b-new">Otomatis</span></div>
              <div class="rowline" style="padding:.6rem 0"><span class="nm"><i class="bi bi-calculator me-2" style="color:var(--brand)"></i>Finance: Jurnal persediaan terbentuk</span><span class="badge-soft b-new">Otomatis</span></div>
              <div class="rowline" style="padding:.6rem 0"><span class="nm"><i class="bi bi-graph-up-arrow me-2" style="color:var(--brand)"></i>CRM: Ketersediaan stok terlihat sales</span><span class="badge-soft b-new">Otomatis</span></div>
            </div>
            <div class="row g-2 mt-2">
              <div class="col-6"><div class="kpi"><div class="k-lab">Entri Manual</div><div class="k-val">1&times;</div><div class="k-up">dari 4&times;</div></div></div>
              <div class="col-6"><div class="kpi"><div class="k-lab">Selisih Antar Divisi</div><div class="k-val">0</div><div class="k-up">data tunggal</div></div></div>
            </div>
          </div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow">Lewat industri</span>
      <h2>Belum yakin modul mana yang Anda perlukan?</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:58ch">
        Coba lihat dari sisi industri Anda. Urutan prioritas tiap sektor biasanya berbeda.
      </p>
    </div>
    <div class="row g-3 justify-content-center">
      @foreach ($industriList as $slug => $item)
        <div class="col-sm-6 col-lg-3 rv"><a class="card-x card-tap text-center d-block" href="{{ route('industri.index').'#'.$slug }}">
          <div class="ico ico-sm mx-auto"><i class="bi {{ $item['icon'] }}"></i></div>
          <h3 style="font-size:.9375rem">{!! $item['name'] !!}</h3>
          <p style="font-size:.8125rem">{!! $item['summary'] !!}</p></a></div>
      @endforeach
    </div>
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
