<?php

namespace App\Content;

class Solusi
{
    public static function all(): array
    {
        return [
            'erp' => [
                'short' => 'ERP',
                'name' => 'Enterprise Resource Planning',
                'icon' => 'bi-diagram-3-fill',
                'title' => 'Sistem ERP Custom untuk Perusahaan Indonesia | Arsytech',
                'description' => 'Arsytech membangun ERP custom yang modular: purchasing, persediaan, penjualan, produksi, dan keuangan dalam satu basis data. Source code menjadi milik Anda.',
                'heading' => 'Satu ERP untuk pembelian, persediaan, dan keuangan',
                'lead' => 'Semua divisi bekerja dari data yang sama. Transaksi cukup dicatat sekali lalu dipakai bersama, jadi closing lebih cepat, stok lebih akurat, dan rapat tidak lagi habis untuk mencocokkan angka.',
                'card' => [
                    'title' => 'Enterprise Resource Planning (ERP)',
                    'body' => 'Pembelian, produksi, persediaan, dan keuangan tercatat di satu tempat. Closing jadi lebih cepat, stok lebih akurat, dan semua divisi membaca angka yang sama.',
                    'features' => [
                        'Procure-to-pay &amp; order-to-cash',
                        'Multi-cabang &amp; multi-gudang',
                        'Alur persetujuan berjenjang',
                    ],
                ],
                'intro' => [
                    'title' => 'Saat tiap divisi punya angkanya sendiri',
                    'paragraphs' => [
                        'Gudang mencatat di kartu stok, purchasing di spreadsheet, finance di aplikasi akuntansi yang terpisah. Masing-masing benar menurut catatannya, tapi manajemen tidak punya satu angka yang bisa dipegang untuk mengambil keputusan.',
                        'ERP menutup celah itu dengan memindahkan semua transaksi operasional ke satu basis data. Begitu barang diterima di gudang, stok langsung bertambah, PO tertutup, dan jurnal persediaan terbentuk. Tidak ada yang perlu mengetik ulang.',
                    ],
                ],
                'modules' => [
                    [
                        'icon' => 'bi-cart-check',
                        'title' => 'Purchasing',
                        'body' => 'Permintaan pembelian, perbandingan vendor, PO, dan penerimaan barang dengan persetujuan berjenjang.',
                    ],
                    [
                        'icon' => 'bi-box-seam',
                        'title' => 'Persediaan',
                        'body' => 'Kartu stok per gudang, transfer antar lokasi, penyesuaian, dan penilaian persediaan.',
                    ],
                    [
                        'icon' => 'bi-receipt-cutoff',
                        'title' => 'Penjualan',
                        'body' => 'Sales order, surat jalan, faktur, dan pemantauan piutang per pelanggan.',
                    ],
                    [
                        'icon' => 'bi-gear',
                        'title' => 'Produksi',
                        'body' => 'Bill of material, perintah kerja, pencatatan hasil produksi, dan biaya per batch.',
                    ],
                    [
                        'icon' => 'bi-cash-stack',
                        'title' => 'Keuangan',
                        'body' => 'Jurnal otomatis dari transaksi operasional, buku besar, AR/AP, dan laporan keuangan.',
                    ],
                    [
                        'icon' => 'bi-shield-check',
                        'title' => 'Tata Kelola',
                        'body' => 'Hak akses per peran, jejak audit setiap perubahan, dan alur persetujuan yang bisa diatur.',
                    ],
                ],
                'outcomes' => [
                    [
                        'value' => '3 hari',
                        'label' => 'Waktu closing bulanan',
                        'body' => 'Dari rata-rata 10–12 hari pada klien yang masih merekap manual.',
                    ],
                    [
                        'value' => '1×',
                        'label' => 'Entri data per transaksi',
                        'body' => 'Sebelumnya satu transaksi diketik ulang di tiga sampai empat tempat.',
                    ],
                    [
                        'value' => '99%+',
                        'label' => 'Akurasi persediaan',
                        'body' => 'Stok di sistem dan di rak cocok, tanpa opname darurat tiap kuartal.',
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Apakah ERP harus dibangun sekaligus semua modul?',
                        'answer' => 'Tidak, dan biasanya kami juga tidak menyarankannya. Kami mulai dari satu atau dua modul yang paling mengganggu operasional, misalnya purchasing dan persediaan, lalu produksi dan keuangan menyusul di fase berikutnya. Arsitekturnya kami buat modular dari awal, jadi menambah modul tidak perlu membongkar yang sudah jalan.',
                    ],
                    [
                        'question' => 'Data dari sistem lama kami bisa dipindahkan?',
                        'answer' => 'Umumnya bisa. Migrasi data master seperti pelanggan, vendor, item, dan saldo awal sudah termasuk dalam tahap UAT & Go-Live. Kualitas dan konsistensi data sumbernya kami cek lebih dulu saat discovery, karena bagian inilah yang biasanya paling makan waktu.',
                    ],
                    [
                        'question' => 'Berapa lama pengerjaan ERP?',
                        'answer' => 'ERP untuk banyak divisi biasanya butuh 6–12 bulan dan kami rilis bertahap, jadi modul pertama sudah bisa dipakai jauh sebelum semuanya selesai. Kalau fokus di satu modul saja, umumnya selesai dalam 2–4 bulan.',
                    ],
                ],
            ],
            'wms' => [
                'short' => 'WMS',
                'name' => 'Warehouse Management System',
                'icon' => 'bi-box-seam-fill',
                'title' => 'Sistem WMS Gudang Berbasis Barcode | Arsytech',
                'description' => 'WMS custom dari Arsytech untuk penerimaan, putaway, picking, packing, pengiriman, dan stock opname berbasis barcode. Mendukung multi-gudang, akurasi stok 99%+.',
                'heading' => 'WMS agar stok di sistem sama dengan di rak',
                'lead' => 'Setiap pergerakan barang tercatat, dari penerimaan sampai pengiriman. Selisih stok turun jauh, picking lebih cepat, dan stock opname tidak perlu lagi menghentikan gudang selama dua hari.',
                'card' => [
                    'title' => 'Warehouse Management System (WMS)',
                    'body' => 'Pergerakan barang tercatat sejak diterima sampai dikirim. Selisih stok berkurang, dan picking serta packing jadi jauh lebih cepat.',
                    'features' => [
                        'Barcode &amp; QR scanning',
                        'Putaway, picking, packing, dispatch',
                        'Stock opname tanpa setop operasi',
                    ],
                ],
                'intro' => [
                    'title' => 'Dari mana selisih stok berasal',
                    'paragraphs' => [
                        'Tim gudang umumnya sudah teliti. Masalahnya, selama pencatatan masih pakai kertas dan ingatan, selisih tinggal menunggu waktu. Barang pindah rak tanpa dicatat, retur masuk tanpa dokumen, dan opname baru menemukannya tiga bulan kemudian, saat sudah sulit ditelusuri.',
                        'Dengan WMS, setiap pergerakan barang dicatat saat itu juga lewat scan barcode di perangkat yang dipegang petugas. Administrasinya tetap ada, hanya dicicil setiap kali barang berpindah, jadi tidak menumpuk di akhir bulan.',
                    ],
                ],
                'modules' => [
                    [
                        'icon' => 'bi-box-arrow-in-down',
                        'title' => 'Penerimaan',
                        'body' => 'Cocokkan barang datang dengan PO, catat selisih dan kondisi, cetak label di tempat.',
                    ],
                    [
                        'icon' => 'bi-grid-3x3-gap',
                        'title' => 'Putaway &amp; Lokasi',
                        'body' => 'Penempatan berbasis aturan, peta rak, dan pelacakan posisi barang sampai level bin.',
                    ],
                    [
                        'icon' => 'bi-upc-scan',
                        'title' => 'Picking &amp; Packing',
                        'body' => 'Daftar ambil per rute, verifikasi scan, dan pengemasan dengan pengecekan ganda.',
                    ],
                    [
                        'icon' => 'bi-truck',
                        'title' => 'Pengiriman',
                        'body' => 'Surat jalan, konsolidasi muatan, dan status kirim yang bisa dipantau tim sales.',
                    ],
                    [
                        'icon' => 'bi-clipboard-check',
                        'title' => 'Stock Opname',
                        'body' => 'Cycle counting berkala per zona tanpa menghentikan operasional gudang.',
                    ],
                    [
                        'icon' => 'bi-arrow-left-right',
                        'title' => 'Transfer &amp; Retur',
                        'body' => 'Perpindahan antar gudang dan penanganan retur pelanggan dengan jejak lengkap.',
                    ],
                ],
                'outcomes' => [
                    [
                        'value' => '99%+',
                        'label' => 'Akurasi stok',
                        'body' => 'Dari kisaran 85–90% pada gudang yang masih mencatat manual.',
                    ],
                    [
                        'value' => '2–3×',
                        'label' => 'Kecepatan picking',
                        'body' => 'Rute pengambilan disusun sistem, petugas tak perlu menghafal.',
                    ],
                    [
                        'value' => '2 jam',
                        'label' => 'Stock opname bulanan',
                        'body' => 'Sebelumnya dua hari penuh dan gudang harus berhenti.',
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Perlu perangkat khusus seperti scanner industrial?',
                        'answer' => 'Tidak wajib. Sistemnya berjalan di browser, jadi bisa dipakai dari HP Android biasa dengan kamera sebagai pemindai. Kalau volume transaksinya tinggi, scanner khusus memang lebih nyaman, dan bisa ditambahkan belakangan tanpa mengubah sistem.',
                    ],
                    [
                        'question' => 'Gudang kami sering offline. Apakah tetap bisa dipakai?',
                        'answer' => 'Bisa. Untuk area yang sinyalnya tidak stabil, kami siapkan mode offline: transaksi disimpan dulu di perangkat, lalu disinkronkan begitu koneksi kembali. Fitur ini sudah masuk rancangan kami sejak awal.',
                    ],
                    [
                        'question' => 'Bagaimana kalau kami punya lebih dari satu gudang?',
                        'answer' => 'Tidak masalah. Multi-gudang dan multi-lokasi sudah didukung sejak versi pertama, termasuk transfer antar gudang dengan dokumen dan persetujuannya sendiri. Tiap gudang juga boleh punya tata letak dan aturan penempatan yang berbeda.',
                    ],
                ],
            ],
            'hris' => [
                'short' => 'HRIS',
                'name' => 'Human Resource Information System',
                'icon' => 'bi-people-fill',
                'title' => 'Sistem HRIS & Payroll Karyawan | Arsytech',
                'description' => 'HRIS custom dari Arsytech untuk absensi, shift, cuti, payroll, PPh 21, BPJS, dan portal mandiri karyawan. Proses payroll selesai dalam hitungan jam.',
                'heading' => 'HRIS dari absensi sampai slip gaji',
                'lead' => 'Absensi, cuti, lembur, dan payroll ada dalam satu alur. Tim HR tidak perlu lagi merekap manual tiap akhir bulan, dan karyawan bisa mengurus administrasinya sendiri lewat portal.',
                'card' => [
                    'title' => 'Human Resource Information System (HRIS)',
                    'body' => 'Administrasi SDM berjalan otomatis. Payroll selesai tanpa rekap manual, dan data karyawan selalu terbaru serta bisa dilihat sendiri oleh karyawan.',
                    'features' => [
                        'Absensi, cuti, lembur, shift',
                        'Payroll, PPh 21, BPJS',
                        'Portal mandiri karyawan',
                    ],
                ],
                'intro' => [
                    'title' => 'Payroll tanpa lembur tiap akhir bulan',
                    'paragraphs' => [
                        'Di banyak perusahaan, data absensi keluar dari mesin fingerprint sebagai file mentah. File itu dirapikan di Excel, dicocokkan dengan catatan cuti di buku, baru kemudian dihitung. Satu salah ketik bisa berujung komplain karyawan, dan tim HR bisa habis tiga hari untuk menelusurinya.',
                        'HRIS menyambungkan semua langkah itu. Data absensi masuk otomatis, cuti dan lembur yang sudah disetujui ikut terhitung, jadi payroll tinggal diperiksa lalu dikunci. Slip gaji dikirim ke portal tiap karyawan, tidak perlu dicetak satu per satu.',
                    ],
                ],
                'modules' => [
                    [
                        'icon' => 'bi-person-vcard',
                        'title' => 'Data Karyawan',
                        'body' => 'Profil, kontrak, riwayat jabatan, dokumen, dan struktur organisasi yang selalu mutakhir.',
                    ],
                    [
                        'icon' => 'bi-fingerprint',
                        'title' => 'Absensi &amp; Shift',
                        'body' => 'Integrasi mesin absensi, absensi lokasi dengan GPS, pengaturan shift dan hari libur.',
                    ],
                    [
                        'icon' => 'bi-calendar-check',
                        'title' => 'Cuti &amp; Izin',
                        'body' => 'Pengajuan dan persetujuan berjenjang, saldo cuti otomatis, kalender tim.',
                    ],
                    [
                        'icon' => 'bi-cash-coin',
                        'title' => 'Payroll',
                        'body' => 'Perhitungan gaji, tunjangan, lembur, PPh 21, dan BPJS dengan komponen yang bisa diatur.',
                    ],
                    [
                        'icon' => 'bi-person-workspace',
                        'title' => 'Portal Karyawan',
                        'body' => 'Slip gaji, pengajuan cuti, klaim, dan pembaruan data mandiri tanpa lewat HR.',
                    ],
                    [
                        'icon' => 'bi-clipboard-data',
                        'title' => 'Penilaian &amp; Laporan',
                        'body' => 'KPI, penilaian berkala, laporan turnover, dan demografi tenaga kerja.',
                    ],
                ],
                'outcomes' => [
                    [
                        'value' => '4 jam',
                        'label' => 'Proses payroll',
                        'body' => 'Dari 3–5 hari kerja pada perusahaan dengan 200+ karyawan.',
                    ],
                    [
                        'value' => '0',
                        'label' => 'Rekap manual',
                        'body' => 'Absensi, cuti, dan lembur langsung masuk ke perhitungan gaji.',
                    ],
                    [
                        'value' => '−80%',
                        'label' => 'Pertanyaan ke HR',
                        'body' => 'Karyawan mengurus slip, saldo cuti, dan data sendiri lewat portal.',
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Bisa terhubung ke mesin fingerprint yang sudah kami punya?',
                        'answer' => 'Biasanya bisa. Kami sudah terbiasa menarik data dari mesin absensi merek umum, entah lewat API, file ekspor terjadwal, atau koneksi langsung ke basis datanya. Tapi kami cek dulu di tahap discovery sebelum menjanjikan apa pun.',
                    ],
                    [
                        'question' => 'Perhitungan PPh 21 dan BPJS mengikuti aturan terbaru?',
                        'answer' => 'Ya. Komponen perhitungannya bisa dikonfigurasi dan tidak ditanam di dalam kode. Jadi kalau tarif atau aturannya berubah, cukup disesuaikan lewat menu pengaturan tanpa perlu memperbarui sistem.',
                    ],
                    [
                        'question' => 'Bagaimana dengan perusahaan yang punya beberapa entitas?',
                        'answer' => 'Bisa. HRIS kami mendukung multi-entitas, jadi tiap perusahaan boleh punya kebijakan cuti, struktur gaji, dan hari libur sendiri. Manajemen grup tetap bisa melihat semuanya dalam satu tampilan gabungan.',
                    ],
                ],
            ],
            'crm' => [
                'short' => 'CRM',
                'name' => 'Customer Relationship Management',
                'icon' => 'bi-graph-up-arrow',
                'title' => 'Sistem CRM Penjualan B2B | Arsytech',
                'description' => 'CRM custom dari Arsytech untuk lead, pipeline deal, penawaran, target, dan forecast penjualan. Bisa terhubung ke ERP dan WhatsApp Business API.',
                'heading' => 'CRM agar forecast penjualan lebih akurat',
                'lead' => 'Semua prospek, penawaran, dan tindak lanjut tercatat di satu tempat. Manajemen bisa melihat kondisi pipeline yang sebenarnya, dan peluang tidak ikut hilang saat sales-nya pindah kerja.',
                'card' => [
                    'title' => 'Customer Relationship Management (CRM)',
                    'body' => 'Pipeline penjualan tercatat rapi. Prospek tidak ada yang terlewat, dan forecast disusun dari data yang ada di sistem.',
                    'features' => [
                        'Lead, deal, dan aktivitas sales',
                        'Target &amp; forecast per tim',
                        'Riwayat interaksi pelanggan',
                    ],
                ],
                'intro' => [
                    'title' => 'Pipeline yang hanya ada di kepala tim sales',
                    'paragraphs' => [
                        'Prospek dicatat di buku agenda, tindak lanjut diingat masing-masing, dan laporan mingguan disusun dari ingatan menjelang rapat. Kalau ada sales yang resign, relasi dan riwayat negosiasinya ikut pergi bersamanya.',
                        'Dengan CRM, informasi itu tersimpan di sistem milik perusahaan. Setiap interaksi tercatat, setiap deal punya tahap dan nilai, dan forecast dihitung dari data yang sudah masuk.',
                    ],
                ],
                'modules' => [
                    [
                        'icon' => 'bi-person-plus',
                        'title' => 'Lead &amp; Prospek',
                        'body' => 'Penangkapan lead dari website, WhatsApp, dan pameran, lengkap dengan sumbernya.',
                    ],
                    [
                        'icon' => 'bi-kanban',
                        'title' => 'Pipeline Deal',
                        'body' => 'Tahapan penjualan yang bisa diatur, nilai deal, probabilitas, dan perkiraan tanggal tutup.',
                    ],
                    [
                        'icon' => 'bi-calendar-event',
                        'title' => 'Aktivitas &amp; Tindak Lanjut',
                        'body' => 'Jadwal kunjungan, panggilan, dan pengingat supaya tidak ada prospek yang terlupa.',
                    ],
                    [
                        'icon' => 'bi-file-earmark-text',
                        'title' => 'Penawaran',
                        'body' => 'Pembuatan quotation dari daftar harga, revisi bernomor, dan persetujuan diskon.',
                    ],
                    [
                        'icon' => 'bi-bullseye',
                        'title' => 'Target &amp; Forecast',
                        'body' => 'Target per sales dan per tim, pencapaian berjalan, serta proyeksi penutupan.',
                    ],
                    [
                        'icon' => 'bi-chat-left-dots',
                        'title' => 'Riwayat Pelanggan',
                        'body' => 'Semua interaksi, dokumen, dan keluhan dalam satu linimasa per pelanggan.',
                    ],
                ],
                'outcomes' => [
                    [
                        'value' => '0',
                        'label' => 'Prospek terlewat',
                        'body' => 'Setiap lead punya pemilik dan tenggat tindak lanjut yang terpantau.',
                    ],
                    [
                        'value' => '&lt;1 hari',
                        'label' => 'Waktu susun laporan sales',
                        'body' => 'Sebelumnya dua hari merekap manual tiap akhir bulan.',
                    ],
                    [
                        'value' => '100%',
                        'label' => 'Riwayat tetap di perusahaan',
                        'body' => 'Relasi pelanggan tetap tercatat meski sales berganti.',
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Bisa terhubung ke WhatsApp Business?',
                        'answer' => 'Bisa, lewat WhatsApp Business API resmi. Chat yang masuk bisa otomatis jadi lead dan tercatat di linimasa pelanggan. Satu hal yang perlu diketahui: API resmi ini ada biayanya sendiri dari penyedia, terpisah dari biaya pengembangan.',
                    ],
                    [
                        'question' => 'Apakah CRM ini terhubung ke ERP?',
                        'answer' => 'Ya, kalau keduanya kami yang membangun. Deal yang sudah closing bisa langsung jadi sales order, dan sales bisa melihat ketersediaan stok serta status piutang pelanggan tanpa pindah aplikasi.',
                    ],
                    [
                        'question' => 'Tim sales kami banyak di lapangan. Bisa dipakai dari HP?',
                        'answer' => 'Bisa. Tampilannya kami buat nyaman di layar HP, termasuk untuk mencatat hasil kunjungan langsung di lokasi, lengkap dengan penanda lokasinya.',
                    ],
                ],
            ],
        ];
    }

    public static function find(string $slug): ?array
    {
        return static::all()[$slug] ?? null;
    }
}
