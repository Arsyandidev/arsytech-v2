@extends('layouts.app')

@section('title', 'Solusi ERP, WMS, HRIS & CRM untuk Perusahaan | Arsytech')
@section('description', 'Empat sistem inti Arsytech, yaitu ERP, WMS, HRIS, dan CRM, ditambah sistem keuangan dan website perusahaan. Bisa dipakai per modul, saling terhubung, dan disesuaikan.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Enam lini solusi dalam satu basis data',
    'subtitle' => 'Tiap sistem bisa dipakai sendiri atau digabung dengan yang lain. Biasanya kami mulai dari masalah yang paling mengganggu, lalu menambah modul berikutnya saat tim siap.',
    'breadcrumbs' => [
        'Solusi' => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow">Sistem inti</span>
      <h2>Empat lini yang paling sering jadi titik awal</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:62ch">
        Kami jarang menyarankan membangun semuanya sekaligus. Pilih satu yang paling menghambat operasional
        saat ini, jalankan sampai stabil, lalu sambungkan yang lain.
      </p>
    </div>
    <div class="row g-4">
      @foreach ($solusiList as $slug => $item)
        <div class="col-md-6 rv"><div class="card-x">
          <div class="ico"><i class="bi {{ $item['icon'] }}"></i></div>
          <h3>{!! $item['card']['title'] !!}</h3>
          <p>{!! $item['card']['body'] !!}</p>
          <ul class="feat-list">@foreach ($item['card']['features'] as $feature)<li>{!! $feature !!}</li>@endforeach</ul>
          <a class="card-link stretched-link" href="{{ route('solusi.show', $slug) }}">Pelajari {{ $item['short'] }} <i class="bi bi-arrow-right"></i></a>
        </div></div>
      @endforeach
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5 rv">
        <span class="eyebrow">Solusi pendukung</span>
        <h2>Dua lini yang melengkapi sistem inti</h2>
        <p class="lead-sm mt-3">
          Keduanya bisa dipesan terpisah, tapi manfaatnya paling terasa kalau sudah tersambung ke sistem inti
          yang Anda jalankan.
        </p>
      </div>
      <div class="col-lg-7">
        <div class="row g-4">
          <div class="col-md-6 rv"><div class="card-x flat">
            <div class="ico"><i class="bi bi-calculator-fill"></i></div>
            <h3>Accounting &amp; Finance</h3>
            <p>Laporan siap diaudit karena jurnalnya terbentuk otomatis dari transaksi operasional.
              Tim finance tidak perlu mengetik ulang.</p>
            <ul class="feat-list"><li>AR/AP, aset tetap, rekonsiliasi bank</li><li>Laporan keuangan &amp; ekspor pajak</li><li>Anggaran vs realisasi</li></ul>
          </div></div>
          <div class="col-md-6 rv"><div class="card-x flat">
            <div class="ico"><i class="bi bi-globe2"></i></div>
            <h3>Website &amp; Portal Perusahaan</h3>
            <p>Website yang cepat dan mudah ditemukan. Pengunjung yang mengisi formulir langsung tercatat
              sebagai prospek di CRM.</p>
            <ul class="feat-list"><li>Company profile &amp; landing page</li><li>Portal vendor, mitra, atau pelanggan</li><li>Terhubung ke sistem internal</li></ul>
          </div></div>
        </div>
      </div>
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
        <div class="col-sm-6 col-lg-3 rv"><a class="card-x card-tap text-center d-block" href="{{ route('industri.show', $slug) }}">
          <div class="ico ico-sm mx-auto"><i class="bi {{ $item['icon'] }}"></i></div>
          <h3 style="font-size:.9375rem">{!! $item['name'] !!}</h3>
          <p style="font-size:.8125rem">{!! $item['summary'] !!}</p></a></div>
      @endforeach
    </div>
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
