@extends('layouts.app')

@section('title', 'Studi Kasus Proyek Sistem Bisnis | Arsytech')
@section('description', 'Enam studi kasus Arsytech: akurasi stok 99,2%, closing bulanan 3 hari, payroll 240 karyawan dalam 4 jam. Lintas manufaktur, distribusi, retail, dan pemerintahan.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Yang berubah setelah sistemnya jalan',
    'subtitle' => 'Sebagian klien kami terikat NDA, jadi nama perusahaan kami samarkan. Angkanya nyata dan bisa kami jelaskan detailnya — termasuk apa yang tidak berjalan mulus — saat sesi konsultasi.',
    'breadcrumbs' => [
        'Studi Kasus' => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Distribusi FMCG</span>
          <h3>Tiga gudang, satu catatan stok</h3>
          <p><strong style="color:var(--ink-3)">Sebelumnya:</strong> Tiap gudang menjalankan kartu stok sendiri dan opname bulanan butuh dua hari penuh dengan operasional dihentikan.</p>
          <p class="mt-2"><strong style="color:var(--ink-3)">Yang kami bangun:</strong> WMS berbasis barcode dengan cycle counting per zona, ditambah modul persediaan ERP untuk menyatukan catatan antar lokasi.</p>
          <ul class="gate-list mt-3"><li>WMS + ERP</li></ul></div>
        <div class="case-metrics"><div><div class="m-val">99,2%</div><div class="m-lab">akurasi stok<br>dari 87%</div></div><div><div class="m-val">2 jam</div><div class="m-lab">opname bulanan<br>dari 2 hari</div></div></div>
        <div class="px-4 pb-4"><a class="card-link mt-0" href="{{ route('solusi.show', 'wms') }}">Pelajari pendekatannya <i class="bi bi-arrow-right"></i></a></div>
      </article></div>
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Manufaktur</span>
          <h3>Closing bulanan dari 12 hari jadi 3</h3>
          <p><strong style="color:var(--ink-3)">Sebelumnya:</strong> Pemakaian bahan direkap dari lembar kerja fisik, sehingga laporan keuangan baru siap dua minggu setelah bulan berakhir.</p>
          <p class="mt-2"><strong style="color:var(--ink-3)">Yang kami bangun:</strong> Modul produksi dan purchasing yang membentuk jurnal otomatis seiring perintah kerja berjalan.</p>
          <ul class="gate-list mt-3"><li>ERP + Finance</li></ul></div>
        <div class="case-metrics"><div><div class="m-val">3 hari</div><div class="m-lab">waktu closing<br>dari 12 hari</div></div><div><div class="m-val">0</div><div class="m-lab">temuan material<br>audit terakhir</div></div></div>
        <div class="px-4 pb-4"><a class="card-link mt-0" href="{{ route('industri.show', 'manufaktur') }}">Pelajari pendekatannya <i class="bi bi-arrow-right"></i></a></div>
      </article></div>
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Jasa &amp; Konsultan</span>
          <h3>Payroll 240 karyawan tanpa lembur finance</h3>
          <p><strong style="color:var(--ink-3)">Sebelumnya:</strong> Absensi keluar dari mesin sebagai file mentah, lalu dicocokkan manual dengan catatan cuti sebelum gaji dihitung.</p>
          <p class="mt-2"><strong style="color:var(--ink-3)">Yang kami bangun:</strong> HRIS dengan integrasi mesin absensi, persetujuan cuti berjenjang, dan portal mandiri karyawan.</p>
          <ul class="gate-list mt-3"><li>HRIS</li></ul></div>
        <div class="case-metrics"><div><div class="m-val">4 jam</div><div class="m-lab">proses payroll<br>dari 5 hari</div></div><div><div class="m-val">240</div><div class="m-lab">karyawan<br>3 entitas</div></div></div>
        <div class="px-4 pb-4"><a class="card-link mt-0" href="{{ route('solusi.show', 'hris') }}">Pelajari pendekatannya <i class="bi bi-arrow-right"></i></a></div>
      </article></div>
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Retail &amp; FMCG</span>
          <h3>Pengisian ulang stok berhenti jadi tebakan</h3>
          <p><strong style="color:var(--ink-3)">Sebelumnya:</strong> Laporan penjualan datang mingguan dalam bentuk Excel per toko, sehingga pusat tidak tahu SKU mana yang benar-benar bergerak.</p>
          <p class="mt-2"><strong style="color:var(--ink-3)">Yang kami bangun:</strong> Pencatatan penjualan seragam lintas outlet, ditambah laporan perputaran per SKU dan saran pengisian ulang berbasis data.</p>
          <ul class="gate-list mt-3"><li>ERP + Analitik</li></ul></div>
        <div class="case-metrics"><div><div class="m-val">Realtime</div><div class="m-lab">stok per outlet<br>dari mingguan</div></div><div><div class="m-val">Per SKU</div><div class="m-lab">analisis perputaran<br>cepat vs lambat</div></div></div>
        <div class="px-4 pb-4"><a class="card-link mt-0" href="{{ route('industri.show', 'retail') }}">Pelajari pendekatannya <i class="bi bi-arrow-right"></i></a></div>
      </article></div>
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Distribusi B2B</span>
          <h3>Sales berhenti menjanjikan barang yang tidak ada</h3>
          <p><strong style="color:var(--ink-3)">Sebelumnya:</strong> Tim lapangan menutup pesanan tanpa tahu stok sudah dialokasikan ke pelanggan lain, memicu pembatalan dan keluhan.</p>
          <p class="mt-2"><strong style="color:var(--ink-3)">Yang kami bangun:</strong> CRM yang menampilkan ketersediaan stok dan status piutang pelanggan langsung di HP sales saat kunjungan.</p>
          <ul class="gate-list mt-3"><li>CRM + ERP</li></ul></div>
        <div class="case-metrics"><div><div class="m-val">0</div><div class="m-lab">pesanan batal<br>karena stok</div></div><div><div class="m-val">&lt;1 hari</div><div class="m-lab">susun laporan sales<br>dari 2 hari</div></div></div>
        <div class="px-4 pb-4"><a class="card-link mt-0" href="{{ route('solusi.show', 'crm') }}">Pelajari pendekatannya <i class="bi bi-arrow-right"></i></a></div>
      </article></div>
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Pemerintahan &amp; NGO</span>
          <h3>Permintaan audit dijawab dalam hitungan menit</h3>
          <p><strong style="color:var(--ink-3)">Sebelumnya:</strong> Persetujuan tersimpan di berkas fisik, realisasi anggaran di spreadsheet, dan bukti pendukung di folder terpisah.</p>
          <p class="mt-2"><strong style="color:var(--ink-3)">Yang kami bangun:</strong> Alur persetujuan digital dengan lampiran bukti yang tertaut ke setiap transaksi dan jejak audit lengkap.</p>
          <ul class="gate-list mt-3"><li>ERP + Tata Kelola</li></ul></div>
        <div class="case-metrics"><div><div class="m-val">Otomatis</div><div class="m-lab">penyusunan laporan<br>dari rekap manual</div></div><div><div class="m-val">100%</div><div class="m-lab">transaksi berjejak<br>siapa, kapan, apa</div></div></div>
        <div class="px-4 pb-4"><a class="card-link mt-0" href="{{ route('industri.show', 'pemerintahan') }}">Pelajari pendekatannya <i class="bi bi-arrow-right"></i></a></div>
      </article></div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5 rv">
        <span class="eyebrow">Cara membacanya</span>
        <h2>Kenapa kami tidak menyebut nama klien</h2>
        <p class="lead-sm mt-3">
          Sebagian besar proyek kami menyentuh data operasional dan keuangan yang sensitif. Perjanjian
          kerahasiaan berlaku dua arah, dan kami memilih menghormatinya daripada memakai logo klien
          sebagai alat jualan.
        </p>
        <p class="lead-sm mt-3">
          Yang bisa kami lakukan: menjelaskan konteksnya secara rinci dalam pertemuan, dan — bila klien
          bersangkutan mengizinkan — memfasilitasi percakapan langsung antara Anda dan mereka.
        </p>
        <a href="{{ route('kontak') }}" class="btn btn-brand mt-4">Minta studi kasus lengkap <i class="bi bi-arrow-right ms-1"></i></a>
      </div>
      <div class="col-lg-7">
        <div class="row g-3">
          <div class="col-md-6 rv"><div class="card-x flat">
            <div class="ico ico-sm"><i class="bi bi-file-earmark-lock"></i></div>
            <h3 style="font-size:1rem">Dokumen rinci saat pertemuan</h3>
            <p>Lingkup, tantangan, durasi, dan pelajaran yang kami ambil dari tiap proyek.</p></div></div>
          <div class="col-md-6 rv"><div class="card-x flat">
            <div class="ico ico-sm"><i class="bi bi-telephone"></i></div>
            <h3 style="font-size:1rem">Referensi langsung</h3>
            <p>Bila klien mengizinkan, Anda bisa berbicara langsung dengan tim mereka.</p></div></div>
          <div class="col-md-6 rv"><div class="card-x flat">
            <div class="ico ico-sm"><i class="bi bi-display"></i></div>
            <h3 style="font-size:1rem">Demo sistem berjalan</h3>
            <p>Kami tunjukkan sistem serupa dengan data contoh, bukan tangkapan layar statis.</p></div></div>
          <div class="col-md-6 rv"><div class="card-x flat">
            <div class="ico ico-sm"><i class="bi bi-exclamation-triangle"></i></div>
            <h3 style="font-size:1rem">Termasuk yang gagal</h3>
            <p>Kami ceritakan juga proyek yang molor dan kenapa — supaya Anda bisa menghindarinya.</p></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
