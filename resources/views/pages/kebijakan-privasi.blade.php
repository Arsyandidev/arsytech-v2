@extends('layouts.app')

@section('title', 'Kebijakan Privasi | Arsytech')
@section('description', 'Kebijakan privasi Arsytech: data yang dikumpulkan, tujuan pemrosesan, cookie, masa simpan, langkah pengamanan, dan hak Anda berdasarkan UU PDP.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Kebijakan Privasi',
    'subtitle' => 'Bagaimana Arsytech mengumpulkan, memakai, menyimpan, dan melindungi data pribadi Anda — disusun mengacu pada UU No. 27 Tahun 2022 tentang Pelindungan Data Pribadi.',
    'breadcrumbs' => [
        'Kebijakan Privasi' => null,
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
          <li><a href="#ringkasan">Ringkasan singkat</a></li>
          <li><a href="#pengendali">Siapa yang mengelola data Anda</a></li>
          <li><a href="#data">Data pribadi yang kami kumpulkan</a></li>
          <li><a href="#tujuan">Tujuan dan dasar pemrosesan</a></li>
          <li><a href="#cookie">Cookie dan teknologi serupa</a></li>
          <li><a href="#berbagi">Pihak ketiga yang dapat mengakses data</a></li>
          <li><a href="#proyek">Data klien selama proyek berjalan</a></li>
          <li><a href="#retensi">Berapa lama data disimpan</a></li>
          <li><a href="#keamanan">Langkah pengamanan</a></li>
          <li><a href="#hak">Hak Anda atas data pribadi</a></li>
          <li><a href="#insiden">Bila terjadi kegagalan pelindungan data</a></li>
          <li><a href="#transfer">Pemindahan data ke luar wilayah Indonesia</a></li>
          <li><a href="#anak">Data anak</a></li>
          <li><a href="#perubahan">Perubahan atas kebijakan ini</a></li>
          <li><a href="#kontak">Menghubungi kami</a></li>
            </ol>
            <hr class="soft my-3">
            <a href="{{ route('syarat-ketentuan') }}" class="btn btn-outline-ink w-100" style="font-size:.8125rem">Baca Syarat &amp; Ketentuan <i class="bi bi-arrow-right ms-1"></i></a>
          </div>
        </nav>
      </div>

      <div class="col-lg-8 order-lg-1">
        <div class="legal rv">
        <section id="ringkasan">
          <h2>Ringkasan singkat</h2>

          <div class="callout">
            <p><strong>Versi pendeknya:</strong> kami hanya mengumpulkan data yang Anda kirim sendiri lewat
            formulir konsultasi, ditambah data teknis standar yang tercatat otomatis saat Anda membuka situs ini.
            Data itu kami pakai untuk membalas dan menindaklanjuti permintaan Anda — bukan untuk dijual,
            disewakan, atau ditukar dengan pihak mana pun.</p>
          </div>
          <p class="lead-in">Halaman ini menjelaskan data pribadi apa yang Arsytech kumpulkan, untuk apa data itu
          dipakai, siapa saja yang bisa mengaksesnya, berapa lama disimpan, dan hak apa yang Anda miliki atas data
          tersebut. Kebijakan ini disusun mengacu pada Undang-Undang Nomor 27 Tahun 2022 tentang Pelindungan Data
          Pribadi beserta peraturan pelaksanaannya.</p>
          <p>Kebijakan ini berlaku untuk situs <strong>arsytech.id</strong> dan seluruh kanal komunikasi resmi kami
          (email dan WhatsApp bisnis). Kebijakan ini <em>tidak</em> mengatur pemrosesan data di dalam sistem yang
          kami bangun untuk klien — hal itu diatur terpisah dalam perjanjian proyek, dan dijelaskan ringkas pada
          bagian <a href="#proyek">Data klien selama proyek berjalan</a>.</p>
        </section>
        <section id="pengendali">
          <h2>Siapa yang mengelola data Anda</h2>

          <p>Pengendali Data Pribadi untuk situs ini adalah:</p>
          <div class="table-wrap">
          <table class="legal-table">
            <tr><th style="width:34%">Nama badan hukum</th><td><span class="todo">[Isi nama badan hukum lengkap, mis. PT Arsy Teknologi Nusantara]</span></td></tr>
            <tr><th>Nama dagang</th><td>Arsytech — Part of Clarsyara Group</td></tr>
            <tr><th>Alamat</th><td><span class="todo">[Isi alamat lengkap kantor]</span>, Bogor, Jawa Barat, Indonesia</td></tr>
            <tr><th>Email</th><td><a href="mailto:{{ config('arsytech.contact.email') }}">{{ config('arsytech.contact.email') }}</a></td></tr>
            <tr><th>Narahubung pelindungan data</th><td><span class="todo">[Isi nama dan email petugas yang ditunjuk]</span></td></tr>
          </table>
          </div>
          <p>Bila Anda memiliki pertanyaan, keberatan, atau permintaan terkait data pribadi Anda, silakan hubungi
          narahubung di atas. Kami menanggapi setiap permintaan dalam <strong>3&times;24 jam</strong> dan
          menyelesaikannya selambat-lambatnya dalam <strong>14 hari kerja</strong>.</p>
        </section>
        <section id="data">
          <h2>Data pribadi yang kami kumpulkan</h2>

          <h3>a. Data yang Anda berikan sendiri</h3>
          <p>Saat mengisi formulir konsultasi atau menghubungi kami lewat email dan WhatsApp, Anda memberikan:</p>
          <ul>
            <li><strong>Data identitas:</strong> nama lengkap</li>
            <li><strong>Data kontak:</strong> alamat email, nomor telepon atau WhatsApp</li>
            <li><strong>Data perusahaan:</strong> nama perusahaan, industri, perkiraan jumlah pengguna</li>
            <li><strong>Isi pesan:</strong> keterangan kebutuhan sistem yang Anda tuliskan sendiri</li>
          </ul>
          <p>Hanya nama, email, kebutuhan utama, dan isi pesan yang wajib diisi. Kolom lainnya bersifat pilihan —
          Anda tetap bisa berkonsultasi tanpa mengisinya.</p>

          <h3>b. Data yang terkumpul otomatis</h3>
          <p>Seperti situs pada umumnya, server kami mencatat data teknis setiap kali halaman dibuka:</p>
          <ul>
            <li>Alamat IP dan perkiraan lokasi tingkat kota</li>
            <li>Jenis peramban, sistem operasi, dan resolusi layar</li>
            <li>Halaman yang dibuka, waktu kunjungan, dan halaman perujuk</li>
          </ul>
          <p>Data ini dipakai untuk menjaga keamanan server dan memahami halaman mana yang paling berguna bagi
          pengunjung. Kami tidak berusaha mengidentifikasi individu dari data teknis ini.</p>

          <h3>c. Data yang tidak kami kumpulkan</h3>
          <p>Kami <strong>tidak</strong> meminta dan tidak menyimpan data pribadi bersifat spesifik sebagaimana
          dimaksud dalam UU PDP — seperti data kesehatan, biometrik, genetika, catatan kejahatan, pandangan
          politik, atau keyakinan agama — melalui situs ini. Mohon jangan mencantumkan data semacam itu pada
          kolom pesan.</p>
          <p>Kami juga tidak meminta data kartu kredit atau rekening bank melalui situs. Semua urusan pembayaran
          proyek dilakukan lewat kanal resmi yang disepakati dalam kontrak.</p>
        </section>
        <section id="tujuan">
          <h2>Tujuan dan dasar pemrosesan</h2>

          <p>Setiap data yang kami proses memiliki tujuan dan dasar hukum yang jelas:</p>
          <div class="table-wrap">
          <table class="legal-table">
            <thead><tr><th style="width:38%">Tujuan</th><th style="width:28%">Data yang dipakai</th><th>Dasar pemrosesan</th></tr></thead>
            <tbody>
              <tr><td>Membalas dan menindaklanjuti permintaan konsultasi</td><td>Identitas, kontak, data perusahaan, isi pesan</td><td>Persetujuan Anda saat mengirim formulir</td></tr>
              <tr><td>Menyusun estimasi lingkup dan anggaran</td><td>Data perusahaan, isi pesan</td><td>Pemenuhan permintaan Anda sebelum perjanjian dibuat</td></tr>
              <tr><td>Menjalankan perjanjian proyek yang sudah disepakati</td><td>Identitas dan kontak penanggung jawab</td><td>Pelaksanaan perjanjian</td></tr>
              <tr><td>Menjaga keamanan dan ketersediaan situs</td><td>Data teknis dan log server</td><td>Kepentingan sah yang tidak melanggar hak Anda</td></tr>
              <tr><td>Memenuhi kewajiban pembukuan dan perpajakan</td><td>Data identitas dan transaksi klien</td><td>Kewajiban hukum</td></tr>
            </tbody>
          </table>
          </div>
          <div class="callout">
            <p><strong>Yang tidak kami lakukan.</strong> Kami tidak menjual, menyewakan, atau menukarkan data Anda
            kepada pihak mana pun. Kami juga tidak memakai data Anda untuk pengambilan keputusan otomatis atau
            penyusunan profil yang menimbulkan akibat hukum bagi Anda.</p>
          </div>
          <p>Bila suatu saat kami perlu memakai data Anda untuk tujuan di luar daftar di atas, kami akan
          memberitahukannya lebih dulu dan meminta persetujuan baru.</p>
        </section>
        <section id="cookie">
          <h2>Cookie dan teknologi serupa</h2>

          <p>Cookie adalah berkas kecil yang disimpan peramban Anda. Situs ini memakai cookie seperlunya saja:</p>
          <div class="table-wrap">
          <table class="legal-table">
            <thead><tr><th style="width:26%">Jenis</th><th style="width:36%">Kegunaan</th><th>Bisa dimatikan?</th></tr></thead>
            <tbody>
              <tr><td><strong>Wajib</strong></td><td>Menjaga sesi dan melindungi formulir dari penyalahgunaan lintas situs</td><td>Tidak — situs tidak berfungsi normal tanpanya</td></tr>
              <tr><td><strong>Analitik</strong></td><td>Menghitung jumlah kunjungan dan halaman yang paling banyak dibaca, dalam bentuk agregat</td><td>Ya, lewat pengaturan peramban Anda</td></tr>
            </tbody>
          </table>
          </div>
          <p>Kami <strong>tidak</strong> memasang cookie periklanan maupun pelacak lintas situs untuk penargetan iklan.</p>
          <p>Anda bisa menghapus atau memblokir cookie melalui pengaturan peramban. Perlu diketahui, memblokir
          cookie wajib dapat membuat formulir konsultasi gagal terkirim.</p>
          <div class="callout">
            <p><span class="todo">[Lengkapi bagian ini setelah memutuskan alat analitik yang dipakai — misalnya
            Google Analytics 4 — termasuk nama cookie, masa berlaku, dan tautan ke kebijakan privasi penyedianya.]</span></p>
          </div>
        </section>
        <section id="berbagi">
          <h2>Pihak ketiga yang dapat mengakses data</h2>

          <p>Untuk menjalankan operasional, kami memakai beberapa penyedia layanan yang dalam menjalankan tugasnya
          dapat memproses data Anda atas perintah kami. Mereka terikat perjanjian dan hanya boleh memakai data
          untuk keperluan yang kami tentukan.</p>
          <ul>
            <li><strong>Penyedia hosting dan infrastruktur</strong> — menyimpan situs dan basis data</li>
            <li><strong>Penyedia layanan email</strong> — mengirim dan menerima korespondensi</li>
            <li><strong>Penyedia layanan pesan</strong> — WhatsApp Business, bila Anda menghubungi kami lewat kanal itu</li>
            <li><strong>Penyedia analitik situs</strong> — menghasilkan statistik kunjungan agregat</li>
          </ul>
          <div class="callout">
            <p><span class="todo">[Sebutkan nama penyedia yang benar-benar dipakai beserta negara lokasi servernya.
            UU PDP mengharuskan subjek data mengetahui kepada siapa datanya dialihkan.]</span></p>
          </div>
          <p>Di luar itu, kami hanya membuka data Anda apabila:</p>
          <ul>
            <li>Anda memberikan persetujuan tegas untuk itu;</li>
            <li>diwajibkan oleh peraturan perundang-undangan atau perintah pengadilan;</li>
            <li>diperlukan untuk menegakkan perjanjian atau melindungi hak kami secara hukum.</li>
          </ul>
          <p>Bila terjadi penggabungan atau pengalihan usaha, data dapat beralih ke entitas penerus. Anda akan
          kami beri tahu sebelum hal itu berlaku, berikut pilihan yang tersedia bagi Anda.</p>
        </section>
        <section id="proyek">
          <h2>Data klien selama proyek berjalan</h2>

          <p>Bagian ini penting bagi calon klien, karena sifatnya berbeda dari data pemasaran biasa.</p>
          <p>Ketika kami mengerjakan proyek, kami dapat bersinggungan dengan data operasional perusahaan Anda —
          termasuk data pribadi karyawan, pelanggan, atau pemasok Anda. Dalam hubungan itu, kedudukan kami adalah
          <strong>Prosesor Data Pribadi</strong>, sedangkan <strong>Anda</strong> tetap menjadi Pengendali Data.</p>
          <p>Prinsip kerja kami:</p>
          <ul>
            <li>Kami hanya memproses data sesuai instruksi tertulis Anda dan sebatas keperluan proyek.</li>
            <li>Untuk pengembangan dan pengujian, kami mengutamakan pemakaian <strong>data contoh yang disamarkan</strong>,
                bukan salinan data produksi.</li>
            <li>Akses dibatasi pada anggota tim yang mengerjakan proyek Anda, dan seluruhnya terikat NDA.</li>
            <li>Setelah proyek berakhir, salinan data yang ada pada kami dihapus atau dikembalikan sesuai kesepakatan.</li>
          </ul>
          <p>Ketentuan rinci — termasuk lingkup instruksi, tindakan pengamanan, dan penanganan insiden — dituangkan
          dalam perjanjian proyek dan perjanjian kerahasiaan yang kami tandatangani bersama Anda, bukan dalam
          kebijakan ini.</p>
        </section>
        <section id="retensi">
          <h2>Berapa lama data disimpan</h2>

          <p>Kami tidak menyimpan data lebih lama daripada yang diperlukan:</p>
          <div class="table-wrap">
          <table class="legal-table">
            <thead><tr><th style="width:44%">Jenis data</th><th>Masa simpan</th></tr></thead>
            <tbody>
              <tr><td>Pengajuan konsultasi yang tidak berlanjut</td><td>24 bulan sejak kontak terakhir, lalu dihapus</td></tr>
              <tr><td>Korespondensi dengan klien aktif</td><td>Selama hubungan kerja sama berlangsung</td></tr>
              <tr><td>Dokumen proyek dan pembukuan</td><td>10 tahun, mengikuti ketentuan dokumen perusahaan</td></tr>
              <tr><td>Log server</td><td>90 hari</td></tr>
              <tr><td>Statistik analitik agregat</td><td>26 bulan, tidak lagi memuat pengenal individu</td></tr>
            </tbody>
          </table>
          </div>
          <p>Anda dapat meminta penghapusan lebih awal kapan saja, kecuali untuk data yang wajib kami simpan
          berdasarkan peraturan perpajakan dan pembukuan.</p>
        </section>
        <section id="keamanan">
          <h2>Langkah pengamanan</h2>

          <p>Kami menerapkan langkah teknis dan organisasi yang wajar untuk melindungi data Anda:</p>
          <ul>
            <li>Sambungan situs dienkripsi dengan HTTPS/TLS.</li>
            <li>Kata sandi dan data sensitif disimpan dalam bentuk terenkripsi.</li>
            <li>Akses ke sistem dan basis data diberikan per peran, berdasarkan prinsip keperluan minimum.</li>
            <li>Pencadangan dilakukan terjadwal dan diuji pemulihannya secara berkala.</li>
            <li>Perubahan pada data penting tercatat dalam log audit.</li>
            <li>Seluruh personel terikat kewajiban menjaga kerahasiaan.</li>
          </ul>
          <p>Meski demikian, tidak ada sistem yang sepenuhnya kebal. Kami tidak dapat menjamin keamanan mutlak,
          dan kami mendorong Anda untuk tidak mengirimkan informasi rahasia melalui formulir publik sebelum
          perjanjian kerahasiaan ditandatangani.</p>
        </section>
        <section id="hak">
          <h2>Hak Anda atas data pribadi</h2>

          <p>Berdasarkan UU Pelindungan Data Pribadi, Anda berhak untuk:</p>
          <ul>
            <li><strong>Mendapatkan informasi</strong> tentang identitas kami, dasar dan tujuan pemrosesan, serta
                rekam jejak pemrosesan data Anda;</li>
            <li><strong>Mengakses</strong> dan memperoleh salinan data pribadi Anda yang kami simpan;</li>
            <li><strong>Memperbaiki atau memperbarui</strong> data yang tidak akurat atau tidak lengkap;</li>
            <li><strong>Mengakhiri pemrosesan, menghapus, atau memusnahkan</strong> data pribadi Anda;</li>
            <li><strong>Menarik kembali persetujuan</strong> yang sebelumnya Anda berikan, kapan saja;</li>
            <li><strong>Menunda atau membatasi</strong> pemrosesan data pribadi Anda;</li>
            <li><strong>Mengajukan keberatan</strong> atas pengambilan keputusan yang semata-mata dilakukan secara otomatis;</li>
            <li><strong>Memperoleh dan memindahkan</strong> data Anda dalam format yang lazim dipakai;</li>
            <li><strong>Menuntut ganti rugi</strong> atas pelanggaran pemrosesan data pribadi Anda.</li>
          </ul>
          <p>Untuk menggunakan hak-hak tersebut, kirim permintaan ke
          <a href="mailto:{{ config('arsytech.contact.email') }}">{{ config('arsytech.contact.email') }}</a> dengan subjek <em>“Permintaan Hak Subjek Data”</em>.
          Demi keamanan, kami dapat meminta Anda membuktikan identitas terlebih dahulu agar data tidak diserahkan
          kepada orang yang tidak berhak.</p>
          <p>Penarikan persetujuan tidak membatalkan keabsahan pemrosesan yang sudah terjadi sebelumnya, dan dapat
          berakibat kami tidak lagi bisa menindaklanjuti permintaan konsultasi Anda.</p>
          <p>Bila Anda menilai penanganan kami belum memadai, Anda berhak menyampaikan pengaduan kepada lembaga
          yang berwenang di bidang pelindungan data pribadi.</p>
        </section>
        <section id="insiden">
          <h2>Bila terjadi kegagalan pelindungan data</h2>

          <p>Apabila terjadi kegagalan pelindungan data pribadi, kami akan:</p>
          <ol>
            <li>Segera membatasi dampak dan mengamankan sistem yang terdampak;</li>
            <li>Memberitahukan secara tertulis kepada Anda selaku subjek data dan kepada lembaga berwenang
                dalam waktu <strong>paling lambat 3&times;24 jam</strong> sejak diketahui, sebagaimana diatur
                dalam UU PDP;</li>
            <li>Menjelaskan data apa yang terdampak, kapan dan bagaimana kejadiannya, serta langkah penanganan
                yang sudah dan akan kami ambil;</li>
            <li>Menyampaikan hasil penelusuran akhir setelah investigasi selesai.</li>
          </ol>
          <p>Untuk proyek klien, alur pemberitahuan mengikuti ketentuan yang disepakati dalam perjanjian proyek —
          biasanya kami memberi tahu Anda lebih dahulu agar Anda, selaku Pengendali Data, dapat menjalankan
          kewajiban pemberitahuan kepada subjek data Anda sendiri.</p>
        </section>
        <section id="transfer">
          <h2>Pemindahan data ke luar wilayah Indonesia</h2>

          <p>Sebagian penyedia layanan yang kami pakai dapat menempatkan servernya di luar Indonesia. Bila hal itu
          terjadi, kami memastikan negara tujuan memiliki tingkat pelindungan data yang setara atau lebih tinggi,
          atau menempuh pengamanan lain yang memadai sebagaimana disyaratkan peraturan.</p>
          <p>Untuk proyek klien, penempatan data sepenuhnya menjadi pilihan Anda: server milik perusahaan sendiri
          (<em>on-premise</em>), cloud di data center Indonesia, atau cloud regional. Pilihan itu kami sepakati
          tertulis sebelum pengembangan dimulai.</p>
        </section>
        <section id="anak">
          <h2>Data anak</h2>

          <p>Layanan kami ditujukan bagi kalangan bisnis dan institusi, bukan untuk anak. Kami tidak dengan sengaja
          mengumpulkan data pribadi anak melalui situs ini.</p>
          <p>Bila Anda mengetahui ada data anak yang terkirim kepada kami, mohon beri tahu kami agar data tersebut
          dapat segera dihapus.</p>
        </section>
        <section id="perubahan">
          <h2>Perubahan atas kebijakan ini</h2>

          <p>Kebijakan ini dapat kami perbarui bila terjadi perubahan cara kerja, penyedia layanan, atau ketentuan
          hukum yang berlaku. Tanggal pembaruan terakhir selalu tercantum di bagian atas halaman.</p>
          <p>Untuk perubahan yang bersifat mendasar — misalnya penambahan tujuan pemrosesan baru — kami akan
          memberitahukannya lebih dahulu melalui email kepada klien aktif dan pemberitahuan di situs ini,
          sebelum perubahan mulai berlaku.</p>
        </section>
        <section id="kontak">
          <h2>Menghubungi kami</h2>

          <p>Pertanyaan, keberatan, atau permintaan terkait kebijakan ini dapat disampaikan melalui:</p>
          <ul>
            <li>Email: <a href="mailto:{{ config('arsytech.contact.email') }}">{{ config('arsytech.contact.email') }}</a></li>
            <li>WhatsApp: <a href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener">{{ config('arsytech.contact.phone') }}</a></li>
            <li>Formulir: <a href="{{ route('kontak') }}">halaman Kontak</a></li>
            <li>Surat: <span class="todo">[Isi alamat lengkap kantor]</span>, Bogor, Jawa Barat, Indonesia</li>
          </ul>
          <p>Kami menanggapi dalam 3&times;24 jam dan menuntaskan permintaan selambat-lambatnya dalam 14 hari kerja.</p>
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
