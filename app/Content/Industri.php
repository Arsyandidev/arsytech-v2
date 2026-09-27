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
                'description' => 'Sistem manufaktur dari Arsytech untuk bill of material, perintah kerja, biaya per batch, dan persediaan bahan baku. Closing bulanan turun jadi 3 hari.',
                'heading' => 'Sistem untuk pabrik yang ingin tahu biaya produksinya hari ini',
                'lead' => 'Bahan baku, perintah kerja, hasil produksi, dan biaya per batch dikelola di satu sistem, jadi harga pokok sudah bisa dilihat tanpa menunggu bulan ditutup.',
                'opening' => [
                    'title' => 'Biaya produksi yang selalu terlambat diketahui',
                    'paragraphs' => [
                        'Di banyak pabrik, harga pokok produksi baru bisa dihitung setelah semua nota terkumpul dan stock opname selesai, biasanya dua sampai tiga minggu setelah barangnya jadi. Akibatnya, harga jual terpaksa diputuskan dengan data bulan lalu.',
                        'Yang kami bangun adalah pencatatan yang nyambung dari awal sampai akhir. Pemakaian bahan dicatat saat perintah kerja berjalan, hasil produksi dicatat di lini, dan biayanya terbentuk seiring proses.',
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
                        'body' => 'Pembagian kerja mesin diatur lewat papan tulis dan grup chat. Kalau satu order berubah, seluruh urutan ikut berantakan.',
                    ],
                    [
                        'icon' => 'bi-box2',
                        'title' => 'Bahan baku habis tanpa peringatan',
                        'body' => 'Kebutuhan bahan tidak dihitung otomatis dari rencana produksi, jadi pembelian hampir selalu dilakukan mendadak.',
                    ],
                    [
                        'icon' => 'bi-clipboard-x',
                        'title' => 'Hasil produksi dan stok tidak cocok',
                        'body' => 'Barang jadi masuk gudang tanpa dokumen yang rapi, jadi selisihnya baru kelihatan saat opname.',
                    ],
                ],
                'phases' => [
                    [
                        'title' => 'WMS untuk bahan baku &amp; barang jadi',
                        'body' => 'Kami mulai dari gudang, karena selisih di sini paling mahal dan hasil perbaikannya paling cepat terlihat.',
                        'result' => 'Akurasi stok naik dalam 2–3 bulan',
                    ],
                    [
                        'title' => 'ERP: purchasing &amp; persediaan',
                        'body' => 'Pembelian bahan baku terhubung ke rencana produksi, dengan persetujuan berjenjang sesuai nilai.',
                        'result' => 'Pembelian tidak lagi serba mendadak',
                    ],
                    [
                        'title' => 'Modul produksi',
                        'body' => 'Bill of material, perintah kerja, pencatatan hasil dan sisa, serta perhitungan biaya per batch.',
                        'result' => 'Harga pokok diketahui saat batch selesai',
                    ],
                    [
                        'title' => 'Accounting &amp; Finance',
                        'body' => 'Jurnal terbentuk otomatis dari transaksi produksi dan pembelian, jadi tim finance tidak perlu mengetik ulang.',
                        'result' => 'Closing bulanan turun ke 3–5 hari',
                    ],
                ],
                'case' => [
                    'title' => 'Closing bulanan dari 12 hari jadi 3',
                    'before' => 'Sebuah pabrik komponen dengan dua lini produksi merekap pemakaian bahan dari lembar kerja fisik. Tiap bulan, tim finance butuh dua minggu hanya untuk menyusun laporan yang bisa dipercaya.',
                    'after' => 'Setelah perintah kerja dan pemakaian bahan dicatat langsung di lini, jurnal ikut terbentuk selama produksi berjalan. Audit tahun berikutnya selesai tanpa temuan material.',
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
                        'answer' => 'Bisa. Biaya bahan diambil dari pemakaian aktual yang tercatat di perintah kerja. Biaya tenaga kerja dan overhead ditambahkan dengan metode yang kami sepakati bersama tim akuntansi Anda saat discovery.',
                    ],
                    [
                        'question' => 'Kalau produksi kami berdasarkan pesanan, bukan untuk stok?',
                        'answer' => 'Malah lebih cocok. Perintah kerja bisa dikaitkan langsung ke sales order tertentu, jadi biaya dan margin tiap pesanan bisa dilihat satu per satu, tidak hanya rata-rata per periode.',
                    ],
                    [
                        'question' => 'Apakah bisa terhubung ke mesin produksi?',
                        'answer' => 'Tergantung mesinnya. Kalau mesinnya bisa mengeluarkan data digital, hasil produksi bisa kami baca otomatis. Untuk mesin lama, pencatatan tetap manual lewat tablet di lini, dan itu pun sudah jauh lebih cepat daripada lembar kertas.',
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
                'description' => 'Sistem untuk distributor: WMS multi-gudang, sales order, surat jalan, batas kredit pelanggan, dan pelacakan pengiriman, dengan akurasi stok 99%+.',
                'heading' => 'Sistem untuk distributor yang gudangnya lebih dari satu',
                'lead' => 'Semua cabang melihat angka stok yang sama, pengiriman bisa dilacak, dan piutang pelanggan sudah kelihatan sebelum jatuh tempo.',
                'opening' => [
                    'title' => 'Saat gudang tidak lagi satu',
                    'paragraphs' => [
                        'Begitu gudang bertambah, masalahnya ikut berubah. Sekarang semua catatan harus disamakan: cabang mana yang punya stok, siapa yang boleh memindahkan barang, dan siapa yang bertanggung jawab kalau barang tidak ketemu.',
                        'Belum lagi sales di lapangan yang menjanjikan barang yang ternyata sudah dialokasikan ke pesanan lain. Sistem yang kami bangun membuat semua orang melihat ketersediaan stok yang sama pada waktu yang sama.',
                    ],
                ],
                'pains' => [
                    [
                        'icon' => 'bi-boxes',
                        'title' => 'Stok berbeda antar gudang',
                        'body' => 'Tiap lokasi punya kartu stok sendiri, jadi alokasi ke pelanggan sering berebut barang yang sama.',
                    ],
                    [
                        'icon' => 'bi-truck',
                        'title' => 'Pengiriman sulit dilacak',
                        'body' => 'Setelah surat jalan dicetak, posisi barang hanya bisa dicek dengan menelepon sopir atau kepala gudang.',
                    ],
                    [
                        'icon' => 'bi-cash-stack',
                        'title' => 'Piutang baru ketahuan saat menunggak',
                        'body' => 'Batas kredit pelanggan tidak terpantau otomatis, jadi pengiriman tetap jalan walaupun tagihan sudah menumpuk.',
                    ],
                    [
                        'icon' => 'bi-arrow-repeat',
                        'title' => 'Retur menggantung tanpa dokumen',
                        'body' => 'Barang kembali dari pelanggan tanpa alur yang jelas, lalu muncul selisih yang sulit ditelusuri.',
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
                        'body' => 'Sales order, surat jalan, faktur, dan batas kredit pelanggan yang otomatis menahan pengiriman bila terlampaui.',
                        'result' => 'Piutang terpantau sebelum jatuh tempo',
                    ],
                    [
                        'title' => 'CRM untuk tim lapangan',
                        'body' => 'Sales melihat ketersediaan stok dan status tagihan pelanggan langsung dari HP saat kunjungan.',
                        'result' => 'Janji ke pelanggan sesuai stok',
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
                    'after' => 'Dengan WMS berbasis barcode dan cycle counting per zona, opname cukup dua jam dan gudang tetap buka. Akurasi stok naik dari 87% ke 99,2%.',
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
                        'answer' => 'Bisa. Stok per gudang bisa dicek dari HP, termasuk berapa yang sudah dialokasikan ke pesanan lain. Jadi sales tidak menjanjikan barang yang sebenarnya sudah tidak tersedia.',
                    ],
                    [
                        'question' => 'Bisa membatasi pengiriman ke pelanggan yang menunggak?',
                        'answer' => 'Bisa. Batas kredit dan umur piutang diatur per pelanggan, dan aturannya Anda yang tentukan: cukup memberi peringatan, minta persetujuan manajer dulu, atau langsung memblokir pengiriman.',
                    ],
                    [
                        'question' => 'Kami juga berjualan lewat marketplace. Bisa disatukan?',
                        'answer' => 'Untuk marketplace yang menyediakan API, pesanan bisa ditarik otomatis ke sistem, jadi stoknya ikut terpotong dari catatan yang sama. Seberapa jauh integrasinya, kami tentukan setelah melihat kanal apa saja yang Anda pakai.',
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
                'description' => 'Sistem retail dari Arsytech untuk stok per outlet, analisis perputaran SKU, pengukuran dampak promosi, dan program loyalitas pelanggan.',
                'heading' => 'Sistem untuk retail yang ingin tahu SKU mana yang benar-benar laku',
                'lead' => 'Stok per outlet, perputaran barang, dan dampak promosi bisa dilihat dalam angka, supaya rak diisi barang yang memang laku dan modal tidak menumpuk di gudang.',
                'opening' => [
                    'title' => 'Outlet kehabisan barang laku, gudang penuh barang diam',
                    'paragraphs' => [
                        'Ini keluhan yang sangat umum di retail. SKU yang paling dicari justru kosong di outlet, sementara gudang pusat penuh barang yang tidak bergerak berbulan-bulan. Akibatnya modal tertahan di barang yang salah.',
                        'Penyebabnya biasanya sederhana: angkanya tidak ada. Tanpa data perputaran per SKU per outlet, pengisian ulang dilakukan berdasarkan perkiraan, dan perkiraan cenderung mengulang pola pembelian bulan lalu.',
                    ],
                ],
                'pains' => [
                    [
                        'icon' => 'bi-shop-window',
                        'title' => 'Stok per outlet tidak terpantau',
                        'body' => 'Pusat baru tahu outlet kehabisan barang setelah kepala toko menelepon.',
                    ],
                    [
                        'icon' => 'bi-arrow-down-up',
                        'title' => 'Perputaran SKU tidak pernah dihitung',
                        'body' => 'Tidak ada daftar barang mati, jadi modal terus tertahan di stok yang tidak bergerak.',
                    ],
                    [
                        'icon' => 'bi-tags',
                        'title' => 'Dampak promosi tidak terukur',
                        'body' => 'Diskon dijalankan dan penjualan naik, tapi tidak ada yang tahu apakah marginnya masih sehat.',
                    ],
                    [
                        'icon' => 'bi-people',
                        'title' => 'Data pelanggan tidak terkumpul',
                        'body' => 'Transaksi tercatat, tapi riwayat pembelinya tidak tersimpan, jadi sulit dipakai untuk program loyalitas.',
                    ],
                ],
                'phases' => [
                    [
                        'title' => 'ERP: persediaan &amp; penjualan',
                        'body' => 'Satu katalog produk dan harga untuk semua outlet, dengan pencatatan penjualan yang seragam.',
                        'result' => 'Penjualan antar outlet bisa dibandingkan',
                    ],
                    [
                        'title' => 'WMS untuk gudang pusat',
                        'body' => 'Penerimaan, penempatan, dan distribusi ke outlet dengan dokumen dan jejak yang jelas.',
                        'result' => 'Distribusi ke outlet terlacak',
                    ],
                    [
                        'title' => 'Analitik perputaran &amp; pengisian ulang',
                        'body' => 'Laporan barang cepat dan lambat laku, plus saran pengisian ulang yang dihitung dari data.',
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
                    'after' => 'Setelah penjualan tercatat seragam dan perputaran per SKU per outlet bisa dilihat, pengisian ulang mulai diputuskan dari data. Dalam dua kuartal, modal yang tertahan di barang lambat turun signifikan.',
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
                        'answer' => 'Tidak harus. Kalau mesin kasir Anda bisa mengekspor data transaksi atau punya API, datanya kami tarik ke sistem pusat. Kami baru menyarankan ganti perangkat kalau yang lama memang tidak bisa dihubungkan sama sekali.',
                    ],
                    [
                        'question' => 'Bisa menangani harga dan promosi berbeda per outlet?',
                        'answer' => 'Bisa. Daftar harga, diskon, dan periode promosi bisa diatur per outlet, per wilayah, atau per segmen pelanggan, termasuk promo yang otomatis berlaku di rentang tanggal tertentu.',
                    ],
                    [
                        'question' => 'Kami juga berjualan online. Stoknya bisa disatukan?',
                        'answer' => 'Bisa, dan ini memang yang paling sering diminta. Stok online dan offline diambil dari catatan yang sama, jadi barang yang sudah terjual di toko tidak ikut terjual lagi secara online.',
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
                'description' => 'Sistem untuk instansi dan lembaga nirlaba: tata kelola anggaran, persetujuan digital berjenjang, jejak audit lengkap, dan laporan yang siap diperiksa.',
                'heading' => 'Sistem untuk institusi yang setiap rupiahnya harus bisa dipertanggungjawabkan',
                'lead' => 'Anggaran, jejak persetujuan, dan pelaporan tersimpan rapi di satu sistem, jadi tim administrasi tidak perlu menyusun ulang berkas setiap kali ada permintaan audit.',
                'opening' => [
                    'title' => 'Dokumennya rapi, tapi tersebar',
                    'paragraphs' => [
                        'Di instansi dan lembaga nirlaba, dokumentasinya biasanya sudah sangat rapi. Kendalanya ada di letaknya: persetujuan di berkas fisik, realisasi anggaran di spreadsheet, dan bukti pendukung di folder lain.',
                        'Saat pemeriksa meminta satu berkas, tim harus menyusunnya ulang dari tiga sumber. Sistem yang kami bangun menyimpan setiap keputusan bersama buktinya di tempat yang sama, sejak keputusan itu dibuat.',
                    ],
                ],
                'pains' => [
                    [
                        'icon' => 'bi-file-earmark-break',
                        'title' => 'Bukti tersebar di banyak tempat',
                        'body' => 'Persetujuan, kuitansi, dan laporan disimpan terpisah, jadi menelusuri satu transaksi bisa makan waktu berjam-jam.',
                    ],
                    [
                        'icon' => 'bi-hourglass',
                        'title' => 'Pelaporan memakan waktu berminggu-minggu',
                        'body' => 'Realisasi anggaran direkap manual dari banyak unit kerja menjelang tenggat pelaporan.',
                    ],
                    [
                        'icon' => 'bi-person-x',
                        'title' => 'Proses berhenti saat pejabat berhalangan',
                        'body' => 'Pendelegasian tidak tercatat di sistem, jadi berkas menumpuk menunggu satu tanda tangan.',
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
                        'result' => 'Posisi setiap berkas selalu jelas',
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
                    'after' => 'Setelah transaksi dicatat langsung di sumbernya dan buktinya dilampirkan saat itu juga, laporan tersusun otomatis. Menelusuri satu angka sampai ke dokumen aslinya cukup beberapa klik.',
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
                        'answer' => 'Tidak harus. Banyak institusi memilih server sendiri (on-premise) karena aturan internal, dan sistem kami bisa dipasang di keduanya. Di mana data disimpan, sepenuhnya Anda yang memutuskan.',
                    ],
                    [
                        'question' => 'Bagaimana sistem menangani pergantian pejabat?',
                        'answer' => 'Hak akses melekat pada peran, bukan pada orangnya. Kalau ada pergantian pejabat atau delegasi sementara, kewenangannya cukup dipindahkan lewat pengaturan, dan setiap perpindahan tercatat di log audit.',
                    ],
                    [
                        'question' => 'Bisa mengikuti format pelaporan yang sudah ditetapkan?',
                        'answer' => 'Bisa. Format laporan kami sesuaikan dengan ketentuan yang berlaku di instansi Anda. Contoh formatnya kami kumpulkan sejak tahap discovery, supaya tidak ada penyesuaian besar menjelang akhir proyek.',
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
