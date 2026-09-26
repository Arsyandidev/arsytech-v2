@extends('layouts.app')

@section('title', 'Tentang Kami | Arsytech')
@section('description', 'Arsytech adalah pengembang sistem bisnis terintegrasi asal Bogor, bagian dari Clarsyara Group. Kenali cara kerja, nilai, dan komitmen kami kepada klien B2B.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Software house yang tumbuh dari kebutuhan nyata perusahaan',
    'subtitle' => 'Arsytech adalah pengembang sistem bisnis terintegrasi asal Bogor, bagian dari Clarsyara Group. Kami bekerja dengan perusahaan yang operasionalnya sudah terlalu besar untuk diurus dengan spreadsheet.',
    'breadcrumbs' => [
        'Tentang Kami' => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-7 rv">
        <span class="eyebrow">Cerita singkat</span>
        <h2>Kami mulai dari satu keluhan yang sama</h2>
        <p class="lead-sm mt-3">
          Hampir setiap perusahaan yang datang ke kami mengucapkan kalimat yang mirip: <em>“angkanya beda-beda
          tergantung siapa yang ditanya.”</em> Gudang punya catatan sendiri, finance punya rekap sendiri,
          sales punya file sendiri. Semuanya rajin, semuanya rapi di versinya masing-masing — dan tidak satu pun
          bisa dipakai untuk mengambil keputusan dengan tenang.
        </p>
        <p class="lead-sm mt-3">
          Arsytech dibentuk untuk menyelesaikan persoalan itu: menyatukan data lintas divisi ke dalam satu sistem
          yang benar-benar dipakai sehari-hari, bukan sistem yang megah di presentasi lalu ditinggalkan tiga bulan
          kemudian karena tidak cocok dengan cara kerja tim.
        </p>
        <p class="lead-sm mt-3">
          Sebagai bagian dari <strong>Clarsyara Group</strong>, kami mengerjakan proyek dari Bogor dan melayani
          klien di berbagai kota di Indonesia, dari perusahaan keluarga yang sedang tumbuh sampai instansi
          dengan tata kelola yang ketat.
        </p>
      </div>
      <div class="col-lg-5">
        <div class="row g-3">
          <div class="col-6 rv"><div class="card-x flat text-center">
            <div class="s-val" style="font-size:2rem;font-weight:800;color:var(--ink);letter-spacing:-.04em">6+</div>
            <div style="font-size:.8125rem;color:var(--muted)">tahun membangun sistem bisnis</div></div></div>
          <div class="col-6 rv"><div class="card-x flat text-center">
            <div class="s-val" style="font-size:2rem;font-weight:800;color:var(--ink);letter-spacing:-.04em">6</div>
            <div style="font-size:.8125rem;color:var(--muted)">lini solusi yang bisa disatukan</div></div></div>
          <div class="col-6 rv"><div class="card-x flat text-center">
            <div class="s-val" style="font-size:2rem;font-weight:800;color:var(--brand);letter-spacing:-.04em">100%</div>
            <div style="font-size:.8125rem;color:var(--muted)">source code diserahkan ke klien</div></div></div>
          <div class="col-6 rv"><div class="card-x flat text-center">
            <div class="s-val" style="font-size:2rem;font-weight:800;color:var(--ink);letter-spacing:-.04em">1&times;24</div>
            <div style="font-size:.8125rem;color:var(--muted)">jam waktu balas hari kerja</div></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4 rv">
        <div class="card-x h-100">
          <div class="ico"><i class="bi bi-eye-fill"></i></div>
          <h3>Visi</h3>
          <p>Menjadi mitra teknologi yang dipercaya perusahaan Indonesia untuk merapikan operasional —
            bukan sekadar vendor yang menyerahkan aplikasi lalu menghilang.</p>
        </div>
      </div>
      <div class="col-lg-4 rv">
        <div class="card-x h-100">
          <div class="ico"><i class="bi bi-compass-fill"></i></div>
          <h3>Misi</h3>
          <ul class="feat-list tight mt-1">
            <li>Membangun sistem yang mengikuti cara kerja tim, bukan sebaliknya</li>
            <li>Menyerahkan kepemilikan penuh atas kode dan data</li>
            <li>Menjaga proses tetap transparan dari awal sampai purna jual</li>
            <li>Memakai teknologi terbuka agar klien tidak terkunci pada satu vendor</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 rv">
        <div class="card-x h-100">
          <div class="ico"><i class="bi bi-rulers"></i></div>
          <h3>Cara kami menilai keberhasilan</h3>
          <p>Bukan dari jumlah fitur yang dikirim, tapi dari tiga hal: apakah tim benar-benar memakainya setiap hari,
            apakah waktu kerja berkurang, dan apakah manajemen mengambil keputusan dari angka yang sama.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4 rv">
        <span class="eyebrow">Yang membedakan</span>
        <h2>Empat hal yang konsisten kami pegang</h2>
        <p class="lead-sm mt-3">Ini bukan slogan pemasaran — keempatnya tertulis di kontrak dan bisa Anda tagih.</p>
      </div>
      <div class="col-lg-8">
        <div class="row g-4">
          <div class="col-md-6 rv"><div class="card-x">
            <div class="ico"><i class="bi bi-clipboard2-check"></i></div>
            <h3>Paham proses, bukan sekadar koding</h3>
            <p>Kami mulai dengan memetakan alur kerja Anda yang sebenarnya — termasuk kebiasaan yang tidak tertulis
              di SOP — sebelum satu baris kode ditulis.</p></div></div>
          <div class="col-md-6 rv"><div class="card-x">
            <div class="ico"><i class="bi bi-boxes"></i></div>
            <h3>Arsitektur modular &amp; scalable</h3>
            <p>Mulai dari satu modul, tambah yang lain saat siap. Tidak perlu bongkar sistem dari nol ketika
              perusahaan tumbuh atau menambah cabang.</p></div></div>
          <div class="col-md-6 rv"><div class="card-x">
            <div class="ico"><i class="bi bi-eye"></i></div>
            <h3>Progres yang transparan</h3>
            <p>Demo tiap sprint dan papan progres yang bisa Anda buka kapan saja. Tidak ada kejutan di bulan keenam.</p></div></div>
          <div class="col-md-6 rv"><div class="card-x">
            <div class="ico"><i class="bi bi-plug"></i></div>
            <h3>Siap terintegrasi</h3>
            <p>Terhubung dengan sistem yang sudah Anda pakai — akuntansi, mesin absensi, marketplace,
              payment gateway, atau API pihak ketiga.</p></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5 rv">
        <span class="eyebrow">Cara kami bekerja</span>
        <h2>Lima tahap, progres yang bisa Anda pantau</h2>
        <p class="lead-sm mt-3">
          Setiap tahap punya keluaran yang jelas dan bisa Anda pegang. Kalau di tengah jalan Anda ingin berhenti,
          dokumen dan kode yang sudah jadi tetap milik Anda.
        </p>
        <div class="card-x mt-4" style="background:var(--brand-soft);border-color:var(--brand-line);height:auto">
          <div class="d-flex gap-3">
            <i class="bi bi-lightbulb" style="color:var(--brand);font-size:1.5rem"></i>
            <div><h3 style="font-size:.9375rem;margin-bottom:.3rem">Tidak yakin mulai dari mana?</h3>
              <p style="font-size:.875rem;color:var(--ink-3)">Tahap discovery bisa dibeli terpisah. Hasilnya dokumen
                kebutuhan dan estimasi anggaran — yang bebas Anda bawa ke vendor mana pun.</p></div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="ps-lg-4">
          <div class="step rv"><span class="num">1</span><h3>Discovery &amp; Analisis</h3>
            <p>Kami duduk bersama tim operasional Anda, memetakan alur kerja nyata, dan menemukan di mana waktu paling banyak terbuang.</p>
            <span class="out"><i class="bi bi-file-earmark-text"></i> Dokumen kebutuhan &amp; ruang lingkup</span></div>
          <div class="step rv"><span class="num">2</span><h3>Blueprint &amp; Prototipe</h3>
            <p>Arsitektur sistem, rancangan basis data, dan prototipe antarmuka yang bisa diklik — disetujui sebelum pengembangan dimulai.</p>
            <span class="out"><i class="bi bi-diagram-2"></i> Arsitektur sistem disetujui</span></div>
          <div class="step rv"><span class="num">3</span><h3>Pengembangan Bertahap</h3>
            <p>Dikerjakan per sprint dengan demo rutin. Anda melihat sistem tumbuh, bukan menunggu dalam gelap.</p>
            <span class="out"><i class="bi bi-boxes"></i> Rilis modul tiap sprint</span></div>
          <div class="step rv"><span class="num">4</span><h3>UAT &amp; Go-Live</h3>
            <p>Pengujian bersama pengguna akhir, migrasi data lama, dan pelatihan tim sampai benar-benar siap dilepas.</p>
            <span class="out"><i class="bi bi-rocket-takeoff"></i> Pengujian, migrasi, pelatihan</span></div>
          <div class="step rv"><span class="num">5</span><h3>Support &amp; Optimasi</h3>
            <p>Garansi perbaikan bug, dukungan teknis, dan pengembangan lanjutan sesuai prioritas bisnis Anda.</p>
            <span class="out"><i class="bi bi-life-preserver"></i> Dukungan teknis berkelanjutan</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section band-dark">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow on-dark justify-content-center">Komitmen</span>
      <h2>Apa yang Anda dapatkan, hitam di atas putih</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:58ch;color:rgba(255,255,255,.6)">Semuanya tertulis di kontrak, bukan janji lisan saat presentasi.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3 rv"><div class="commit"><div class="ico"><i class="bi bi-key"></i></div>
        <h3>Kepemilikan penuh</h3><p>Source code dan basis data diserahkan seluruhnya ke Anda setelah proyek selesai. Tidak ada biaya lisensi tersembunyi.</p></div></div>
      <div class="col-md-6 col-lg-3 rv"><div class="commit"><div class="ico"><i class="bi bi-shield-lock"></i></div>
        <h3>Keamanan sejak awal</h3><p>Enkripsi data sensitif, kontrol hak akses per peran, dan log audit — dirancang dari hari pertama, bukan ditambal belakangan.</p></div></div>
      <div class="col-md-6 col-lg-3 rv"><div class="commit"><div class="ico"><i class="bi bi-journal-text"></i></div>
        <h3>Dokumentasi &amp; pelatihan</h3><p>Panduan pengguna, dokumentasi teknis, dan sesi pelatihan tim termasuk dalam lingkup pekerjaan.</p></div></div>
      <div class="col-md-6 col-lg-3 rv"><div class="commit"><div class="ico"><i class="bi bi-headset"></i></div>
        <h3>Pendampingan pasca go-live</h3><p>Garansi perbaikan bug dan dukungan teknis setelah sistem berjalan, dengan SLA yang disepakati di awal.</p></div></div>
    </div>
  </div>
</section>

<section class="section-tight section-soft">
  <div class="container">
    <div class="text-center mb-4 rv">
      <span class="eyebrow">Fondasi teknis</span>
      <h2 class="h3" style="font-size:clamp(1.35rem,1.2rem + .7vw,1.75rem)">Teknologi yang kami gunakan</h2>
      <p class="lead-sm mt-2 mx-auto" style="max-width:56ch">Semuanya open source dan umum dipakai — supaya Anda tidak terkunci pada satu vendor, termasuk pada kami.</p>
    </div>
    <div class="row g-3">
      <div class="col-md-6 col-lg-3 rv"><div class="techgrp"><h4>Backend</h4>
        <span class="tech"><i class="bi bi-dot"></i>Laravel</span><span class="tech"><i class="bi bi-dot"></i>Node.js</span><span class="tech"><i class="bi bi-dot"></i>PostgreSQL</span><span class="tech"><i class="bi bi-dot"></i>MySQL</span><span class="tech"><i class="bi bi-dot"></i>Redis</span></div></div>
      <div class="col-md-6 col-lg-3 rv"><div class="techgrp"><h4>Frontend</h4>
        <span class="tech"><i class="bi bi-dot"></i>Vue</span><span class="tech"><i class="bi bi-dot"></i>React</span><span class="tech"><i class="bi bi-dot"></i>Livewire</span><span class="tech"><i class="bi bi-dot"></i>Tailwind</span><span class="tech"><i class="bi bi-dot"></i>Bootstrap</span></div></div>
      <div class="col-md-6 col-lg-3 rv"><div class="techgrp"><h4>Infrastruktur</h4>
        <span class="tech"><i class="bi bi-dot"></i>Linux</span><span class="tech"><i class="bi bi-dot"></i>Docker</span><span class="tech"><i class="bi bi-dot"></i>Nginx</span><span class="tech"><i class="bi bi-dot"></i>AWS</span><span class="tech"><i class="bi bi-dot"></i>GCP</span></div></div>
      <div class="col-md-6 col-lg-3 rv"><div class="techgrp"><h4>Integrasi</h4>
        <span class="tech"><i class="bi bi-dot"></i>REST API</span><span class="tech"><i class="bi bi-dot"></i>Webhook</span><span class="tech"><i class="bi bi-dot"></i>Payment Gateway</span><span class="tech"><i class="bi bi-dot"></i>SSO</span></div></div>
    </div>
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
