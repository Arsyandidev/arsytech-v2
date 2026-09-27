@extends('layouts.app')

@section('title', 'Syarat & Ketentuan | Arsytech')
@section('description', 'Syarat dan ketentuan penggunaan situs Arsytech: penggunaan yang diizinkan, hak kekayaan intelektual, kepemilikan hasil proyek, penafian, dan batas tanggung jawab.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Syarat &amp; Ketentuan',
    'subtitle' => 'Aturan penggunaan situs arsytech.id, hak kekayaan intelektual, sifat informasi yang kami tampilkan, dan batas tanggung jawab kami.',
    'breadcrumbs' => [
        'Syarat &amp; Ketentuan' => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="legal-meta mb-5 rv">
      <span><i class="bi bi-calendar-check"></i>Terakhir diperbarui: <strong>25 September 2026</strong></span>
      <span><i class="bi bi-hourglass-split"></i>Berlaku sejak: <strong>25 September 2026</strong></span>
      <span><i class="bi bi-translate"></i>Versi bahasa Indonesia adalah versi yang mengikat</span>
    </div>

    <div class="row g-5">
      <div class="col-lg-4 order-lg-2">
        <nav class="toc rv" aria-label="Daftar isi halaman">
          <div class="card-x flat">
            <h3 style="font-size:.75rem;font-weight:800;letter-spacing:.11em;text-transform:uppercase;color:var(--muted);margin-bottom:.85rem">Daftar isi</h3>
            <ol>
          <li><a href="#penerimaan">Penerimaan syarat</a></li>
          <li><a href="#definisi">Definisi</a></li>
          <li><a href="#sifat">Sifat informasi di situs</a></li>
          <li><a href="#penggunaan">Penggunaan yang diizinkan</a></li>
          <li><a href="#larangan">Penggunaan yang dilarang</a></li>
          <li><a href="#ki">Hak kekayaan intelektual atas situs</a></li>
          <li><a href="#kepemilikan-proyek">Kepemilikan hasil proyek</a></li>
          <li><a href="#pengiriman">Materi yang Anda kirim</a></li>
          <li><a href="#penawaran">Estimasi, konsultasi, dan penawaran</a></li>
          <li><a href="#tautan">Tautan ke situs pihak ketiga</a></li>
          <li><a href="#penafian">Penafian jaminan</a></li>
          <li><a href="#tanggungjawab">Batas tanggung jawab</a></li>
          <li><a href="#kerahasiaan">Kerahasiaan</a></li>
          <li><a href="#perjanjian">Hubungan dengan Perjanjian Proyek</a></li>
          <li><a href="#perubahan">Perubahan syarat</a></li>
          <li><a href="#hukum">Hukum yang berlaku dan sengketa</a></li>
          <li><a href="#keterpisahan">Keterpisahan ketentuan</a></li>
          <li><a href="#kontak">Kontak</a></li>
            </ol>
            <hr class="soft my-3">
            <a href="{{ route('kebijakan-privasi') }}" class="btn btn-outline-ink w-100" style="font-size:.8125rem">Baca Kebijakan Privasi <i class="bi bi-arrow-right ms-1"></i></a>
          </div>
        </nav>
      </div>

      <div class="col-lg-8 order-lg-1">
        <div class="legal rv">
        <section id="penerimaan">
          <h2>Penerimaan syarat</h2>

          <p class="lead-in">Dengan mengakses dan menggunakan situs <strong>arsytech.id</strong>, Anda dianggap
          telah membaca, memahami, dan menyetujui syarat dan ketentuan di halaman ini. Jika Anda tidak
          menyetujui sebagian atau seluruhnya, mohon berhenti menggunakan situs ini.</p>
          <p>Syarat ini mengatur penggunaan situs dan informasi yang ada di dalamnya. Syarat ini
          <strong>bukan</strong> perjanjian pengadaan jasa. Pekerjaan, harga, jadwal, dan tanggung jawab
          para pihak diatur dalam perjanjian proyek tersendiri yang ditandatangani bersama.</p>
        </section>
        <section id="definisi">
          <h2>Definisi</h2>

          <ul>
            <li><strong>“Kami”, “Arsytech”</strong>: <span class="todo">[nama badan hukum lengkap]</span>,
                yang menjalankan usaha dengan nama dagang Arsytech dan merupakan bagian dari Clarsyara Group.</li>
            <li><strong>“Situs”</strong>: halaman web pada domain arsytech.id beserta semua subdomainnya.</li>
            <li><strong>“Anda”, “Pengguna”</strong>: setiap orang atau badan yang mengakses Situs.</li>
            <li><strong>“Konten”</strong>: semua teks, gambar, ilustrasi, tata letak, kode, dan materi lain
                yang ditampilkan di Situs.</li>
            <li><strong>“Perjanjian Proyek”</strong>: kontrak tertulis antara Arsytech dan klien tentang
                pengadaan jasa pengembangan sistem.</li>
          </ul>
        </section>
        <section id="sifat">
          <h2>Sifat informasi di situs</h2>

          <p>Informasi di Situs disajikan sebagai informasi umum dan pengenalan layanan. Kami berusaha menjaga
          ketepatannya, dengan catatan berikut:</p>
          <ul>
            <li>Angka, rentang waktu, dan hasil yang disebut pada halaman solusi, industri, dan studi kasus
                adalah <strong>gambaran dari proyek sebelumnya</strong>. Angka tersebut tidak menjamin hasil
                yang sama, karena hasil sangat bergantung pada kondisi awal, kualitas data, dan kesiapan tim Anda.</li>
            <li>Nama klien pada studi kasus sengaja disamarkan karena terikat perjanjian kerahasiaan.</li>
            <li>Daftar modul dan fitur bersifat indikatif dan dapat berubah sesuai hasil analisis kebutuhan.</li>
          </ul>
          <div class="callout">
            <p><strong>Tidak mengikat sebagai penawaran.</strong> Tidak ada bagian Situs ini yang merupakan
            penawaran harga yang mengikat secara hukum. Penawaran resmi hanya sah jika dibuat tertulis,
            bernomor, ditandatangani pihak yang berwenang, dan mencantumkan masa berlaku.</p>
          </div>
        </section>
        <section id="penggunaan">
          <h2>Penggunaan yang diizinkan</h2>

          <p>Anda boleh:</p>
          <ul>
            <li>Membaca, menelusuri, dan mencetak halaman Situs untuk keperluan internal dan evaluasi vendor;</li>
            <li>Membagikan tautan ke halaman Situs;</li>
            <li>Mengutip sebagian isi Situs untuk kajian, pemberitaan, atau perbandingan vendor, selama sumbernya
                dicantumkan dan maknanya tidak diubah;</li>
            <li>Menghubungi kami melalui formulir, email, atau WhatsApp yang tercantum.</li>
          </ul>
        </section>
        <section id="larangan">
          <h2>Penggunaan yang dilarang</h2>

          <p>Anda tidak boleh:</p>
          <ul>
            <li>Menyalin, menggandakan, atau menerbitkan ulang sebagian besar Konten untuk kepentingan komersial
                tanpa izin tertulis dari kami;</li>
            <li>Memakai nama, logo, atau identitas visual Arsytech dengan cara yang memberi kesan seolah ada
                afiliasi, kemitraan, atau dukungan dari kami padahal tidak ada;</li>
            <li>Mengambil data secara otomatis (<em>scraping</em>, <em>crawling</em>) dalam jumlah yang
                mengganggu kinerja layanan;</li>
            <li>Mencoba mendapatkan akses tanpa hak, menguji celah keamanan tanpa izin tertulis, atau menyebarkan
                perangkat lunak berbahaya melalui Situs;</li>
            <li>Mengirim materi yang melanggar hukum, bersifat fitnah, mengandung kebencian, atau melanggar hak
                pihak lain melalui formulir atau kanal komunikasi kami;</li>
            <li>Memakai formulir kontak untuk mengirim promosi massal yang tidak diminta.</li>
          </ul>
          <p>Kami berhak membatasi atau memblokir akses yang melanggar ketentuan ini, dan tetap berhak menempuh
          langkah hukum.</p>
        </section>
        <section id="ki">
          <h2>Hak kekayaan intelektual atas situs</h2>

          <p>Semua Konten di Situs, termasuk teks, susunan, ilustrasi antarmuka, logo, dan kode yang
          menjalankannya, adalah milik Arsytech atau pemberi lisensinya dan dilindungi peraturan
          perundang-undangan di bidang hak cipta dan merek.</p>
          <p>Mengakses Situs tidak memberi Anda lisensi atau hak apa pun atas Konten, selain hak penggunaan
          terbatas yang dijelaskan pada bagian <a href="#penggunaan">Penggunaan yang diizinkan</a>.</p>
          <p>Merek dan nama produk pihak ketiga yang disebut di Situs, misalnya nama teknologi yang kami pakai,
          adalah milik pemegang haknya masing-masing dan disebut hanya sebagai keterangan teknis.</p>
        </section>
        <section id="kepemilikan-proyek">
          <h2>Kepemilikan hasil proyek</h2>

          <div class="callout">
            <p><strong>Catatan.</strong> Ketentuan hak kekayaan intelektual pada bagian sebelumnya hanya berlaku
            untuk <em>Situs ini</em>. Ketentuan itu tidak berlaku untuk sistem yang kami bangun bagi klien.</p>
          </div>
          <p>Untuk pekerjaan proyek, kami berkomitmen menyerahkan <strong>kepemilikan penuh</strong> atas
          <em>source code</em>, skema basis data, dan dokumentasi teknis kepada klien setelah proyek selesai dan
          semua kewajiban pembayaran dilunasi.</p>
          <p>Ada pengecualian yang umum berlaku, dan akan disebutkan secara tegas dalam Perjanjian Proyek:</p>
          <ul>
            <li>Komponen atau pustaka <em>open source</em> pihak ketiga tetap tunduk pada lisensi aslinya;</li>
            <li>Komponen internal Arsytech yang bersifat umum dan dipakai di banyak proyek diserahkan dalam bentuk
                lisensi penggunaan yang bersifat tetap, non-eksklusif, dan bebas royalti.</li>
          </ul>
          <p>Rincian lingkup penyerahan, tata cara serah terima, dan masa garansi diatur dalam Perjanjian Proyek.</p>
        </section>
        <section id="pengiriman">
          <h2>Materi yang Anda kirim</h2>

          <p>Dengan mengirim pesan melalui formulir, email, atau WhatsApp, Anda menyatakan bahwa Anda berwenang
          mengirim materi tersebut dan materi itu tidak melanggar hak pihak lain.</p>
          <p>Keterangan kebutuhan yang Anda sampaikan kami perlakukan sebagai informasi kerja yang tidak untuk
          dipublikasikan, dan hanya kami pakai untuk menindaklanjuti permintaan Anda. Penanganan datanya dijelaskan
          dalam <a href="{{ route('kebijakan-privasi') }}">Kebijakan Privasi</a>.</p>
          <div class="callout">
            <p><strong>Saran.</strong> Mohon jangan mengirim dokumen rahasia, data pribadi karyawan atau
            pelanggan, ataupun rahasia dagang melalui formulir publik. Kami bersedia menandatangani perjanjian
            kerahasiaan lebih dulu. Cukup sampaikan permintaan itu di pesan pertama Anda.</p>
          </div>
          <p>Jika Anda memberikan saran atau masukan tanpa kesepakatan kerahasiaan, kami boleh memakainya untuk
          memperbaiki layanan tanpa kewajiban memberi imbalan, kecuali disepakati lain secara tertulis.</p>
        </section>
        <section id="penawaran">
          <h2>Estimasi, konsultasi, dan penawaran</h2>

          <p>Konsultasi awal dan analisis kebutuhan tahap pertama kami berikan tanpa biaya, dan Anda tidak
          wajib melanjutkan setelahnya.</p>
          <p>Ketentuan yang berlaku:</p>
          <ul>
            <li>Estimasi yang kami berikan sebelum tahap <em>discovery</em> adalah perkiraan awal dan dapat
                berubah setelah kebutuhan dipetakan secara rinci;</li>
            <li>Dokumen kebutuhan hasil tahap <em>discovery</em> berbayar menjadi milik Anda dan boleh Anda
                bawa ke penyedia jasa lain;</li>
            <li>Penawaran resmi berlaku selama masa yang tercantum di dalamnya dan perlu ditinjau ulang setelah itu;</li>
            <li>Kesepakatan baru mengikat setelah Perjanjian Proyek ditandatangani kedua belah pihak.</li>
          </ul>
        </section>
        <section id="tautan">
          <h2>Tautan ke situs pihak ketiga</h2>

          <p>Situs dapat memuat tautan ke halaman pihak ketiga, misalnya akun media sosial atau dokumentasi
          teknologi. Tautan tersebut disediakan untuk memudahkan Anda.</p>
          <p>Kami tidak mengendalikan dan tidak bertanggung jawab atas isi, kebijakan privasi, ataupun praktik
          halaman pihak ketiga. Penggunaan halaman tersebut tunduk pada syarat dan ketentuan pengelolanya
          masing-masing.</p>
        </section>
        <section id="penafian">
          <h2>Penafian jaminan</h2>

          <p>Situs dan isinya disediakan “sebagaimana adanya”. Sejauh diizinkan peraturan perundang-undangan,
          kami tidak menjamin bahwa:</p>
          <ul>
            <li>Situs akan selalu tersedia tanpa gangguan, kesalahan, atau jeda pemeliharaan;</li>
            <li>Semua informasi selalu terbaru dan bebas dari salah tulis;</li>
            <li>Hasil yang disebut pada studi kasus akan terulang di perusahaan Anda.</li>
          </ul>
          <p>Penafian ini berlaku untuk penggunaan <em>Situs</em>. Jaminan atas pekerjaan proyek, termasuk masa
          garansi perbaikan cacat dan tingkat layanan dukungan, diatur tersendiri dalam Perjanjian Proyek dan
          tidak dikurangi oleh bagian ini.</p>
        </section>
        <section id="tanggungjawab">
          <h2>Batas tanggung jawab</h2>

          <p>Sejauh diizinkan peraturan perundang-undangan, Arsytech tidak bertanggung jawab atas kerugian
          tidak langsung, kehilangan keuntungan, kehilangan data, atau kerugian akibat keputusan bisnis yang
          Anda ambil semata-mata berdasarkan informasi di Situs.</p>
          <p>Batasan dalam bagian ini tidak berlaku untuk kerugian yang timbul dari kesengajaan atau kelalaian
          berat kami, dan tidak berlaku untuk tanggung jawab yang menurut peraturan perundang-undangan tidak
          dapat dibatasi atau dikesampingkan.</p>
          <p>Batas tanggung jawab terkait pelaksanaan pekerjaan proyek diatur dalam Perjanjian Proyek, tidak
          di halaman ini.</p>
        </section>
        <section id="kerahasiaan">
          <h2>Kerahasiaan</h2>

          <p>Kami bersedia menandatangani perjanjian kerahasiaan (NDA) sebelum pembicaraan yang menyangkut informasi
          sensitif dimulai. Anda dapat meminta NDA sejak kontak pertama, tanpa biaya.</p>
          <p>Ada atau tidak ada NDA, kami tidak akan mengungkapkan identitas Anda sebagai pihak yang sedang
          menjajaki kerja sama dengan kami, kecuali dengan persetujuan tertulis Anda atau jika diwajibkan
          peraturan perundang-undangan.</p>
        </section>
        <section id="perjanjian">
          <h2>Hubungan dengan Perjanjian Proyek</h2>

          <p>Jika ada pertentangan antara halaman ini dan Perjanjian Proyek yang sudah ditandatangani,
          <strong>Perjanjian Proyek yang berlaku</strong> untuk hal-hal yang diaturnya.</p>
          <p>Halaman ini hanya berlaku sebagai pelengkap untuk hal-hal yang tidak diatur dalam Perjanjian Proyek,
          terutama yang berkaitan dengan penggunaan Situs.</p>
        </section>
        <section id="perubahan">
          <h2>Perubahan syarat</h2>

          <p>Kami dapat mengubah syarat dan ketentuan ini sewaktu-waktu. Versi yang berlaku adalah versi yang
          dimuat di Situs, dengan tanggal pembaruan terakhir di bagian atas halaman.</p>
          <p>Perubahan berlaku sejak dimuat di Situs. Jika Anda tetap menggunakan Situs setelah itu, Anda dianggap
          menyetujui versi terbaru. Perubahan ini tidak memengaruhi Perjanjian Proyek yang sedang berjalan.</p>
        </section>
        <section id="hukum">
          <h2>Hukum yang berlaku dan sengketa</h2>

          <p>Syarat dan ketentuan ini tunduk pada dan ditafsirkan menurut hukum <strong>Republik Indonesia</strong>.</p>
          <p>Setiap perselisihan akan diselesaikan lebih dulu secara musyawarah dalam waktu
          <strong>30 hari kalender</strong> sejak salah satu pihak menyampaikan pemberitahuan tertulis.</p>
          <p>Jika musyawarah tidak menghasilkan kesepakatan, para pihak sepakat menyelesaikannya melalui
          <span class="todo">[pilih salah satu: Pengadilan Negeri yang berwenang sesuai domisili perusahaan,
          atau arbitrase BANI]</span>.</p>
          <div class="callout">
            <p><span class="todo">[Tentukan forum penyelesaian sengketa bersama penasihat hukum. Pilihan pengadilan
            harus sesuai dengan domisili badan hukum yang terdaftar, dan biasanya diselaraskan dengan klausul serupa
            di dalam Perjanjian Proyek.]</span></p>
          </div>
        </section>
        <section id="keterpisahan">
          <h2>Keterpisahan ketentuan</h2>

          <p>Jika satu atau beberapa ketentuan di halaman ini dinyatakan tidak sah atau tidak dapat
          dilaksanakan oleh lembaga yang berwenang, ketentuan lainnya tetap berlaku dan mengikat sepenuhnya.</p>
          <p>Ketentuan yang tidak berlaku itu akan diganti dengan ketentuan sah yang maknanya paling dekat
          dengan maksud semula.</p>
        </section>
        <section id="kontak">
          <h2>Kontak</h2>

          <p>Pertanyaan tentang syarat dan ketentuan ini dapat disampaikan melalui:</p>
          <ul>
            <li>Email: <a href="mailto:{{ config('arsytech.contact.email') }}">{{ config('arsytech.contact.email') }}</a></li>
            <li>WhatsApp: <a href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener">{{ config('arsytech.contact.phone') }}</a></li>
            <li>Formulir: <a href="{{ route('kontak') }}">halaman Kontak</a></li>
            <li>Surat: <span class="todo">[Isi alamat lengkap kantor]</span>, Bogor, Jawa Barat, Indonesia</li>
          </ul>
          <p>Baca juga <a href="{{ route('kebijakan-privasi') }}">Kebijakan Privasi</a> untuk penjelasan tentang
          cara kami menangani data pribadi Anda.</p>
        </section>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-tight section-soft section-line">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-8 rv">
        <h2 class="h3" style="font-size:clamp(1.2rem,1.1rem + .5vw,1.5rem)">Ada pertanyaan tentang halaman ini?</h2>
        <p class="lead-sm mt-2 measure">Kirim pertanyaan Anda ke <a href="mailto:{{ config('arsytech.contact.email') }}">{{ config('arsytech.contact.email') }}</a>
          dengan subjek yang jelas. Kami membalas dalam 1&times;24 jam kerja.</p>
      </div>
      <div class="col-lg-4 text-lg-end rv">
        <a href="{{ route('kontak') }}" class="btn btn-brand">Halaman Kontak <i class="bi bi-arrow-right ms-1"></i></a>
      </div>
    </div>
  </div>
</section>
@endsection
