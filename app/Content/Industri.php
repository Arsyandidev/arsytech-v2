<?php

namespace App\Content;

class Industri
{
    public static function all(): array
    {
        return [
            'manufaktur' => [
                'name' => 'Manufaktur',
                'icon' => 'bi-gear-wide-connected',
                'summary' => 'Biaya produksi per batch, jadwal mesin, dan stok bahan baku dalam satu kendali.',
                'complaint' => 'Biaya produksi tidak pernah pasti sampai bulan ditutup, dan jadwal mesin disusun di papan tulis.',
                'modules' => ['ERP', 'WMS', 'Accounting &amp; Finance'],
                'title' => 'Sistem ERP & Produksi untuk Manufaktur | Arsytech',
                'description' => 'Sistem manufaktur dari Arsytech: bill of material, perintah kerja, biaya per batch, dan persediaan bahan baku. Closing bulanan turun jadi 3 hari.',
                'heading' => 'Sistem untuk pabrik yang ingin tahu biaya produksinya hari ini',
                'lead' => 'Bahan baku, perintah kerja, hasil produksi, dan biaya per batch dalam satu kendali — sehingga harga pokok bukan lagi angka yang baru diketahui setelah bulan ditutup.',
                'opening' => [
                    'title' => 'Biaya produksi yang selalu terlambat diketahui',
                    'paragraphs' => [
                        'Di banyak pabrik, harga pokok produksi baru bisa dihitung setelah semua nota terkumpul dan stok opname selesai — artinya dua sampai tiga minggu setelah barangnya selesai dibuat. Keputusan harga jual terpaksa diambil dengan data bulan lalu.',
                        'Yang kami bangun adalah rantai yang tidak putus: pemakaian bahan tercatat saat perintah kerja berjalan, hasil produksi dicatat di lini, dan biaya terbentuk seiring prosesnya.',
                    ],
                ],
                'pains' => [
                    [
                        'icon' => 'bi-calculator',
                        'title' => 'Harga pokok baru diketahui akhir bulan',
                        'body' => 'Pemakaian bahan dan jam kerja tidak dicatat seiring proses, jadi biaya per batch hanya bisa diperkirakan.',
                    ],
                    [
                        'icon' => 'bi-calendar-x',
                        'title' => 'Jadwal produksi disusun manual',
                        'body' => 'Papan tulis dan grup chat menentukan mesin mana mengerjakan apa. Perubahan satu order mengacaukan seluruh urutan.',
                    ],
                    [
                        'icon' => 'bi-box2',
                        'title' => 'Bahan baku habis tanpa peringatan',
                        'body' => 'Tidak ada perhitungan kebutuhan otomatis dari rencana produksi, sehingga pembelian selalu bersifat mendadak.',
                    ],
                    [
                        'icon' => 'bi-clipboard-x',
                        'title' => 'Hasil produksi dan stok tidak cocok',
                        'body' => 'Barang jadi masuk gudang tanpa dokumen yang rapi, sehingga selisih baru terlihat saat opname.',
                    ],
                ],
                'phases' => [
                    [
                        'title' => 'WMS untuk bahan baku &amp; barang jadi',
                        'body' => 'Mulai dari gudang karena di sinilah selisih paling mahal dan paling cepat terlihat hasilnya.',
                        'result' => 'Akurasi stok naik dalam 2–3 bulan',
                    ],
                    [
                        'title' => 'ERP: purchasing &amp; persediaan',
                        'body' => 'Pembelian bahan baku terhubung ke rencana produksi, dengan persetujuan berjenjang sesuai nilai.',
                        'result' => 'Pembelian berhenti bersifat mendadak',
                    ],
                    [
                        'title' => 'Modul produksi',
                        'body' => 'Bill of material, perintah kerja, pencatatan hasil dan sisa, serta perhitungan biaya per batch.',
                        'result' => 'Harga pokok diketahui saat batch selesai',
                    ],
                    [
                        'title' => 'Accounting &amp; Finance',
                        'body' => 'Jurnal terbentuk otomatis dari transaksi produksi dan pembelian, bukan diketik ulang tim finance.',
                        'result' => 'Closing bulanan turun ke 3–5 hari',
                    ],
                ],
                'case' => [
                    'title' => 'Closing bulanan dari 12 hari jadi 3',
                    'before' => 'Sebuah pabrik komponen dengan dua lini produksi merekap pemakaian bahan dari lembar kerja fisik. Tim finance butuh dua minggu setiap bulan hanya untuk menyusun laporan yang bisa dipercaya.',
                    'after' => 'Setelah perintah kerja dan pemakaian bahan dicatat langsung di lini, jurnal terbentuk seiring produksi berjalan. Audit tahun berikutnya selesai tanpa temuan material.',
                    'metrics' => [
                        [
                            'value' => '3 hari',
                            'label' => 'Waktu closing',
                            'body' => 'dari 12 hari',
                        ],
                        [
                            'value' => '0',
                            'label' => 'Temuan material',
                            'body' => 'audit terakhir',
                        ],
                        [
                            'value' => '99,1%',
                            'label' => 'Akurasi stok',
                            'body' => 'bahan &amp; barang jadi',
                        ],
                        [
                            'value' => '2 lini',
                            'label' => 'Cakupan',
                            'body' => 'produksi terpantau',
                        ],
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Sistem ini bisa menghitung harga pokok produksi per batch?',
                        'answer' => 'Bisa. Biaya bahan diambil dari pemakaian aktual yang tercatat pada perintah kerja, ditambah komponen biaya tenaga kerja dan overhead yang metodenya kami sepakati bersama tim akuntansi Anda di tahap discovery.',
                    ],
                    [
                        'question' => 'Bagaimana dengan produksi yang berbasis pesanan, bukan stok?',
                        'answer' => 'Justru lebih cocok. Perintah kerja bisa ditautkan langsung ke sales order tertentu, sehingga biaya dan margin per pesanan bisa dilihat, bukan hanya rata-rata per periode.',
                    ],
                    [
                        'question' => 'Apakah bisa terhubung ke mesin produksi?',
                        'answer' => 'Bergantung mesinnya. Untuk mesin yang menyediakan keluaran data digital, kami bisa membaca hasil produksi secara otomatis. Untuk mesin lama, pencatatan tetap manual lewat tablet di lini — tetap jauh lebih cepat daripada lembar kertas.',
                    ],
                ],
            ],
            'distribusi' => [
                'name' => 'Distribusi &amp; Logistik',
                'icon' => 'bi-truck',
                'summary' => 'Multi-gudang, rute pengiriman, dan piutang pelanggan yang selalu mutakhir.',
                'complaint' => 'Stok berbeda antar gudang, pengiriman sulit dilacak, dan piutang pelanggan baru ketahuan saat jatuh tempo.',
                'modules' => ['WMS', 'ERP', 'CRM'],
                'title' => 'Sistem Distribusi Multi-Gudang & Logistik | Arsytech',
                'description' => 'Sistem untuk distributor: WMS multi-gudang, sales order, surat jalan, batas kredit pelanggan, dan pelacakan pengiriman. Akurasi stok 99%+.',
                'heading' => 'Sistem untuk distributor yang gudangnya lebih dari satu',
                'lead' => 'Stok yang sama di mata semua cabang, pengiriman yang bisa dilacak, dan piutang pelanggan yang terlihat sebelum jatuh tempo — bukan sesudahnya.',
                'opening' => [
                    'title' => 'Tiga gudang, tiga versi kebenaran',
                    'paragraphs' => [
                        'Begitu gudang bertambah, masalahnya berubah sifat. Bukan lagi soal mencatat, tapi soal menyamakan: cabang mana yang punya stok, siapa yang boleh memindahkan, dan siapa yang bertanggung jawab saat barang tidak ketemu.',
                        'Ditambah lagi, sales di lapangan menjanjikan barang yang ternyata sudah dialokasikan ke pesanan lain. Sistem yang kami bangun membuat ketersediaan terlihat sama oleh semua orang, pada saat yang sama.',
                    ],
                ],
                'pains' => [
                    [
                        'icon' => 'bi-boxes',
                        'title' => 'Stok berbeda antar gudang',
                        'body' => 'Tiap lokasi punya kartu stoknya sendiri, sehingga alokasi ke pelanggan sering berebut barang yang sama.',
                    ],
                    [
                        'icon' => 'bi-truck',
                        'title' => 'Pengiriman sulit dilacak',
                        'body' => 'Setelah surat jalan dicetak, status barang hanya diketahui lewat telepon ke sopir atau kepala gudang.',
                    ],
                    [
                        'icon' => 'bi-cash-stack',
                        'title' => 'Piutang baru ketahuan saat menunggak',
                        'body' => 'Batas kredit pelanggan tidak terpantau otomatis, sehingga pengiriman tetap jalan meski tagihan menumpuk.',
                    ],
                    [
                        'icon' => 'bi-arrow-repeat',
                        'title' => 'Retur menggantung tanpa dokumen',
                        'body' => 'Barang kembali dari pelanggan tanpa alur yang jelas, memunculkan selisih yang sulit ditelusuri.',
                    ],
                ],
                'phases' => [
                    [
                        'title' => 'WMS multi-gudang',
                        'body' => 'Satu catatan stok untuk semua lokasi, dengan transfer antar gudang yang punya dokumen dan persetujuan sendiri.',
                        'result' => 'Selisih antar cabang hilang',
                    ],
                    [
                        'title' => 'ERP: penjualan &amp; piutang',
                        'body' => 'Sales order, surat jalan, faktur, dan batas kredit pelanggan yang memblokir pengiriman secara otomatis.',
                        'result' => 'Piutang terpantau sebelum jatuh tempo',
                    ],
                    [
                        'title' => 'CRM untuk tim lapangan',
                        'body' => 'Sales melihat ketersediaan stok dan status tagihan pelanggan langsung dari HP saat kunjungan.',
                        'result' => 'Janji ke pelanggan berbasis data',
                    ],
                    [
                        'title' => 'Accounting &amp; Finance',
                        'body' => 'Rekonsiliasi penjualan, penerimaan, dan persediaan tanpa ekspor-impor antar aplikasi.',
                        'result' => 'Laporan siap diaudit',
                    ],
                ],
                'case' => [
                    'title' => 'Tiga gudang, satu catatan stok',
                    'before' => 'Distributor FMCG dengan tiga gudang dan sekitar 400 SKU menjalankan kartu stok terpisah di tiap lokasi. Stock opname bulanan butuh dua hari penuh dan operasional harus dihentikan.',
                    'after' => 'Dengan WMS berbasis barcode dan cycle counting per zona, opname berubah jadi rutinitas dua jam yang berjalan tanpa menutup gudang. Akurasi stok naik dari 87% ke 99,2%.',
                    'metrics' => [
                        [
                            'value' => '99,2%',
                            'label' => 'Akurasi stok',
                            'body' => 'dari 87%',
                        ],
                        [
                            'value' => '2 jam',
                            'label' => 'Opname bulanan',
                            'body' => 'dari 2 hari',
                        ],
                        [
                            'value' => '3',
                            'label' => 'Gudang',
                            'body' => 'satu basis data',
                        ],
                        [
                            'value' => '400+',
                            'label' => 'SKU',
                            'body' => 'terpantau realtime',
                        ],
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Sales kami sering di luar kantor. Bisa cek stok dari lapangan?',
                        'answer' => 'Bisa. Ketersediaan stok per gudang dapat dilihat dari HP, termasuk berapa yang sudah dialokasikan ke pesanan lain — sehingga sales tidak menjanjikan barang yang sebenarnya tidak tersedia.',
                    ],
                    [
                        'question' => 'Bisa membatasi pengiriman ke pelanggan yang menunggak?',
                        'answer' => 'Bisa. Batas kredit dan umur piutang dapat diatur per pelanggan, dengan aturan yang Anda tentukan: memberi peringatan saja, meminta persetujuan manajer, atau memblokir pengiriman sepenuhnya.',
                    ],
                    [
                        'question' => 'Kami juga berjualan lewat marketplace. Bisa disatukan?',
                        'answer' => 'Untuk marketplace yang menyediakan API, pesanan bisa ditarik otomatis ke dalam sistem sehingga stoknya ikut terpotong dari catatan yang sama. Cakupan integrasinya kami tentukan setelah memeriksa kanal mana saja yang Anda pakai.',
                    ],
                ],
            ],
            'retail' => [
                'name' => 'Retail &amp; FMCG',
                'icon' => 'bi-shop',
                'summary' => 'Stok per outlet, perputaran SKU, dan promosi yang bisa diukur dampaknya.',
                'complaint' => 'Outlet kehabisan barang laku sementara gudang penuh SKU yang tidak bergerak.',
                'modules' => ['WMS', 'ERP', 'CRM'],
                'title' => 'Sistem Retail & FMCG Multi-Outlet | Arsytech',
                'description' => 'Sistem retail dari Arsytech: stok per outlet, analisis perputaran SKU, pengukuran promosi, dan program loyalitas pelanggan.',
                'heading' => 'Sistem untuk retail yang ingin tahu SKU mana yang benar-benar laku',
                'lead' => 'Stok per outlet, perputaran barang, dan dampak promosi dalam angka — supaya rak terisi barang yang bergerak, bukan barang yang sekadar memenuhi gudang.',
                'opening' => [
                    'title' => 'Outlet kehabisan barang laku, gudang penuh barang diam',
                    'paragraphs' => [
                        'Ini keluhan paling khas di retail: SKU yang paling dicari justru kosong di outlet, sementara gudang pusat penuh barang yang tidak bergerak selama berbulan-bulan. Modal terkunci di tempat yang salah.',
                        'Penyebabnya biasanya bukan kelalaian, tapi ketiadaan angka. Tanpa data perputaran per SKU per outlet, pengisian ulang dilakukan berdasarkan perasaan — dan perasaan cenderung mengulang pola pembelian bulan lalu.',
                    ],
                ],
                'pains' => [
                    [
                        'icon' => 'bi-shop-window',
                        'title' => 'Stok per outlet tidak terpantau',
                        'body' => 'Pusat baru tahu outlet kehabisan barang ketika kepala toko menelepon, bukan dari sistem.',
                    ],
                    [
                        'icon' => 'bi-arrow-down-up',
                        'title' => 'Perputaran SKU tidak pernah dihitung',
                        'body' => 'Tidak ada daftar barang mati, sehingga modal terus terkunci di stok yang tidak bergerak.',
                    ],
                    [
                        'icon' => 'bi-tags',
                        'title' => 'Dampak promosi tidak terukur',
                        'body' => 'Diskon dijalankan, penjualan naik, tapi tidak ada yang tahu apakah marginnya masih sehat.',
                    ],
                    [
                        'icon' => 'bi-people',
                        'title' => 'Data pelanggan tidak terkumpul',
                        'body' => 'Transaksi tercatat, tapi tidak ada riwayat pembeli yang bisa dipakai untuk program loyalitas.',
                    ],
                ],
                'phases' => [
                    [
                        'title' => 'ERP: persediaan &amp; penjualan',
                        'body' => 'Satu katalog produk dan harga untuk semua outlet, dengan pencatatan penjualan yang seragam.',
                        'result' => 'Angka penjualan per outlet terbandingkan',
                    ],
                    [
                        'title' => 'WMS untuk gudang pusat',
                        'body' => 'Penerimaan, penempatan, dan distribusi ke outlet dengan dokumen dan jejak yang jelas.',
                        'result' => 'Distribusi ke outlet terlacak',
                    ],
                    [
                        'title' => 'Analitik perputaran &amp; pengisian ulang',
                        'body' => 'Laporan barang cepat dan lambat, saran pengisian ulang berdasarkan data, bukan perkiraan.',
                        'result' => 'Barang mati berkurang bertahap',
                    ],
                    [
                        'title' => 'CRM &amp; program loyalitas',
                        'body' => 'Riwayat pembelian pelanggan, segmentasi, dan pengukuran dampak promosi terhadap margin.',
                        'result' => 'Promosi bisa dinilai untung-ruginya',
                    ],
                ],
                'case' => [
                    'title' => 'Barang mati turun, rak yang laku tetap terisi',
                    'before' => 'Jaringan retail dengan beberapa outlet mengandalkan laporan penjualan mingguan berupa file Excel dari tiap toko. Pengisian ulang diputuskan pusat berdasarkan permintaan kepala toko.',
                    'after' => 'Setelah penjualan tercatat seragam dan perputaran per SKU per outlet terlihat, pengisian ulang beralih ke data. Modal yang terkunci di barang lambat turun signifikan dalam dua kuartal.',
                    'metrics' => [
                        [
                            'value' => 'Realtime',
                            'label' => 'Stok per outlet',
                            'body' => 'dari laporan mingguan',
                        ],
                        [
                            'value' => 'Per SKU',
                            'label' => 'Analisis perputaran',
                            'body' => 'cepat vs lambat',
                        ],
                        [
                            'value' => 'Terukur',
                            'label' => 'Dampak promosi',
                            'body' => 'termasuk margin',
                        ],
                        [
                            'value' => '1',
                            'label' => 'Katalog &amp; harga',
                            'body' => 'untuk semua outlet',
                        ],
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Kami sudah punya mesin kasir. Harus diganti?',
                        'answer' => 'Tidak harus. Kalau mesin kasir Anda bisa mengekspor data transaksi atau menyediakan API, kami tarik datanya ke sistem pusat. Penggantian hanya kami sarankan bila perangkat lama benar-benar tidak bisa dihubungkan.',
                    ],
                    [
                        'question' => 'Bisa menangani harga dan promosi berbeda per outlet?',
                        'answer' => 'Bisa. Daftar harga, diskon, dan periode promosi dapat diatur per outlet, per wilayah, atau per segmen pelanggan, termasuk aturan yang berlaku otomatis pada rentang tanggal tertentu.',
                    ],
                    [
                        'question' => 'Kami juga berjualan online. Stoknya bisa disatukan?',
                        'answer' => 'Bisa, dan justru ini yang paling sering diminta. Stok online dan offline ditarik dari catatan yang sama agar tidak terjadi penjualan atas barang yang sebenarnya sudah terjual di toko fisik.',
                    ],
                ],
            ],
            'pemerintahan' => [
                'name' => 'Pemerintahan &amp; NGO',
                'icon' => 'bi-bank',
                'summary' => 'Tata kelola anggaran, jejak audit, dan pelaporan yang siap diperiksa.',
                'complaint' => 'Pelaporan anggaran memakan waktu berminggu-minggu dan jejak persetujuan tersebar di banyak dokumen.',
                'modules' => ['ERP', 'HRIS', 'Accounting &amp; Finance'],
                'title' => 'Sistem Tata Kelola untuk Pemerintahan & NGO | Arsytech',
                'description' => 'Sistem untuk instansi dan lembaga nirlaba: tata kelola anggaran, persetujuan digital berjenjang, jejak audit lengkap, dan pelaporan siap diperiksa.',
                'heading' => 'Sistem untuk institusi yang setiap rupiahnya harus bisa dipertanggungjawabkan',
                'lead' => 'Tata kelola anggaran, jejak persetujuan yang lengkap, dan pelaporan yang siap diperiksa — tanpa tim administrasi harus menyusun ulang berkas setiap kali ada permintaan audit.',
                'opening' => [
                    'title' => 'Bukan soal kurang rapi, tapi soal tersebar',
                    'paragraphs' => [
                        'Di instansi dan lembaga nirlaba, dokumentasi biasanya justru sangat rapi. Masalahnya, kerapian itu tersebar: persetujuan di berkas fisik, realisasi anggaran di spreadsheet, bukti pendukung di folder terpisah.',
                        'Ketika pemeriksa meminta satu berkas, tim harus menyusun ulang dari tiga sumber berbeda. Sistem yang kami bangun menyimpan keputusan beserta buktinya di tempat yang sama, sejak keputusan itu dibuat.',
                    ],
                ],
                'pains' => [
                    [
                        'icon' => 'bi-file-earmark-break',
                        'title' => 'Bukti tersebar di banyak tempat',
                        'body' => 'Persetujuan, kuitansi, dan laporan disimpan terpisah, sehingga penelusuran satu transaksi butuh berjam-jam.',
                    ],
                    [
                        'icon' => 'bi-hourglass',
                        'title' => 'Pelaporan memakan waktu berminggu-minggu',
                        'body' => 'Realisasi anggaran direkap manual dari banyak unit kerja menjelang tenggat pelaporan.',
                    ],
                    [
                        'icon' => 'bi-person-x',
                        'title' => 'Proses berhenti saat pejabat berhalangan',
                        'body' => 'Tidak ada mekanisme pendelegasian yang tercatat, sehingga berkas menumpuk menunggu satu tanda tangan.',
                    ],
                    [
                        'icon' => 'bi-shield-exclamation',
                        'title' => 'Hak akses tidak terkontrol rapi',
                        'body' => 'Satu file dibagikan ke banyak orang tanpa catatan siapa mengubah apa dan kapan.',
                    ],
                ],
                'phases' => [
                    [
                        'title' => 'Tata kelola anggaran',
                        'body' => 'Pagu per unit kerja, pencatatan realisasi, dan peringatan otomatis saat mendekati batas.',
                        'result' => 'Realisasi terlihat setiap saat',
                    ],
                    [
                        'title' => 'Alur persetujuan digital',
                        'body' => 'Persetujuan berjenjang dengan pendelegasian tercatat, lengkap dengan lampiran bukti pendukung.',
                        'result' => 'Tidak ada berkas yang mandek tanpa jejak',
                    ],
                    [
                        'title' => 'HRIS kepegawaian',
                        'body' => 'Data pegawai, kehadiran, cuti, dan tunjangan yang selaras dengan ketentuan yang berlaku.',
                        'result' => 'Administrasi kepegawaian terpusat',
                    ],
                    [
                        'title' => 'Pelaporan &amp; arsip audit',
                        'body' => 'Laporan tersusun otomatis dari transaksi, dengan berkas pendukung yang tertaut di setiap angka.',
                        'result' => 'Permintaan audit dijawab dalam hitungan menit',
                    ],
                ],
                'case' => [
                    'title' => 'Dari berminggu-minggu jadi hitungan menit',
                    'before' => 'Sebuah lembaga dengan beberapa unit kerja menyusun laporan realisasi anggaran dengan mengumpulkan spreadsheet dari tiap unit, lalu menggabungkannya secara manual.',
                    'after' => 'Setelah pencatatan dilakukan di sumbernya dan bukti dilampirkan saat transaksi dibuat, laporan tersusun otomatis. Penelusuran satu angka sampai ke dokumen aslinya butuh beberapa klik.',
                    'metrics' => [
                        [
                            'value' => 'Otomatis',
                            'label' => 'Penyusunan laporan',
                            'body' => 'dari rekap manual',
                        ],
                        [
                            'value' => '100%',
                            'label' => 'Transaksi berjejak',
                            'body' => 'siapa, kapan, apa',
                        ],
                        [
                            'value' => 'Realtime',
                            'label' => 'Realisasi anggaran',
                            'body' => 'per unit kerja',
                        ],
                        [
                            'value' => 'Terlampir',
                            'label' => 'Bukti pendukung',
                            'body' => 'di setiap transaksi',
                        ],
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Apakah data kami harus disimpan di cloud?',
                        'answer' => 'Tidak harus. Banyak institusi memilih server sendiri (on-premise) karena ketentuan internal, dan sistem kami mendukung keduanya. Pilihan penempatan data sepenuhnya ada pada Anda.',
                    ],
                    [
                        'question' => 'Bagaimana sistem menangani pergantian pejabat?',
                        'answer' => 'Hak akses melekat pada peran, bukan pada orang. Saat terjadi pergantian atau pendelegasian sementara, kewenangan dipindahkan lewat pengaturan dan seluruh perpindahannya tercatat di log audit.',
                    ],
                    [
                        'question' => 'Bisa mengikuti format pelaporan yang sudah ditetapkan?',
                        'answer' => 'Bisa. Format keluaran laporan kami sesuaikan dengan ketentuan yang berlaku di lingkungan Anda. Format-format itu kami kumpulkan di tahap discovery agar tidak ada penyesuaian besar di akhir proyek.',
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
