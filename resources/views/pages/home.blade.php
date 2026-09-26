@extends('layouts.app')

@section('title', 'Pengembang Sistem Bisnis ERP, WMS, HRIS & CRM | Arsytech')
@section('description', 'Arsytech membangun ERP, WMS, HRIS, CRM, dan sistem keuangan terintegrasi untuk perusahaan di Indonesia. Source code jadi milik Anda. Konsultasi awal gratis.')

@section('content')
<section class="hero">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <span class="pill"><span class="tag">SOFTWARE HOUSE B2B</span><span>Bogor · Melayani klien se-Indonesia</span></span>
        <h1>Operasional rapi,<br>keputusan <em>berbasis data</em></h1>
        <p class="lead-lg mt-4 measure-sm">
          Kami membangun ERP, WMS, HRIS, dan CRM yang menyatukan data lintas divisi —
          agar manajemen berhenti menebak dan mulai mengukur.
        </p>
        <div class="hero-cta">
          <a href="{{ route('kontak') }}" class="btn btn-brand btn-lg">Konsultasi Gratis <i class="bi bi-arrow-right ms-1"></i></a>
          <a href="{{ route('solusi.index') }}" class="btn btn-outline-ink btn-lg">Lihat Solusi Kami</a>
        </div>
        <div class="hero-proof">
          <span><i class="bi bi-check-circle-fill"></i>Source code jadi milik Anda</span>
          <span><i class="bi bi-check-circle-fill"></i>Siap tanda tangan NDA</span>
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
      <div class="col"><div class="stat"><div class="s-val" data-count="6" data-suffix="+">6+</div><div class="s-lab">Tahun membangun sistem bisnis</div></div></div>
      <div class="col"><div class="stat"><div class="s-val" data-count="6" data-suffix=" lini">6 lini</div><div class="s-lab">Solusi yang bisa disatukan</div></div></div>
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
        <h2>Vendor teknologi yang bicara bahasa bisnis</h2>
        <p class="lead-sm mt-3">
          Arsytech tumbuh dari kebutuhan nyata perusahaan, bukan dari daftar fitur. Sebelum satu baris kode ditulis,
          kami duduk bersama tim operasional Anda dan memetakan alur kerja yang sebenarnya — termasuk yang tidak
          pernah tertulis di SOP.
        </p>
        <p class="lead-sm mt-3">
          Karena itu kami mengukur keberhasilan dari berubahnya cara kerja tim Anda, bukan dari banyaknya fitur
          yang berhasil kami kirim.
        </p>
        <a href="{{ route('tentang') }}" class="btn btn-outline-ink mt-4">Selengkapnya Tentang Kami <i class="bi bi-arrow-right ms-1"></i></a>
      </div>
      <div class="col-lg-6">
        <div class="row g-3">
          <div class="col-sm-6 rv"><div class="card-x">
            <div class="ico ico-sm"><i class="bi bi-clipboard2-check"></i></div>
            <h3 style="font-size:1rem">Paham proses</h3>
            <p>Analisis alur kerja lebih dulu, koding belakangan.</p>
          </div></div>
          <div class="col-sm-6 rv"><div class="card-x">
            <div class="ico ico-sm"><i class="bi bi-boxes"></i></div>
            <h3 style="font-size:1rem">Modular &amp; scalable</h3>
            <p>Mulai satu modul, tambah yang lain saat siap.</p>
          </div></div>
          <div class="col-sm-6 rv"><div class="card-x">
            <div class="ico ico-sm"><i class="bi bi-eye"></i></div>
            <h3 style="font-size:1rem">Progres transparan</h3>
            <p>Demo tiap sprint, papan progres terbuka.</p>
          </div></div>
          <div class="col-sm-6 rv"><div class="card-x">
            <div class="ico ico-sm"><i class="bi bi-key"></i></div>
            <h3 style="font-size:1rem">Kepemilikan penuh</h3>
            <p>Source code dan database jadi milik Anda.</p>
          </div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="row align-items-end g-3 mb-5 rv">
      <div class="col-lg-7">
        <span class="eyebrow">Karya kami</span>
        <h2>Yang berubah setelah sistemnya jalan</h2>
        <p class="lead-sm mt-3 measure">
          Kami punya pengalaman membangun sistem untuk manufaktur, distribusi &amp; logistik, retail &amp; FMCG,
          jasa konsultan, pendidikan, serta instansi pemerintah dan NGO.
        </p>
      </div>
      <div class="col-lg-5 text-lg-end">
        <a href="{{ route('studi-kasus') }}" class="btn btn-outline-ink">Lihat Semua Studi Kasus <i class="bi bi-arrow-right ms-1"></i></a>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Distribusi FMCG</span>
          <h3>Tiga gudang, satu catatan stok</h3>
          <p>Sebelumnya tiap gudang punya kartu stok sendiri dan opname butuh dua hari dengan operasional dihentikan.</p></div>
        <div class="case-metrics"><div><div class="m-val">99,2%</div><div class="m-lab">akurasi stok<br>dari 87%</div></div>
          <div><div class="m-val">2 jam</div><div class="m-lab">opname bulanan<br>dari 2 hari</div></div></div>
      </article></div>
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Manufaktur</span>
          <h3>Closing bulanan dari 12 hari jadi 3</h3>
          <p>Jurnal kini terbentuk otomatis dari transaksi pembelian dan produksi, bukan diketik ulang tim finance.</p></div>
        <div class="case-metrics"><div><div class="m-val">3 hari</div><div class="m-lab">waktu closing<br>dari 12 hari</div></div>
          <div><div class="m-val">0</div><div class="m-lab">temuan material<br>audit terakhir</div></div></div>
      </article></div>
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Jasa &amp; Konsultan</span>
          <h3>Payroll 240 karyawan tanpa lembur finance</h3>
          <p>Absensi, cuti, dan lembur mengalir langsung ke perhitungan gaji. Tim HR berhenti merekap manual.</p></div>
        <div class="case-metrics"><div><div class="m-val">4 jam</div><div class="m-lab">proses payroll<br>dari 5 hari</div></div>
          <div><div class="m-val">240</div><div class="m-lab">karyawan<br>3 entitas</div></div></div>
      </article></div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow">Dua cara menelusuri</span>
      <h2>Mulai dari sistemnya, atau dari industri Anda</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:60ch">
        Kalau sudah tahu modul apa yang dibutuhkan, masuk lewat Solusi. Kalau masih ingin melihat
        masalah khas sektor Anda lebih dulu, masuk lewat Industri.
      </p>
    </div>
    <div class="row g-4">
      <div class="col-lg-6 rv">
        <a class="gate" href="{{ route('solusi.index') }}">
          <div class="ico"><i class="bi bi-grid-1x2-fill"></i></div>
          <h3>Solusi</h3>
          <p>Empat lini sistem inti yang bisa berdiri sendiri maupun disatukan, ditambah sistem keuangan
            dan website perusahaan sebagai pendukung.</p>
          <ul class="gate-list"><li>ERP</li><li>WMS</li><li>HRIS</li><li>CRM</li><li>Accounting &amp; Finance</li><li>Website &amp; Portal</li></ul>
          <span class="gate-cta">Jelajahi solusi <i class="bi bi-arrow-right"></i></span>
        </a>
      </div>
      <div class="col-lg-6 rv">
        <a class="gate" href="{{ route('industri.index') }}">
          <div class="ico"><i class="bi bi-buildings-fill"></i></div>
          <h3>Industri</h3>
          <p>Masalah operasional berbeda di tiap sektor. Lihat kendala khas industri Anda dan
            kombinasi modul yang biasanya paling cepat memberi hasil.</p>
          <ul class="gate-list"><li>Manufaktur</li><li>Distribusi &amp; Logistik</li><li>Retail &amp; FMCG</li><li>Pemerintahan &amp; NGO</li></ul>
          <span class="gate-cta">Jelajahi industri <i class="bi bi-arrow-right"></i></span>
        </a>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft section-line">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow">Konsultasi gratis</span>
      <h2>Ceritakan dulu masalahnya, penawaran belakangan</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:60ch">
        Sesi pertama kami pakai untuk mendengar, bukan menjual. Tiga hal ini yang Anda dapat, tanpa biaya.
      </p>
    </div>
    <div class="row g-4">
      <div class="col-md-4 rv"><div class="card-x text-center">
        <div class="ico mx-auto"><i class="bi bi-search"></i></div>
        <h3>Analisis Kebutuhan</h3>
        <p>Kami bantu memetakan di mana waktu dan biaya paling banyak terbuang di operasional Anda saat ini.</p>
      </div></div>
      <div class="col-md-4 rv"><div class="card-x text-center">
        <div class="ico mx-auto"><i class="bi bi-file-earmark-ruled"></i></div>
        <h3>Estimasi Tertulis</h3>
        <p>Lingkup, tahapan, perkiraan waktu, dan rentang anggaran — dalam dokumen yang bisa Anda bandingkan.</p>
      </div></div>
      <div class="col-md-4 rv"><div class="card-x text-center">
        <div class="ico mx-auto"><i class="bi bi-shield-lock"></i></div>
        <h3>Jaminan Kerahasiaan</h3>
        <p>Kami siap menandatangani NDA sebelum Anda membuka detail proses dan data bisnis perusahaan.</p>
      </div></div>
    </div>
    <div class="text-center mt-5 rv">
      <a href="{{ route('kontak') }}" class="btn btn-brand btn-lg">Hubungi Tim Kami <i class="bi bi-arrow-right ms-1"></i></a>
    </div>
  </div>
</section>
@endsection
