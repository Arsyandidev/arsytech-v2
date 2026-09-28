@extends('layouts.app')

@section('title', 'Pembuatan Sistem Bisnis ERP, WMS, HRIS & CRM | Arsytech')
@section('description', 'Arsytech membuat ERP, WMS, HRIS, CRM, dan sistem keuangan yang saling terhubung untuk perusahaan di Indonesia. Penyerahan Source Code, konsultasi awal gratis.')

@section('content')
<section class="hero">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <span class="pill"><span class="tag">SOFTWARE HOUSE B2B</span><span><span class="d-none d-sm-inline">Bogor · Melayani klien se-Indonesia</span><span class="d-sm-none">Bogor · Klien se-Indonesia</span></span></span>
        <h1>Operasional teratur, <em>data laporan lebih <br> Akurat</em></h1>
        <p class="lead-lg mt-4 measure-sm">
          Kami membangun solusi guna menyatukan data operasional perusahaan ke dalam satu sistem terpusat, memastikan manajemen memiliki landasan angka yang valid dan transparan
        </p>
        <div class="hero-cta">
          <a href="{{ route('kontak') }}" class="btn btn-brand btn-lg">Konsultasi Gratis <i class="bi bi-arrow-right ms-1"></i></a>
          <a href="{{ route('solusi.index') }}" class="btn btn-outline-ink btn-lg">Lihat Solusi Kami</a>
        </div>
        <div class="hero-proof">
          <span><i class="bi bi-check-circle-fill"></i>Penyerahan Source Code</span>
          {{-- <span><i class="bi bi-check-circle-fill"></i>Siap tanda tangan NDA</span> --}}
          <span><i class="bi bi-check-circle-fill"></i>Balasan 1&times;24 jam kerja</span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="position-relative">
          <div class="mock">
            <div class="mock-bar"><span class="mock-dot"></span><span class="mock-dot"></span><span class="mock-dot"></span>
              <span class="mock-url"><i class="bi bi-lock-fill"></i> erp.perusahaan-anda.co.id</span></div>
            <div class="mock-body">
              <aside class="mock-side">
                <div class="ms-logo"><span class="d"></span> ERP SUITE</div>
                <div class="mock-nav on"><i class="bi bi-grid-1x2-fill"></i> Dashboard</div>
                <div class="mock-nav"><i class="bi bi-box-seam"></i> Inventori</div>
                <div class="mock-nav"><i class="bi bi-receipt"></i> Purchasing</div>
                <div class="mock-nav"><i class="bi bi-cash-coin"></i> Keuangan</div>
                <div class="mock-nav"><i class="bi bi-people"></i> SDM</div>
                <div class="mock-nav"><i class="bi bi-bar-chart"></i> Laporan</div>
              </aside>
              <div class="mock-main">
                <div class="mock-head"><span class="mock-title">Ringkasan Operasional</span><span class="mock-chip">September 2026</span></div>
                <div class="row g-2 mb-2">
                  <div class="col-4"><div class="kpi"><div class="k-lab">Akurasi Stok</div><div class="k-val">99,2%</div><div class="k-up"><i class="bi bi-arrow-up"></i> 6,4 pt</div></div></div>
                  <div class="col-4"><div class="kpi"><div class="k-lab">Waktu Closing</div><div class="k-val">3 hari</div><div class="k-down"><i class="bi bi-arrow-down"></i> 9 hari</div></div></div>
                  <div class="col-4"><div class="kpi"><div class="k-lab">PO Tertunda</div><div class="k-val">12</div><div class="k-down"><i class="bi bi-arrow-down"></i> 47</div></div></div>
                </div>
                <div class="row g-2">
                  <div class="col-7"><div class="chartbox">
                    <div class="k-lab" style="font-size:.625rem;color:var(--muted);font-weight:600">PENGIRIMAN / MINGGU</div>
                    <div class="bars" aria-hidden="true"><span style="--h:38%"></span><span style="--h:56%"></span><span style="--h:44%"></span><span style="--h:72%"></span><span style="--h:61%"></span><span style="--h:88%"></span><span style="--h:76%"></span><span style="--h:96%"></span></div>
                  </div></div>
                  <div class="col-5"><div class="chartbox">
                    <div class="k-lab mb-1" style="font-size:.625rem;color:var(--muted);font-weight:600">PERSETUJUAN</div>
                    <div class="rowline"><span class="nm">PO-2418</span><span class="badge-soft b-ok">Disetujui</span></div>
                    <div class="rowline"><span class="nm">PO-2419</span><span class="badge-soft b-wait">Menunggu</span></div>
                    <div class="rowline"><span class="nm">RQ-0882</span><span class="badge-soft b-new">Baru</span></div>
                    <div class="rowline"><span class="nm">PO-2420</span><span class="badge-soft b-ok">Disetujui</span></div>
                  </div></div>
                </div>
              </div>
            </div>
          </div>
          <div class="float-card float-a"><div class="d-flex align-items-center gap-2">
            <i class="bi bi-shield-check" style="color:var(--ok);font-size:1.2rem"></i>
            <div><div style="font-size:.6875rem;color:var(--muted);font-weight:600">Audit trail</div><div>Setiap transaksi terlacak</div></div>
          </div></div>
          <div class="float-card float-b"><div class="d-flex align-items-center gap-2">
            <i class="bi bi-arrow-repeat" style="color:var(--brand);font-size:1.2rem"></i>
            <div><div style="font-size:.6875rem;color:var(--muted);font-weight:600">Integrasi</div><div>REST API &amp; Webhook</div></div>
          </div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="statbar">
  <div class="container">
    <div class="row row-cols-2 row-cols-lg-4 g-0">
      <div class="col"><div class="stat"><div class="s-val" data-count="6" data-suffix="+">6+</div><div class="s-lab">Tahun pengalaman</div></div></div>
      <div class="col"><div class="stat"><div class="s-val" data-count="4" data-suffix=" lini">4 lini</div><div class="s-lab">Layanan yang bisa disatukan</div></div></div>
      <div class="col"><div class="stat"><div class="s-val"><i>100%</i></div><div class="s-lab">Source code diserahkan ke klien</div></div></div>
      <div class="col"><div class="stat"><div class="s-val">1&times;24<span style="font-size:.5em;font-weight:600"> jam</span></div><div class="s-lab">Waktu balas hari kerja</div></div></div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6 rv">
        <span class="eyebrow">Tentang Arsytech</span>
        <h2>Solusi teknis yang berkorelasi dengan realita bisnis</h2>
        <p class="lead-sm mt-3">
          Arsytech membantu perusahaan membangun dan mengembangkan sistem digital yang sesuai dengan kebutuhan kerja di lapangan. Kami tidak hanya melihat dari sisi teknis. Kami mempelajari proses kerja, memahami kebutuhan pengguna, lalu menerjemahkannya menjadi solusi yang bisa digunakan dan dikembangkan bersama bisnis Anda.
        </p>
        <p class="lead-sm mt-3">
          Karena bagi kami, software yang baik bukan sekadar memiliki banyak fitur, tetapi benar-benar membantu pekerjaan menjadi lebih mudah, terstruktur, dan efisien.
        </p>
        <a href="{{ route('tentang') }}" class="btn btn-outline-ink mt-4">Selengkapnya Tentang Kami <i class="bi bi-arrow-right ms-1"></i></a>
      </div>
      <div class="col-lg-6">
        <div class="row g-3">
          <div class="col-sm-6 rv"><div class="card-x">
            <div class="ico ico-sm"><i class="bi bi-clipboard2-check"></i></div>
            <h3 style="font-size:1rem">Memahami Proses Bisnis</h3>
            <p>Kami memahami alur kerja dan kebutuhan bisnis Anda sebelum pengembangan dimulai</p>
          </div></div>
          <div class="col-sm-6 rv"><div class="card-x">
            <div class="ico ico-sm"><i class="bi bi-boxes"></i></div>
            <h3 style="font-size:1rem">Pengembangan Bertahap</h3>
            <p>Sistem dibangun secara modular agar dapat dikembangkan dan disesuaikan seiring kebutuhan bisnis</p>
          </div></div>
          <div class="col-sm-6 rv"><div class="card-x">
            <div class="ico ico-sm"><i class="bi bi-eye"></i></div>
            <h3 style="font-size:1rem">Proses Pengembangan Terukur</h3>
            <p>Perkembangan proyek disampaikan secara berkala melalui demo dan evaluasi bersama</p>
          </div></div>
          <div class="col-sm-6 rv"><div class="card-x">
            <div class="ico ico-sm"><i class="bi bi-key"></i></div>
            <h3 style="font-size:1rem">Kepemilikan Penuh</h3>
            <p>Source code, database, dan hasil pengembangan menjadi bagian dari aset perusahaan Anda</p>
          </div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow">Solusi untuk kebutuhan bisnis Anda</span>
      <h2>Mulai dari kebutuhan sistem, atau temukan solusi berdasarkan industri Anda</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:60ch">
        Pilih solusi yang sedang Anda cari, atau lihat berbagai kebutuhan dan tantangan yang umum ditemui di industri Anda.
      </p>
    </div>
    <div class="row g-4">
      <div class="col-lg-6 rv">
        <a class="gate" href="{{ route('solusi.index') }}">
          <div class="ico"><i class="bi bi-grid-1x2-fill"></i></div>
          <h3>Sistem yang dibangun sesuai kebutuhan bisnis Anda</h3>
          <p>Mulai dari ERP hingga aplikasi pendukung operasional, pemasaran, dan pengembangan karyawan. Pilih modul yang dibutuhkan dan kembangkan sesuai kebutuhan bisnis Anda</p>
          <ul class="gate-list"><li>ERP</li><li>Business Operation System</li><li>Advertisement Application</li><li>E-Learning Application</li></ul>
          <span class="gate-cta">Jelajahi solusi <i class="bi bi-arrow-right"></i></span>
        </a>
      </div>
      <div class="col-lg-6 rv">
        <a class="gate" href="{{ route('industri.index') }}">
          <div class="ico"><i class="bi bi-buildings-fill"></i></div>
          <h3>Solusi yang disesuaikan dengan karakter setiap industri</h3>
          <p>Setiap industri memiliki proses dan tantangan yang berbeda. Kami membantu membangun sistem yang menyesuaikan kebutuhan operasional dan cara kerja di bisnis Anda</p>
          <ul class="gate-list"><li>Manufaktur</li><li>Distribusi &amp; Logistik</li><li>Retail &amp; FMCG</li><li>Pemerintahan &amp; NGO</li></ul>
          <span class="gate-cta">Jelajahi industri <i class="bi bi-arrow-right"></i></span>
        </a>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow">Konsultasi gratis</span>
      <h2>Ceritakan kebutuhan bisnis</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:60ch">
        Kami mencoba memahami kebutuhan bisnis Anda dan melihat bagaimana kami dapat membantu.
      </p>
    </div>
    <div class="row g-4">
      <div class="col-md-4 rv"><div class="card-x text-center">
        <div class="ico mx-auto"><i class="bi bi-search"></i></div>
        <h3>Analisis Kebutuhan</h3>
        <p>Kami memahami kebutuhan dan kendala yang ada pada proses bisnis Anda.</p>
      </div></div>
      <div class="col-md-4 rv"><div class="card-x text-center">
        <div class="ico mx-auto"><i class="bi bi-file-earmark-ruled"></i></div>
        <h3>Estimasi & Rencana</h3>
        <p>Kami memberikan gambaran mengenai solusi, tahapan, waktu, dan estimasi biaya.</p>
      </div></div>
      <div class="col-md-4 rv"><div class="card-x text-center">
        <div class="ico mx-auto"><i class="bi bi-shield-lock"></i></div>
        <h3>Kerahasiaan Terjaga</h3>
        <p>Kami menjaga informasi dan data bisnis yang Anda sampaikan selama proses konsultasi.</p>
      </div></div>
    </div>
    <div class="text-center mt-5 rv">
      <a href="{{ route('kontak') }}" class="btn btn-brand btn-lg">Hubungi Tim Kami <i class="bi bi-arrow-right ms-1"></i></a>
    </div>
  </div>
</section>
@endsection
