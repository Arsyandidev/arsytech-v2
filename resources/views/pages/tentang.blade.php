@extends('layouts.app')

@section('title', 'Tentang Kami, Software House di Bogor | Arsytech')
@section('description', 'Arsytech adalah pengembang sistem bisnis terintegrasi di Bogor, bagian dari Clarsyara Group. Di sini Anda bisa membaca cara kerja kami dan komitmen kami kepada klien B2B.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Pengembangan sistem untuk kebutuhan bisnis',
    'subtitle' => 'Arsytech mengembangkan sistem dan aplikasi yang disesuaikan dengan kebutuhan perusahaan. Mulai dari sistem operasional, ERP, hingga aplikasi pendukung bisnis, kami membantu mengubah kebutuhan dan proses kerja menjadi solusi digital.',
    'breadcrumbs' => [
        'Tentang Kami' => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-7 rv">
        <span class="eyebrow">Sekilas</span>
        <h2>Membangun sistem yang sesuai dengan cara kerja bisnis</h2>
        <p class="lead-sm mt-3">
          Setiap perusahaan memiliki proses kerja dan kebutuhan yang berbeda. Karena itu, kami percaya bahwa sistem yang baik tidak seharusnya memaksa perusahaan mengubah cara kerjanya hanya agar sesuai dengan aplikasi.
        </p>
        <p class="lead-sm mt-3">
          Arsytech membantu perusahaan mengembangkan sistem dan aplikasi yang disesuaikan dengan kebutuhan operasional, mulai dari pengelolaan data hingga proses bisnis antar divisi. Kami tidak hanya berfokus pada bagaimana sebuah sistem dibangun, tetapi juga bagaimana sistem tersebut digunakan, dikembangkan, dan menjadi bagian dari pekerjaan sehari-hari.
        </p>
        <p class="lead-sm mt-3">
          Sebagai bagian dari <strong>Clarsyara Group</strong>, Arsytech terus membangun solusi teknologi untuk membantu perusahaan bekerja dengan sistem yang lebih terstruktur.
        </p>
      </div>
      <div class="col-lg-5">
        <div class="row g-3">
          <div class="col-6 rv"><div class="card-x flat text-center">
            <div class="s-val" style="font-size:2rem;font-weight:800;color:var(--ink);letter-spacing:-.04em">6+</div>
            <div style="font-size:.8125rem;color:var(--muted)">Tahun pengalaman</div></div></div>
          <div class="col-6 rv"><div class="card-x flat text-center">
            <div class="s-val" style="font-size:2rem;font-weight:800;color:var(--ink);letter-spacing:-.04em">4</div>
            <div style="font-size:.8125rem;color:var(--muted)">Lini layanan yang bisa disatukan</div></div></div>
          <div class="col-6 rv"><div class="card-x flat text-center">
            <div class="s-val" style="font-size:2rem;font-weight:800;color:var(--brand);letter-spacing:-.04em">100%</div>
            <div style="font-size:.8125rem;color:var(--muted)">Source code diserahkan ke klien</div></div></div>
          <div class="col-6 rv"><div class="card-x flat text-center">
            <div class="s-val" style="font-size:2rem;font-weight:800;color:var(--ink);letter-spacing:-.04em">1&times;24</div>
            <div style="font-size:.8125rem;color:var(--muted)">Jam waktu balas hari kerja</div></div></div>
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
          <p>Membangun hubungan jangka panjang dengan menyediakan solusi teknologi yang dapat digunakan, dikembangkan, dan disesuaikan dengan kebutuhan bisnis</p>
        </div>
      </div>
      <div class="col-lg-4 rv">
        <div class="card-x h-100">
          <div class="ico"><i class="bi bi-compass-fill"></i></div>
          <h3>Misi</h3>
          <ul class="feat-list tight mt-1">
            <li>Mengembangkan sistem yang sesuai dengan proses dan kebutuhan perusahaan</li>
            <li>Memberikan kepemilikan penuh atas source code dan data kepada klien</li>
            <li>Menjaga komunikasi dan keterbukaan selama proses pengembangan</li>
            <li>Memakai teknologi terbuka supaya klien tidak bergantung pada satu vendor</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 rv">
        <div class="card-x h-100">
          <div class="ico"><i class="bi bi-rulers"></i></div>
          <h3>Fokus Kami</h3>
          <p>Bagi kami, keberhasilan sebuah sistem tidak hanya dilihat dari aplikasi yang selesai dibuat. Yang terpenting adalah bagaimana sistem tersebut digunakan dalam pekerjaan sehari-hari, membantu proses menjadi lebih efisien, dan menyediakan informasi yang dapat digunakan perusahaan untuk mengambil keputusan</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4 rv">
        <span class="eyebrow">Cara Kami Bekerja</span>
        <h2>4 prinsip kami bekerja</h2>
        <p class="lead-sm mt-3">Harapan kami adalah proses pengembangan berjalan jelas sejak awal, dengan ruang untuk berkembang sesuai kebutuhan perusahaan</p>
      </div>
      <div class="col-lg-8">
        <div class="row g-4">
          <div class="col-md-6 rv"><div class="card-x">
            <div class="ico"><i class="bi bi-clipboard2-check"></i></div>
            <h3>Memahami Proses Bisnis</h3>
            <p>Sebelum pengembangan dimulai, kami mempelajari alur kerja dan kebutuhan sistem agar solusi yang dibangun sesuai dengan proses bisnis yang sebenarnya</p></div></div>
          <div class="col-md-6 rv"><div class="card-x">
            <div class="ico"><i class="bi bi-boxes"></i></div>
            <h3>Fleksibel untuk Dikembangkan</h3>
            <p>Sistem dibangun secara modular sehingga dapat dimulai dari kebutuhan yang paling penting dan dikembangkan seiring pertumbuhan perusahaan.</p></div></div>
          <div class="col-md-6 rv"><div class="card-x">
            <div class="ico"><i class="bi bi-eye"></i></div>
            <h3>Proses yang Terbuka</h3>
            <p>Perkembangan proyek disampaikan secara berkala melalui demo dan pembaruan progres, sehingga setiap tahap pengembangan dapat dipantau bersama.</p></div></div>
          <div class="col-md-6 rv"><div class="card-x">
            <div class="ico"><i class="bi bi-plug"></i></div>
            <h3>Terhubung dengan Sistem Lain</h3>
            <p>Sistem dapat diintegrasikan dengan aplikasi, perangkat, dan layanan pihak ketiga yang sudah digunakan perusahaan.</p></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section band-dark">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow on-dark justify-content-center">Komitmen</span>
      <h2>Hal penting yang kami sepakati sejak awal</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:58ch;color:rgba(255,255,255,.6)">Setiap poin penting dalam proyek kami dituangkan secara jelas dalam kontrak kerja sama, agar kedua pihak memiliki acuan yang sama dari awal hingga sistem berjalan</p>
    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3 rv"><div class="commit"><div class="ico"><i class="bi bi-key"></i></div>
        <h3>Kepemilikan Penuh</h3><p>Source code, database, dan hasil pengembangan menjadi milik Anda setelah proyek diselesaikan. Tidak ada biaya lisensi tambahan yang tidak disepakati sebelumnya</p></div></div>
      <div class="col-md-6 col-lg-3 rv"><div class="commit"><div class="ico"><i class="bi bi-shield-lock"></i></div>
        <h3>Keamanan</h3><p>Keamanan bukan tahap terakhir dalam pengembangan. Hak akses berbasis peran, perlindungan data sensitif, dan pencatatan aktivitas sistem dirancang sebagai bagian dari sistem sejak awal</p></div></div>
      <div class="col-md-6 col-lg-3 rv"><div class="commit"><div class="ico"><i class="bi bi-journal-text"></i></div>
        <h3>Dokumentasi &amp; pelatihan</h3><p>Setiap sistem dilengkapi dokumentasi yang dibutuhkan untuk operasional dan pengelolaan teknis. Kami juga memberikan pelatihan kepada tim Anda sebelum sistem digunakan</p></div></div>
      <div class="col-md-6 col-lg-3 rv"><div class="commit"><div class="ico"><i class="bi bi-headset"></i></div>
        <h3>Pendampingan pasca go-live</h3><p>Setelah sistem digunakan, kami tetap mendampingi melalui masa garansi perbaikan bug dan dukungan teknis sesuai ketentuan serta SLA yang disepakati</p></div></div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5 rv">
        <span class="eyebrow">Tahapan Pengembangan</span>
        <h2>Pengembangan yang terstruktur</h2>
        <p class="lead-sm mt-3">
          Setiap proyek memiliki tahapan yang jelas, mulai dari memahami kebutuhan, merancang solusi, hingga sistem siap digunakan dan dikembangkan lebih lanjut
        </p>
        <div class="card-x mt-4" style="background:var(--brand-soft);border-color:var(--brand-line);height:auto">
          <div class="d-flex gap-3">
            <i class="bi bi-lightbulb" style="color:var(--brand);font-size:1.5rem"></i>
            <div><h3 style="font-size:.9375rem;margin-bottom:.3rem">Belum tahu mulai dari mana?</h3>
              <p style="font-size:.875rem;color:var(--ink-3)">Tahap discovery bisa diambil terpisah. Hasilnya berupa dokumen
                kebutuhan dan estimasi anggaran, dan dokumen itu boleh Anda bawa ke vendor mana pun.</p></div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="ps-lg-4">
          <div class="step rv"><span class="num">1</span><h3>Analisis Kebutuhan</h3>
            <p>Kami mempelajari proses kerja, kebutuhan pengguna, dan tujuan sistem bersama tim terkait sebagai dasar pengembangan</p>
            <span class="out"><i class="bi bi-file-earmark-text"></i> Dokumen kebutuhan &amp; ruang lingkup</span></div>
          <div class="step rv"><span class="num">2</span><h3>Mockup &amp; Prototipe</h3>
            <p>Kebutuhan yang telah disepakati diterjemahkan menjadi rancangan sistem, struktur data, dan prototipe sebagai gambaran sebelum masuk ke tahap pengembangan</p>
            <span class="out"><i class="bi bi-diagram-2"></i> Arsitektur sistem disetujui</span></div>
          <div class="step rv"><span class="num">3</span><h3>Pengembangan</h3>
            <p>Sistem dikembangkan secara bertahap berdasarkan prioritas yang telah disepakati. Perkembangan proyek disampaikan melalui demo dan evaluasi secara berkala</p>
            <span class="out"><i class="bi bi-boxes"></i> Rilis modul tiap sprint</span></div>
          <div class="step rv"><span class="num">4</span><h3>UAT &amp; Go-Live</h3>
            <p>Sistem diuji bersama pengguna akhir, data lama dimigrasikan, dan tim dilatih sampai siap memakainya sendiri.</p>
            <span class="out"><i class="bi bi-rocket-takeoff"></i> Pengujian, migrasi, pelatihan</span></div>
          <div class="step rv"><span class="num">5</span><h3>Support &amp; Optimasi</h3>
            <p>Garansi perbaikan bug, dukungan teknis, dan pengembangan lanjutan sesuai prioritas bisnis Anda.</p>
            <span class="out"><i class="bi bi-life-preserver"></i> Dukungan teknis berkelanjutan</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
