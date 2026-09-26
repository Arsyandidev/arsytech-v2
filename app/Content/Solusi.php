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
                'description' => 'Arsytech membangun ERP modular: purchasing, persediaan, penjualan, produksi, dan keuangan dalam satu basis data. Source code jadi milik Anda.',
                'heading' => 'ERP yang menyatukan pembelian, persediaan, dan keuangan',
                'lead' => 'Satu sumber data untuk seluruh divisi. Setiap transaksi dicatat sekali, lalu dipakai bersama — sehingga closing lebih cepat, stok akurat, dan tidak ada lagi rapat yang habis untuk mendebat angka.',
                'card' => [
                    'title' => 'Enterprise Resource Planning (ERP)',
                    'body' => 'Satu sumber data untuk pembelian, produksi, persediaan, dan keuangan. Closing lebih cepat, stok akurat, dan setiap divisi melihat angka yang sama.',
                    'features' => [
                        'Procure-to-pay &amp; order-to-cash',
                        'Multi-cabang &amp; multi-gudang',
                        'Alur persetujuan berjenjang',
                    ],
                ],
                'intro' => [
                    'title' => 'Ketika tiap divisi punya kebenarannya sendiri',
                    'paragraphs' => [
                        'Gudang mencatat di kartu stok, purchasing di spreadsheet, finance di aplikasi akuntansi terpisah. Masing-masing benar menurut catatannya sendiri, tapi tidak ada satu angka yang bisa dipakai manajemen untuk memutuskan.',
                        'ERP menutup celah itu dengan memindahkan seluruh transaksi operasional ke satu basis data. Barang masuk di gudang langsung memperbarui stok, menutup PO, dan membentuk jurnal persediaan — tanpa ada yang mengetik ulang.',
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
                        'body' => 'Stok sistem dan fisik bertemu tanpa opname darurat tiap kuartal.',
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Apakah ERP harus dibangun sekaligus semua modul?',
                        'answer' => 'Tidak, dan kami jarang menyarankannya. Umumnya kami mulai dari satu atau dua modul yang paling menghambat — misalnya purchasing dan persediaan — lalu menambahkan produksi dan keuangan pada fase berikutnya. Arsitekturnya dirancang modular sejak awal supaya penambahan tidak berarti membongkar ulang.',
                    ],
                    [
                        'question' => 'Data dari sistem lama kami bisa dipindahkan?',
                        'answer' => 'Umumnya bisa. Migrasi data master (pelanggan, vendor, item, saldo awal) adalah bagian standar dari tahap UAT & Go-Live. Kami periksa kualitas dan konsistensi data sumber lebih dulu di tahap discovery, karena di situlah biasanya waktu terbanyak terpakai.',
                    ],
                    [
                        'question' => 'Berapa lama pengerjaan ERP?',
                        'answer' => 'ERP multi-divisi biasanya 6–12 bulan dan dirilis bertahap, sehingga modul pertama sudah dipakai jauh sebelum keseluruhan selesai. Satu modul fokus bisa selesai dalam 2–4 bulan.',
                    ],
                ],
            ],
            'wms' => [
                'short' => 'WMS',
                'name' => 'Warehouse Management System',
                'icon' => 'bi-box-seam-fill',
                'title' => 'Sistem WMS Gudang Berbasis Barcode | Arsytech',
                'description' => 'WMS custom dari Arsytech: penerimaan, putaway, picking, packing, pengiriman, dan stock opname dengan barcode. Akurasi stok 99%+, multi-gudang.',
                'heading' => 'WMS yang membuat stok sistem dan fisik akhirnya bertemu',
                'lead' => 'Kendali penuh atas pergerakan barang dari penerimaan sampai pengiriman. Selisih stok turun drastis, picking lebih cepat, dan stock opname tidak lagi menghentikan operasional selama dua hari.',
                'card' => [
                    'title' => 'Warehouse Management System (WMS)',
                    'body' => 'Kendali penuh atas pergerakan barang dari terima sampai kirim. Selisih stok turun, proses picking dan packing jauh lebih cepat.',
                    'features' => [
                        'Barcode &amp; QR scanning',
                        'Putaway, picking, packing, dispatch',
                        'Stock opname tanpa setop operasi',
                    ],
                ],
                'intro' => [
                    'title' => 'Selisih stok bukan karena tim tidak teliti',
                    'paragraphs' => [
                        'Selama pencatatan masih mengandalkan ingatan dan kertas, selisih hanya soal waktu. Barang pindah rak tanpa tercatat, retur masuk tanpa dokumen, dan opname baru mengungkap masalah tiga bulan kemudian — saat sudah terlambat ditelusuri.',
                        'WMS memaksa setiap pergerakan barang tercatat pada saat kejadian, lewat scan barcode di perangkat yang dipegang petugas. Bukan menambah beban administrasi, tapi memindahkannya dari akhir bulan ke detik saat barang berpindah.',
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
                        'body' => 'Rute pengambilan disusun sistem, bukan dihafal petugas.',
                    ],
                    [
                        'value' => '2 jam',
                        'label' => 'Stock opname bulanan',
                        'body' => 'Dari dua hari penuh dengan operasional dihentikan.',
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Perlu perangkat khusus seperti scanner industrial?',
                        'answer' => 'Tidak wajib. Sistem kami berjalan di browser dan bisa dipakai lewat HP Android biasa dengan kamera sebagai pemindai. Kalau volume transaksi tinggi, scanner khusus memang lebih nyaman dan bisa ditambahkan belakangan tanpa mengubah sistem.',
                    ],
                    [
                        'question' => 'Gudang kami sering offline. Apakah tetap bisa dipakai?',
                        'answer' => 'Bisa. Untuk area dengan sinyal tidak stabil, kami sediakan mode offline yang menyimpan transaksi di perangkat lalu menyinkronkannya begitu koneksi kembali. Ini kami rancang sejak awal, bukan ditambal kemudian.',
                    ],
                    [
                        'question' => 'Bagaimana kalau kami punya lebih dari satu gudang?',
                        'answer' => 'WMS kami mendukung multi-gudang dan multi-lokasi sejak versi pertama, termasuk transfer antar gudang dengan dokumen dan persetujuan sendiri. Setiap gudang bisa punya tata letak dan aturan penempatan yang berbeda.',
                    ],
                ],
            ],
            'hris' => [
                'short' => 'HRIS',
                'name' => 'Human Resource Information System',
                'icon' => 'bi-people-fill',
                'title' => 'Sistem HRIS & Payroll Karyawan | Arsytech',
                'description' => 'HRIS custom dari Arsytech: absensi, shift, cuti, payroll, PPh 21, BPJS, dan portal mandiri karyawan. Payroll selesai dalam hitungan jam.',
                'heading' => 'HRIS yang menutup jarak antara absensi dan slip gaji',
                'lead' => 'Absensi, cuti, lembur, dan payroll berada di satu alur. Tim HR berhenti merekap manual tiap akhir bulan, dan karyawan bisa mengurus administrasinya sendiri lewat portal.',
                'card' => [
                    'title' => 'Human Resource Information System (HRIS)',
                    'body' => 'Administrasi SDM berjalan otomatis. Payroll selesai tanpa rekap manual, data karyawan selalu mutakhir dan bisa diakses karyawan sendiri.',
                    'features' => [
                        'Absensi, cuti, lembur, shift',
                        'Payroll, PPh 21, BPJS',
                        'Portal mandiri karyawan',
                    ],
                ],
                'intro' => [
                    'title' => 'Payroll seharusnya bukan acara lembur bulanan',
                    'paragraphs' => [
                        'Di banyak perusahaan, data absensi keluar dari mesin fingerprint sebagai file mentah, lalu dirapikan di Excel, dicocokkan dengan catatan cuti di buku, dan baru kemudian dihitung. Satu salah ketik berarti satu karyawan komplain — dan tim HR menghabiskan tiga hari untuk menelusurinya.',
                        'HRIS menyambungkan rantai itu. Data absensi masuk otomatis, cuti dan lembur yang sudah disetujui ikut terhitung, dan payroll tinggal ditinjau lalu dikunci. Slip gaji terkirim ke portal masing-masing karyawan tanpa dicetak satu per satu.',
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
                        'body' => 'Absensi, cuti, dan lembur mengalir langsung ke perhitungan gaji.',
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
                        'answer' => 'Umumnya bisa. Kami terbiasa menarik data dari mesin absensi merek umum lewat API, file ekspor terjadwal, atau koneksi langsung ke basis datanya. Kelayakannya kami periksa di tahap discovery sebelum apa pun dijanjikan.',
                    ],
                    [
                        'question' => 'Perhitungan PPh 21 dan BPJS mengikuti aturan terbaru?',
                        'answer' => 'Ya. Komponen perhitungan dibuat dapat dikonfigurasi, bukan ditanam keras di dalam kode, sehingga ketika tarif atau aturan berubah, penyesuaian dilakukan lewat pengaturan — bukan lewat pembaruan sistem.',
                    ],
                    [
                        'question' => 'Bagaimana dengan perusahaan yang punya beberapa entitas?',
                        'answer' => 'HRIS kami mendukung multi-entitas dengan kebijakan cuti, struktur gaji, dan hari libur yang berbeda per perusahaan, sambil tetap memberi manajemen grup satu tampilan gabungan.',
                    ],
                ],
            ],
            'crm' => [
                'short' => 'CRM',
                'name' => 'Customer Relationship Management',
                'icon' => 'bi-graph-up-arrow',
                'title' => 'Sistem CRM Penjualan B2B | Arsytech',
                'description' => 'CRM custom dari Arsytech: lead, pipeline deal, penawaran, target, dan forecast penjualan. Terhubung ke ERP dan WhatsApp Business API.',
                'heading' => 'CRM yang membuat forecast berhenti jadi tebakan',
                'lead' => 'Setiap prospek, penawaran, dan tindak lanjut tercatat di satu tempat. Manajemen bisa melihat pipeline apa adanya, dan tidak ada peluang yang hilang karena sales-nya pindah kerja.',
                'card' => [
                    'title' => 'Customer Relationship Management (CRM)',
                    'body' => 'Pipeline penjualan yang terukur. Tidak ada prospek yang terlewat, dan forecast bukan lagi soal perasaan kepala cabang.',
                    'features' => [
                        'Lead, deal, dan aktivitas sales',
                        'Target &amp; forecast per tim',
                        'Riwayat interaksi pelanggan',
                    ],
                ],
                'intro' => [
                    'title' => 'Pipeline yang hanya ada di kepala tim sales',
                    'paragraphs' => [
                        'Prospek dicatat di buku agenda, tindak lanjut diingat sendiri, dan laporan mingguan disusun dari ingatan menjelang rapat. Ketika seorang sales resign, relasi dan riwayat negosiasinya ikut keluar dari perusahaan.',
                        'CRM memindahkan aset itu kembali ke perusahaan. Setiap interaksi tercatat, setiap deal punya tahap dan nilai, dan forecast dihitung dari data — bukan dari optimisme.',
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
                        'body' => 'Jadwal kunjungan, panggilan, dan pengingat agar tidak ada prospek yang menganggur.',
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
                        'body' => 'Dari dua hari merekap laporan manual tiap akhir bulan.',
                    ],
                    [
                        'value' => '100%',
                        'label' => 'Riwayat tetap di perusahaan',
                        'body' => 'Relasi pelanggan tidak ikut hilang saat sales berganti.',
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Bisa terhubung ke WhatsApp Business?',
                        'answer' => 'Bisa, lewat WhatsApp Business API resmi. Percakapan masuk dapat otomatis menjadi lead dan tercatat di linimasa pelanggan. Perlu dicatat bahwa penggunaan API resmi memiliki biaya dari penyedia yang terpisah dari biaya pengembangan.',
                    ],
                    [
                        'question' => 'Apakah CRM ini terhubung ke ERP?',
                        'answer' => 'Ya, bila keduanya kami bangun. Deal yang ditutup bisa langsung membentuk sales order, dan sales dapat melihat ketersediaan stok serta status piutang pelanggan tanpa berpindah aplikasi.',
                    ],
                    [
                        'question' => 'Tim sales kami banyak di lapangan. Bisa dipakai dari HP?',
                        'answer' => 'Bisa. Antarmuka dirancang agar nyaman dipakai di layar kecil, termasuk untuk mencatat hasil kunjungan langsung di tempat dengan penanda lokasi.',
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
