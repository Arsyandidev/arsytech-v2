@extends('layouts.app')

@section('title', 'Studi Kasus Implementasi Sistem Bisnis | Arsytech')
@section('description', 'Enam studi kasus Arsytech di manufaktur, distribusi, retail, dan pemerintahan. Di antaranya akurasi stok 99,2%, closing bulanan 3 hari, dan payroll 240 karyawan dalam 4 jam.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Yang berubah setelah sistemnya jalan',
    'subtitle' => 'Sebagian klien kami terikat NDA, jadi nama perusahaannya kami samarkan. Angkanya nyata. Detailnya, termasuk bagian yang tidak berjalan sesuai rencana, bisa kami jelaskan saat sesi konsultasi.',
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
          <p><strong style="color:var(--ink-3)">Sebelumnya:</strong> Tiap gudang memegang kartu stok sendiri. Opname bulanan makan waktu dua hari penuh dan operasional harus dihentikan.</p>
          <p class="mt-2"><strong style="color:var(--ink-3)">Yang kami bangun:</strong> WMS berbasis barcode dengan cycle counting per zona, plus modul persediaan ERP supaya catatan semua lokasi jadi satu.</p>
          <ul class="gate-list mt-3"><li>WMS + ERP</li></ul></div>
        <div class="case-metrics"><div><div class="m-val">99,2%</div><div class="m-lab">akurasi stok<br>dari 87%</div></div><div><div class="m-val">2 jam</div><div class="m-lab">opname bulanan<br>dari 2 hari</div></div></div>
        <div class="px-4 pb-4"><a class="card-link mt-0" href="{{ route('solusi.show', 'wms') }}">Pelajari pendekatannya <i class="bi bi-arrow-right"></i></a></div>
      </article></div>
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Manufaktur</span>
          <h3>Closing bulanan dari 12 hari jadi 3</h3>
          <p><strong style="color:var(--ink-3)">Sebelumnya:</strong> Pemakaian bahan direkap dari lembar kerja kertas, jadi laporan keuangan baru siap dua minggu setelah tutup bulan.</p>
          <p class="mt-2"><strong style="color:var(--ink-3)">Yang kami bangun:</strong> Modul produksi dan purchasing yang membuat jurnal secara otomatis selama perintah kerja berjalan.</p>
          <ul class="gate-list mt-3"><li>ERP + Finance</li></ul></div>
        <div class="case-metrics"><div><div class="m-val">3 hari</div><div class="m-lab">waktu closing<br>dari 12 hari</div></div><div><div class="m-val">0</div><div class="m-lab">temuan material<br>audit terakhir</div></div></div>
        <div class="px-4 pb-4"><a class="card-link mt-0" href="{{ route('industri.show', 'manufaktur') }}">Pelajari pendekatannya <i class="bi bi-arrow-right"></i></a></div>
      </article></div>
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Jasa &amp; Konsultan</span>
          <h3>Payroll 240 karyawan tanpa lembur finance</h3>
          <p><strong style="color:var(--ink-3)">Sebelumnya:</strong> Data absensi keluar dari mesin sebagai file mentah, lalu dicocokkan manual dengan catatan cuti sebelum gaji dihitung.</p>
          <p class="mt-2"><strong style="color:var(--ink-3)">Yang kami bangun:</strong> HRIS dengan integrasi mesin absensi, persetujuan cuti berjenjang, dan portal mandiri karyawan.</p>
          <ul class="gate-list mt-3"><li>HRIS</li></ul></div>
        <div class="case-metrics"><div><div class="m-val">4 jam</div><div class="m-lab">proses payroll<br>dari 5 hari</div></div><div><div class="m-val">240</div><div class="m-lab">karyawan<br>3 entitas</div></div></div>
        <div class="px-4 pb-4"><a class="card-link mt-0" href="{{ route('solusi.show', 'hris') }}">Pelajari pendekatannya <i class="bi bi-arrow-right"></i></a></div>
      </article></div>
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Retail &amp; FMCG</span>
          <h3>Pengisian ulang stok kini pakai data</h3>
          <p><strong style="color:var(--ink-3)">Sebelumnya:</strong> Tiap toko mengirim laporan penjualan dalam Excel seminggu sekali, jadi kantor pusat sulit melihat SKU mana yang benar-benar laku.</p>
          <p class="mt-2"><strong style="color:var(--ink-3)">Yang kami bangun:</strong> Pencatatan penjualan yang sama di semua outlet, laporan perputaran per SKU, dan saran pengisian ulang dari data penjualan.</p>
          <ul class="gate-list mt-3"><li>ERP + Analitik</li></ul></div>
        <div class="case-metrics"><div><div class="m-val">Realtime</div><div class="m-lab">stok per outlet<br>dari mingguan</div></div><div><div class="m-val">Per SKU</div><div class="m-lab">analisis perputaran<br>cepat vs lambat</div></div></div>
        <div class="px-4 pb-4"><a class="card-link mt-0" href="{{ route('industri.show', 'retail') }}">Pelajari pendekatannya <i class="bi bi-arrow-right"></i></a></div>
      </article></div>
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Distribusi B2B</span>
          <h3>Sales tidak lagi menjual stok yang kosong</h3>
          <p><strong style="color:var(--ink-3)">Sebelumnya:</strong> Tim lapangan menerima pesanan tanpa tahu stoknya sudah dialokasikan ke pelanggan lain. Akibatnya pesanan batal dan pelanggan mengeluh.</p>
          <p class="mt-2"><strong style="color:var(--ink-3)">Yang kami bangun:</strong> CRM yang menampilkan stok tersedia dan status piutang pelanggan langsung di HP sales saat kunjungan.</p>
          <ul class="gate-list mt-3"><li>CRM + ERP</li></ul></div>
        <div class="case-metrics"><div><div class="m-val">0</div><div class="m-lab">pesanan batal<br>karena stok</div></div><div><div class="m-val">&lt;1 hari</div><div class="m-lab">susun laporan sales<br>dari 2 hari</div></div></div>
        <div class="px-4 pb-4"><a class="card-link mt-0" href="{{ route('solusi.show', 'crm') }}">Pelajari pendekatannya <i class="bi bi-arrow-right"></i></a></div>
      </article></div>
      <div class="col-md-6 col-lg-4 rv"><article class="case">
        <div class="case-top"><span class="case-sector">Pemerintahan &amp; NGO</span>
          <h3>Permintaan audit dijawab dalam hitungan menit</h3>
          <p><strong style="color:var(--ink-3)">Sebelumnya:</strong> Persetujuan disimpan dalam berkas fisik, realisasi anggaran di spreadsheet, dan bukti pendukung di folder terpisah.</p>
          <p class="mt-2"><strong style="color:var(--ink-3)">Yang kami bangun:</strong> Alur persetujuan digital, dengan bukti yang dilampirkan di setiap transaksi dan jejak audit yang lengkap.</p>
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
          Sebagian besar proyek kami bersentuhan dengan data operasional dan keuangan yang sensitif.
          Perjanjian kerahasiaan berlaku untuk kedua pihak, jadi kami tidak memakai logo klien untuk
          keperluan promosi.
        </p>
        <p class="lead-sm mt-3">
          Sebagai gantinya, kami bisa menjelaskan konteks proyeknya secara rinci saat bertemu. Kalau klien
          yang bersangkutan mengizinkan, kami juga bisa mempertemukan Anda langsung dengan mereka.
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
            <p>Kalau klien mengizinkan, Anda bisa bicara langsung dengan tim mereka.</p></div></div>
          <div class="col-md-6 rv"><div class="card-x flat">
            <div class="ico ico-sm"><i class="bi bi-display"></i></div>
            <h3 style="font-size:1rem">Demo sistem berjalan</h3>
            <p>Kami tunjukkan sistem serupa yang benar-benar berjalan, memakai data contoh.</p></div></div>
          <div class="col-md-6 rv"><div class="card-x flat">
            <div class="ico ico-sm"><i class="bi bi-exclamation-triangle"></i></div>
            <h3 style="font-size:1rem">Termasuk yang gagal</h3>
            <p>Kami juga cerita soal proyek yang molor dan penyebabnya, supaya Anda bisa menghindarinya.</p></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
