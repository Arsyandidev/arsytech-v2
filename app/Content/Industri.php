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
                'complaint' => 'Biaya produksi baru benar-benar kelihatan setelah bulan ditutup, sementara jadwal produksi masih dicatat di papan tulis',
                'modules' => ['ERP', 'WMS', 'Accounting &amp; Finance'],
                'title' => 'Sistem ERP & Produksi untuk Manufaktur | Arsytech',
                'description' => 'Sistem manufaktur dari Arsytech untuk bill of material, perintah kerja, biaya per batch, dan persediaan bahan baku. Closing bulanan turun jadi 3 hari.',
                'heading' => 'Sistem untuk pabrik yang ingin tahu biaya produksinya hari ini',
                'lead' => 'Bahan baku, perintah kerja, hasil produksi, dan biaya per batch dikelola di satu sistem, jadi harga pokok sudah bisa dilihat tanpa menunggu bulan ditutup.',
                'opening' => [
                    'title' => 'Biaya produksi yang selalu terlambat diketahui',
                    'paragraphs' => [
                        'Biaya produksi baru dapat dihitung setelah nota terkumpul dan stock opname selesai. Proses ini bisa memakan waktu hingga beberapa minggu setelah barang diproduksi, sehingga keputusan harga dan evaluasi produksi sering kali masih menggunakan data periode sebelumnya',
                        'Kami membangun pencatatan yang terhubung dari awal hingga akhir. Pemakaian bahan dicatat saat proses produksi berjalan, hasil produksi dicatat di lini, dan biaya terbentuk mengikuti transaksi yang terjadi',
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
                        'title' => 'WMS untuk Bahan Baku & Barang Jadi',
                        'body' => 'Memulai dari gudang untuk memastikan pergerakan bahan dan hasil produksi tercatat dengan baik sejak awal',
                        'result' => 'Akurasi stok naik dalam 2–3 bulan',
                    ],
                    [
                        'title' => 'ERP: Purchasing & Persediaan',
                        'body' => 'Menghubungkan kebutuhan bahan baku, proses pembelian, penerimaan, dan persediaan dalam satu alur dengan persetujuan sesuai kewenangan',
                        'result' => 'Pembelian tidak lagi serba mendadak',
                    ],
                    [
                        'title' => 'Modul Produksi',
                        'body' => 'Bill of material, perintah kerja, pemakaian bahan, hasil produksi, sisa produksi, hingga perhitungan biaya per batch',
                        'result' => 'Harga pokok diketahui saat batch selesai',
                    ],
                    [
                        'title' => 'Accounting & Finance',
                        'body' => 'Transaksi pembelian dan produksi diteruskan ke pencatatan keuangan sehingga tim finance tidak perlu melakukan input yang sama berulang kali',
                        'result' => 'Closing bulanan turun ke 3–5 hari',
                    ],
                ],
                'case' => [
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
                'complaint' => 'Stok berbeda antar gudang, pengiriman sulit dilacak, dan piutang baru terlihat ketika sudah jatuh tempo.',
                'modules' => ['WMS', 'ERP', 'CRM'],
                'title' => 'Sistem Distribusi Multi-Gudang & Logistik | Arsytech',
                'description' => 'Sistem untuk distributor: WMS multi-gudang, sales order, surat jalan, batas kredit pelanggan, dan pelacakan pengiriman, dengan akurasi stok 99%+.',
                'heading' => 'Sistem untuk distributor yang gudangnya lebih dari satu',
                'lead' => 'Semua cabang melihat angka stok yang sama, pengiriman bisa dilacak, dan piutang pelanggan sudah kelihatan sebelum jatuh tempo.',
                'opening' => [
                    'title' => 'Saat gudang tidak lagi satu',
                    'paragraphs' => [
                        'Ketika gudang bertambah, pencatatan dan pengendalian stok ikut menjadi lebih kompleks. Manajemen perlu mengetahui stok berada di lokasi mana, siapa yang dapat memindahkan barang, dan bagaimana setiap perpindahan dapat ditelusuri',
                        'Di sisi lain, sales di lapangan bisa saja menawarkan barang yang ternyata sudah dialokasikan untuk pesanan lain. Sistem yang terintegrasi membuat tim bekerja dengan informasi stok yang sama, tanpa harus menunggu rekap dari masing-masing gudang',
                    ],
                ],
                'pains' => [
                    [
                        'icon' => 'bi-boxes',
                        'title' => 'Stok berbeda antar gudang',
                        'body' => 'Setiap lokasi memiliki pencatatan sendiri, sehingga alokasi barang antar pesanan dan antar gudang mudah menimbulkan selisih',
                    ],
                    [
                        'icon' => 'bi-truck',
                        'title' => 'Pengiriman sulit dilacak',
                        'body' => 'Setelah surat jalan diterbitkan, status pengiriman masih harus ditanyakan melalui telepon atau pesan kepada sopir dan kepala gudang',
                    ],
                    [
                        'icon' => 'bi-cash-stack',
                        'title' => 'Piutang Baru Terlihat Saat Menunggak',
                        'body' => 'Batas kredit dan tagihan pelanggan tidak selalu terpantau saat pesanan dibuat, sehingga pengiriman dapat terus berjalan ketika piutang sudah menumpuk',
                    ],
                    [
                        'icon' => 'bi-arrow-repeat',
                        'title' => 'Retur Tanpa Alur yang Jelas',
                        'body' => 'Barang kembali dari pelanggan tanpa dokumen dan proses yang terstruktur, sehingga penyebab retur dan perubahan stok sulit ditelusuri',
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
                'complaint' => 'Barang yang dicari pelanggan sering kosong, sementara stok yang lambat terjual terus menumpuk',
                'modules' => ['WMS', 'ERP', 'CRM'],
                'title' => 'Sistem Retail & FMCG Multi-Outlet | Arsytech',
                'description' => 'Sistem retail dari Arsytech untuk stok per outlet, analisis perputaran SKU, pengukuran dampak promosi, dan program loyalitas pelanggan.',
                'heading' => 'Sistem untuk retail yang ingin tahu SKU mana yang benar-benar laku',
                'lead' => 'Stok per outlet, perputaran barang, dan dampak promosi bisa dilihat dalam angka, supaya rak diisi barang yang memang laku dan modal tidak menumpuk di gudang.',
                'opening' => [
                    'title' => 'Outlet kehabisan barang laku, gudang penuh barang diam',
                    'paragraphs' => [
                        'Ini merupakan salah satu tantangan yang sering muncul ketika bisnis retail mulai memiliki banyak outlet. Produk yang paling dicari bisa habis di satu lokasi, sementara gudang pusat masih menyimpan barang yang tidak bergerak selama berbulan-bulan',
                        'Tanpa data perputaran barang per SKU dan per outlet, pengisian ulang sering dilakukan berdasarkan perkiraan. Akibatnya, pola pembelian lama terus berulang tanpa benar-benar melihat kebutuhan di setiap lokasi',
                    ],
                ],
                'pains' => [
                    [
                        'icon' => 'bi-shop-window',
                        'title' => 'Stok per outlet tidak terpantau',
                        'body' => 'Pusat baru mengetahui suatu produk habis setelah mendapat laporan dari kepala toko, sehingga pengisian ulang sering terlambat',
                    ],
                    [
                        'icon' => 'bi-arrow-down-up',
                        'title' => 'Perputaran SKU Tidak Terukur',
                        'body' => 'Tidak ada gambaran yang jelas mengenai barang yang cepat terjual, lambat bergerak, atau sudah tidak memiliki permintaan. Akibatnya, modal terus tertahan dalam persediaan',
                    ],
                    [
                        'icon' => 'bi-tags',
                        'title' => 'Dampak Promosi Sulit Diukur',
                        'body' => 'Penjualan meningkat setelah program diskon, tetapi dampaknya terhadap margin dan perputaran stok tidak selalu terlihat dengan jelas',
                    ],
                    [
                        'icon' => 'bi-people',
                        'title' => 'Data Pelanggan Tidak Terkumpul',
                        'body' => 'Transaksi tercatat sebagai penjualan, tetapi riwayat pembelian pelanggan tidak terkumpul menjadi data yang dapat digunakan untuk program loyalitas dan penawaran berikutnya',
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
                'complaint' => 'Pelaporan anggaran memakan waktu berminggu-minggu, sementara jejak persetujuan tersebar di banyak dokumen',
                'modules' => ['ERP', 'HRIS', 'Accounting &amp; Finance'],
                'title' => 'Sistem Tata Kelola untuk Pemerintahan & NGO | Arsytech',
                'description' => 'Sistem untuk instansi dan lembaga nirlaba: tata kelola anggaran, persetujuan digital berjenjang, jejak audit lengkap, dan laporan yang siap diperiksa.',
                'heading' => 'Sistem untuk institusi yang setiap rupiahnya harus bisa dipertanggungjawabkan',
                'lead' => 'Anggaran, jejak persetujuan, dan pelaporan tersimpan rapi di satu sistem, jadi tim administrasi tidak perlu menyusun ulang berkas setiap kali ada permintaan audit.',
                'opening' => [
                    'title' => 'Tantangan Tata Kelola di Pemerintahan & NGO',
                    'paragraphs' => [
                        'Di instansi dan lembaga nirlaba, dokumentasi biasanya sudah menjadi bagian penting dari setiap proses. Tantangannya adalah informasi tersebut sering tersimpan di tempat yang berbeda: persetujuan di dokumen fisik, realisasi anggaran di spreadsheet, dan bukti pendukung di folder terpisah',
                        'Ketika pemeriksa membutuhkan satu rangkaian dokumen, tim harus kembali mengumpulkan informasi dari berbagai sumber. Sistem yang kami bangun menghubungkan proses, keputusan, dan dokumen pendukung dalam satu alur yang mudah ditelusuri',
                    ],
                ],
                'pains' => [
                    [
                        'icon' => 'bi-file-earmark-break',
                        'title' => 'Bukti Tersebar di Banyak Tempat',
                        'body' => 'Persetujuan, kuitansi, dan dokumen pendukung tersimpan terpisah, sehingga penelusuran satu transaksi dapat memakan waktu cukup lama',
                    ],
                    [
                        'icon' => 'bi-hourglass',
                        'title' => 'Pelaporan Memakan Waktu Berminggu-minggu',
                        'body' => 'Realisasi anggaran masih direkap secara manual dari berbagai unit kerja sebelum laporan disusun dan dikirimkan.',
                    ],
                    [
                        'icon' => 'bi-person-x',
                        'title' => 'Pendelegasian Tidak Tercatat',
                        'body' => 'Ketika persetujuan masih bergantung pada satu orang, pekerjaan dapat tertahan saat pejabat yang berwenang sedang tidak tersedia. Sistem dapat mencatat pendelegasian dan meneruskan proses sesuai kewenangan yang ditetapkan',
                    ],
                    [
                        'icon' => 'bi-shield-exclamation',
                        'title' => 'Hak Akses Perlu Dikendalikan',
                        'body' => 'Dokumen yang sama dapat beredar ke banyak pihak tanpa pencatatan yang jelas mengenai siapa yang mengakses atau melakukan perubahan. Hak akses berbasis peran dan audit trail membantu menjaga kontrol atas informasi dan aktivitas pengguna',
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
