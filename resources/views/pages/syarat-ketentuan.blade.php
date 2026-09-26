@extends('layouts.app')

@section('title', 'Syarat & Ketentuan | Arsytech')
@section('description', 'Syarat dan ketentuan penggunaan situs Arsytech: penggunaan yang diperbolehkan, hak kekayaan intelektual, kepemilikan hasil proyek, penafian, dan batasan tanggung jawab.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Syarat &amp; Ketentuan',
    'subtitle' => 'Ketentuan penggunaan situs arsytech.id, hak kekayaan intelektual, sifat informasi yang kami sajikan, serta batasan tanggung jawab yang berlaku.',
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
          <li><a href="#sifat">Sifat informasi di situs ini</a></li>
          <li><a href="#penggunaan">Penggunaan yang diperbolehkan</a></li>
          <li><a href="#larangan">Penggunaan yang dilarang</a></li>
          <li><a href="#ki">Hak kekayaan intelektual atas situs</a></li>
          <li><a href="#kepemilikan-proyek">Kepemilikan hasil pekerjaan proyek</a></li>
          <li><a href="#pengiriman">Materi yang Anda kirim ke kami</a></li>
          <li><a href="#penawaran">Estimasi, konsultasi, dan penawaran</a></li>
          <li><a href="#tautan">Tautan ke situs pihak ketiga</a></li>
          <li><a href="#penafian">Penafian jaminan</a></li>
          <li><a href="#tanggungjawab">Batasan tanggung jawab</a></li>
          <li><a href="#kerahasiaan">Kerahasiaan</a></li>
          <li><a href="#perjanjian">Hubungan dengan Perjanjian Proyek</a></li>
          <li><a href="#perubahan">Perubahan syarat</a></li>
          <li><a href="#hukum">Hukum yang berlaku dan penyelesaian sengketa</a></li>
          <li><a href="#keterpisahan">Keterpisahan ketentuan</a></li>
          <li><a href="#kontak">Menghubungi kami</a></li>
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
          telah membaca, memahami, dan menyetujui syarat dan ketentuan di halaman ini. Apabila Anda tidak
          menyetujui sebagian atau seluruhnya, mohon hentikan penggunaan situs ini.</p>
          <p>Syarat ini mengatur penggunaan situs beserta informasi yang tersaji di dalamnya. Syarat ini
          <strong>bukan</strong> perjanjian pengadaan jasa. Ketentuan mengenai pekerjaan, harga, jadwal,
          dan tanggung jawab para pihak diatur dalam perjanjian proyek terpisah yang ditandatangani bersama.</p>
        </section>
        <section id="definisi">
          <h2>Definisi</h2>

          <ul>
            <li><strong>“Kami”, “Arsytech”</strong> — <span class="todo">[nama badan hukum lengkap]</span>,
                yang menjalankan usaha dengan nama dagang Arsytech, bagian dari Clarsyara Group.</li>
            <li><strong>“Situs”</strong> — laman web pada domain arsytech.id beserta seluruh subdomainnya.</li>
            <li><strong>“Anda”, “Pengguna”</strong> — setiap orang atau badan yang mengakses Situs.</li>
            <li><strong>“Konten”</strong> — seluruh teks, gambar, ilustrasi, tata letak, kode, dan materi lain
                yang ditampilkan pada Situs.</li>
            <li><strong>“Perjanjian Proyek”</strong> — kontrak tertulis antara Arsytech dan klien mengenai
                pengadaan jasa pengembangan sistem.</li>
          </ul>
        </section>
        <section id="sifat">
          <h2>Sifat informasi di situs ini</h2>

          <p>Informasi pada Situs disajikan untuk keperluan umum dan perkenalan layanan. Kami berusaha menjaga
          ketepatannya, namun:</p>
          <ul>
            <li>Angka, rentang waktu, dan hasil yang disebutkan pada halaman solusi, industri, maupun studi kasus
                merupakan <strong>gambaran dari proyek terdahulu</strong>. Angka itu bukan jaminan hasil, karena
                sangat bergantung pada kondisi awal, kualitas data, dan kesiapan tim Anda.</li>
            <li>Nama klien pada studi kasus sengaja disamarkan karena terikat perjanjian kerahasiaan.</li>
            <li>Daftar modul dan fitur bersifat indikatif dan dapat berubah sesuai hasil analisis kebutuhan.</li>
          </ul>
          <div class="callout">
            <p><strong>Bukan penawaran yang mengikat.</strong> Tidak ada bagian dari Situs ini yang merupakan
            penawaran harga yang mengikat secara hukum. Penawaran resmi hanya sah bila diterbitkan tertulis,
            bernomor, ditandatangani pihak yang berwenang, dan memuat masa berlaku.</p>
          </div>
        </section>
        <section id="penggunaan">
          <h2>Penggunaan yang diperbolehkan</h2>

          <p>Anda dipersilakan untuk:</p>
          <ul>
            <li>Membaca, menelusuri, dan mencetak halaman Situs untuk keperluan internal dan evaluasi vendor;</li>
            <li>Membagikan tautan ke halaman Situs;</li>
            <li>Mengutip sebagian isi Situs untuk keperluan kajian, pemberitaan, atau perbandingan vendor,
                sepanjang mencantumkan sumber dan tidak mengubah maknanya;</li>
            <li>Menghubungi kami melalui formulir, email, atau WhatsApp yang tercantum.</li>
          </ul>
        </section>
        <section id="larangan">
          <h2>Penggunaan yang dilarang</h2>

          <p>Anda dilarang:</p>
          <ul>
            <li>Menyalin, menggandakan, atau menerbitkan ulang sebagian besar Konten untuk kepentingan komersial
                tanpa izin tertulis dari kami;</li>
            <li>Memakai nama, logo, atau identitas visual Arsytech dengan cara yang dapat menimbulkan kesan
                adanya afiliasi, kemitraan, atau dukungan yang sebenarnya tidak ada;</li>
            <li>Melakukan pengambilan data otomatis (<em>scraping</em>, <em>crawling</em>) dalam volume yang
                mengganggu kinerja layanan;</li>
            <li>Mencoba memperoleh akses tidak sah, menguji celah keamanan tanpa izin tertulis, atau menyebarkan
                perangkat lunak berbahaya melalui Situs;</li>
            <li>Mengirimkan materi yang melanggar hukum, memfitnah, mengandung kebencian, atau melanggar hak
                pihak lain melalui formulir maupun kanal komunikasi kami;</li>
            <li>Memakai formulir kontak untuk mengirim promosi massal yang tidak diminta.</li>
          </ul>
          <p>Kami berhak membatasi atau memblokir akses yang melanggar ketentuan ini, tanpa mengurangi hak kami
          menempuh langkah hukum.</p>
        </section>
        <section id="ki">
          <h2>Hak kekayaan intelektual atas situs</h2>

          <p>Seluruh Konten pada Situs — termasuk teks, susunan, ilustrasi antarmuka, logo, dan kode yang
          menjalankannya — merupakan milik Arsytech atau pemberi lisensinya, dan dilindungi oleh peraturan
          perundang-undangan di bidang hak cipta dan merek.</p>
          <p>Mengakses Situs tidak memberi Anda lisensi atau hak apa pun atas Konten, selain hak penggunaan
          terbatas sebagaimana diuraikan pada bagian <a href="#penggunaan">Penggunaan yang diperbolehkan</a>.</p>
          <p>Merek dan nama produk pihak ketiga yang disebut pada Situs — misalnya nama teknologi yang kami pakai —
          adalah milik pemegang haknya masing-masing, dan disebut semata-mata sebagai keterangan teknis.</p>
        </section>
        <section id="kepemilikan-proyek">
          <h2>Kepemilikan hasil pekerjaan proyek</h2>

          <div class="callout">
            <p><strong>Perlu dibedakan.</strong> Ketentuan hak kekayaan intelektual pada bagian sebelumnya berlaku
            untuk <em>Situs ini</em>, bukan untuk sistem yang kami bangun untuk klien.</p>
          </div>
          <p>Untuk pekerjaan proyek, komitmen kami adalah menyerahkan <strong>kepemilikan penuh</strong> atas
          <em>source code</em>, skema basis data, dan dokumentasi teknis kepada klien setelah proyek selesai dan
          seluruh kewajiban pembayaran dipenuhi.</p>
          <p>Pengecualian yang lazim berlaku dan akan dinyatakan tegas dalam Perjanjian Proyek:</p>
          <ul>
            <li>Komponen atau pustaka <em>open source</em> pihak ketiga tetap tunduk pada lisensi aslinya;</li>
            <li>Komponen internal Arsytech yang bersifat umum dan dipakai lintas proyek diserahkan dalam bentuk
                lisensi penggunaan yang bersifat tetap, non-eksklusif, dan bebas royalti.</li>
          </ul>
          <p>Rincian lingkup penyerahan, tata cara serah terima, dan masa garansi diatur dalam Perjanjian Proyek.</p>
        </section>
        <section id="pengiriman">
          <h2>Materi yang Anda kirim ke kami</h2>

          <p>Saat mengirim pesan melalui formulir, email, atau WhatsApp, Anda menyatakan bahwa Anda berwenang
          mengirimkan materi tersebut dan bahwa materi itu tidak melanggar hak pihak lain.</p>
          <p>Kami memperlakukan keterangan kebutuhan yang Anda sampaikan sebagai informasi kerja, bukan informasi
          publik, dan memakainya semata-mata untuk menindaklanjuti permintaan Anda. Penanganan datanya dijelaskan
          dalam <a href="{{ route('kebijakan-privasi') }}">Kebijakan Privasi</a>.</p>
          <div class="callout">
            <p><strong>Saran praktis.</strong> Mohon jangan mengirimkan dokumen rahasia, data pribadi karyawan atau
            pelanggan, maupun rahasia dagang melalui formulir publik. Kami siap menandatangani perjanjian
            kerahasiaan lebih dahulu — cukup sampaikan permintaannya di pesan pertama Anda.</p>
          </div>
          <p>Apabila Anda menyampaikan saran atau masukan tanpa disertai kesepakatan kerahasiaan, kami dapat
          memakainya untuk memperbaiki layanan tanpa menimbulkan kewajiban imbalan, kecuali disepakati lain
          secara tertulis.</p>
        </section>
        <section id="penawaran">
          <h2>Estimasi, konsultasi, dan penawaran</h2>

          <p>Sesi konsultasi awal dan analisis kebutuhan tingkat pertama kami sediakan tanpa biaya dan tanpa
          kewajiban bagi Anda untuk melanjutkan.</p>
          <p>Ketentuan yang berlaku:</p>
          <ul>
            <li>Estimasi yang kami sampaikan sebelum tahap <em>discovery</em> bersifat perkiraan awal dan dapat
                berubah setelah kebutuhan dipetakan secara rinci;</li>
            <li>Dokumen kebutuhan yang dihasilkan dari tahap <em>discovery</em> berbayar menjadi milik Anda dan
                bebas Anda bawa ke penyedia jasa lain;</li>
            <li>Penawaran resmi berlaku selama masa yang tercantum di dalamnya, dan setelahnya perlu ditinjau ulang;</li>
            <li>Kesepakatan baru mengikat setelah Perjanjian Proyek ditandatangani kedua belah pihak.</li>
          </ul>
        </section>
        <section id="tautan">
          <h2>Tautan ke situs pihak ketiga</h2>

          <p>Situs dapat memuat tautan ke laman pihak ketiga, misalnya kanal media sosial atau dokumentasi
          teknologi. Tautan tersebut disediakan untuk kemudahan Anda.</p>
          <p>Kami tidak mengendalikan dan tidak bertanggung jawab atas isi, kebijakan privasi, maupun praktik
          laman pihak ketiga. Penggunaan laman tersebut tunduk pada syarat dan ketentuan masing-masing
          penyelenggaranya.</p>
        </section>
        <section id="penafian">
          <h2>Penafian jaminan</h2>

          <p>Situs beserta isinya disediakan “sebagaimana adanya”. Sepanjang diizinkan peraturan perundang-undangan,
          kami tidak memberikan jaminan bahwa:</p>
          <ul>
            <li>Situs akan selalu tersedia tanpa gangguan, kesalahan, atau jeda pemeliharaan;</li>
            <li>Seluruh informasi selalu mutakhir dan bebas dari kekeliruan penulisan;</li>
            <li>Hasil yang disebutkan pada studi kasus akan terulang pada kondisi perusahaan Anda.</li>
          </ul>
          <p>Penafian ini berlaku untuk penggunaan <em>Situs</em>. Jaminan atas pekerjaan proyek — termasuk masa
          garansi perbaikan cacat dan tingkat layanan dukungan — diatur tersendiri dalam Perjanjian Proyek dan
          tidak dikurangi oleh bagian ini.</p>
        </section>
        <section id="tanggungjawab">
          <h2>Batasan tanggung jawab</h2>

          <p>Sepanjang diizinkan peraturan perundang-undangan, Arsytech tidak bertanggung jawab atas kerugian
          tidak langsung, kehilangan keuntungan, kehilangan data, atau kerugian yang timbul dari keputusan bisnis
          yang Anda ambil semata-mata berdasarkan informasi pada Situs.</p>
          <p>Pembatasan pada bagian ini tidak berlaku terhadap kerugian yang timbul dari kesengajaan atau kelalaian
          berat kami, maupun terhadap tanggung jawab yang menurut peraturan perundang-undangan tidak dapat
          dibatasi atau dikesampingkan.</p>
          <p>Batas tanggung jawab yang berkaitan dengan pelaksanaan pekerjaan proyek diatur dalam Perjanjian
          Proyek, bukan dalam halaman ini.</p>
        </section>
        <section id="kerahasiaan">
          <h2>Kerahasiaan</h2>

          <p>Kami siap menandatangani perjanjian kerahasiaan (NDA) sebelum pembahasan yang menyentuh informasi
          sensitif dimulai. Permintaan NDA dapat Anda sampaikan pada kontak pertama, tanpa biaya.</p>
          <p>Terlepas dari ada tidaknya NDA, kami tidak akan mengungkapkan identitas Anda sebagai pihak yang sedang
          menjajaki kerja sama, kecuali dengan persetujuan tertulis Anda atau apabila diwajibkan oleh
          peraturan perundang-undangan.</p>
        </section>
        <section id="perjanjian">
          <h2>Hubungan dengan Perjanjian Proyek</h2>

          <p>Apabila terdapat pertentangan antara halaman ini dan Perjanjian Proyek yang sudah ditandatangani,
          maka <strong>Perjanjian Proyek yang berlaku</strong> sepanjang menyangkut pokok yang diaturnya.</p>
          <p>Halaman ini hanya berlaku sebagai pelengkap untuk hal-hal yang tidak diatur dalam Perjanjian Proyek,
          khususnya yang berkaitan dengan penggunaan Situs.</p>
        </section>
        <section id="perubahan">
          <h2>Perubahan syarat</h2>

          <p>Kami dapat mengubah syarat dan ketentuan ini sewaktu-waktu. Versi yang berlaku adalah versi yang
          tercantum pada Situs, dengan tanggal pembaruan terakhir tertera di bagian atas halaman.</p>
          <p>Perubahan berlaku sejak dimuat pada Situs. Penggunaan Situs setelah perubahan dimuat dianggap sebagai
          persetujuan Anda atas versi terbaru. Perubahan ini tidak memengaruhi Perjanjian Proyek yang sudah
          berjalan.</p>
        </section>
        <section id="hukum">
          <h2>Hukum yang berlaku dan penyelesaian sengketa</h2>

          <p>Syarat dan ketentuan ini tunduk pada dan ditafsirkan menurut hukum <strong>Republik Indonesia</strong>.</p>
          <p>Setiap perselisihan yang timbul akan diselesaikan terlebih dahulu secara musyawarah dalam jangka waktu
          <strong>30 hari kalender</strong> sejak pemberitahuan tertulis disampaikan salah satu pihak.</p>
          <p>Apabila musyawarah tidak mencapai kesepakatan, para pihak sepakat menyelesaikannya melalui
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

          <p>Apabila satu atau beberapa ketentuan dalam halaman ini dinyatakan tidak sah atau tidak dapat
          dilaksanakan oleh lembaga yang berwenang, ketentuan lainnya tetap berlaku dan mengikat sepenuhnya.</p>
          <p>Ketentuan yang tidak berlaku tersebut akan digantikan oleh ketentuan sah yang maknanya paling
          mendekati maksud semula.</p>
        </section>
        <section id="kontak">
          <h2>Menghubungi kami</h2>

          <p>Pertanyaan mengenai syarat dan ketentuan ini dapat disampaikan melalui:</p>
          <ul>
            <li>Email: <a href="mailto:{{ config('arsytech.contact.email') }}">{{ config('arsytech.contact.email') }}</a></li>
            <li>WhatsApp: <a href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener">{{ config('arsytech.contact.phone') }}</a></li>
            <li>Formulir: <a href="{{ route('kontak') }}">halaman Kontak</a></li>
            <li>Surat: <span class="todo">[Isi alamat lengkap kantor]</span>, Bogor, Jawa Barat, Indonesia</li>
          </ul>
          <p>Lihat juga <a href="{{ route('kebijakan-privasi') }}">Kebijakan Privasi</a> untuk penjelasan mengenai
          penanganan data pribadi Anda.</p>
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
        <h2 class="h3" style="font-size:clamp(1.2rem,1.1rem + .5vw,1.5rem)">Ada yang ingin ditanyakan soal halaman ini?</h2>
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
