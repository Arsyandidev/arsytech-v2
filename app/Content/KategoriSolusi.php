<?php

namespace App\Content;

class KategoriSolusi
{
    public static function all(): array
    {
        return [
            'business-operation-system' => [
                'name' => 'Business Operation System',
                'apps_label' => 'HRIS, WMS, CRM, AMS, laporan',
                'icon' => 'bi-briefcase-fill',
                'summary' => 'Aplikasi untuk urusan harian perusahaan: karyawan, gudang, penjualan, dan keuangan. Bisa dipakai sendiri, dan paling terasa manfaatnya kalau datanya mengalir ke ERP.',
                'title' => 'Business Operation System: HRIS, WMS, CRM & Akuntansi | Arsytech',
                'description' => 'Aplikasi operasional dari Arsytech: HRIS, WMS, CRM, sistem akuntansi, serta aplikasi analisis dan laporan. Bisa dipakai terpisah atau dihubungkan ke ERP.',
                'heading' => 'Aplikasi untuk Operasional Sehari-hari',
                'lead' => 'Mulai dari kepegawaian, gudang, penjualan, hingga akuntansi dan pelaporan. Setiap aplikasi dapat digunakan secara mandiri atau diintegrasikan dengan ERP agar data tidak perlu dicatat berulang',
                'intro' => [
                    'title' => 'Tidak harus membangun semuanya sekaligus',
                    'paragraphs' => [
                        'Kami dapat memulai dari bagian yang paling banyak menyita waktu atau paling sering menimbulkan masalah. Misalnya, HR yang masih merekap absensi secara manual atau gudang yang sering menemukan selisih antara stok fisik dan catatan di sistem',
                        'Setelah aplikasi berjalan dan digunakan secara rutin, sistem berikutnya dapat dikembangkan dan dihubungkan menggunakan data yang sama',
                    ],
                ],
                'apps' => [
                    [
                        'name' => 'Human Resource Information System',
                        'short' => 'HRIS',
                        'icon' => 'bi-people-fill',
                        'body' => 'Absensi, cuti, lembur, dan payroll dalam satu alur. Karyawan bisa melihat slip gaji dan mengajukan cuti sendiri lewat portal.',
                        'features' => ['Absensi, shift, cuti, dan lembur', 'Payroll, PPh 21, dan BPJS', 'Portal mandiri karyawan'],
                        'detail' => 'hris',
                    ],
                    [
                        'name' => 'Warehouse Management System',
                        'short' => 'WMS',
                        'icon' => 'bi-box-seam-fill',
                        'body' => 'Barang masuk, pindah rak, dan keluar tercatat lewat scan barcode, jadi stok di sistem sama dengan stok di rak.',
                        'features' => ['Penerimaan, putaway, picking, packing', 'Barcode &amp; QR scanning', 'Stock opname tanpa menutup gudang'],
                        'detail' => 'wms',
                    ],
                    [
                        'name' => 'Customer Relationship Management',
                        'short' => 'CRM',
                        'icon' => 'bi-graph-up-arrow',
                        'body' => 'Prospek, penawaran, dan tindak lanjut sales tercatat di satu tempat, jadi pipeline bisa dipantau manajemen kapan saja.',
                        'features' => ['Lead, deal, dan aktivitas sales', 'Target &amp; forecast per tim', 'Riwayat interaksi pelanggan'],
                        'detail' => 'crm',
                    ],
                    [
                        'name' => 'Accounting Management System',
                        'short' => 'AMS',
                        'icon' => 'bi-calculator-fill',
                        'body' => 'Jurnal terbentuk otomatis dari transaksi operasional, jadi tim finance tidak perlu mengetik ulang dan laporan lebih cepat siap.',
                        'features' => ['AR/AP, aset tetap, rekonsiliasi bank', 'Laporan keuangan &amp; ekspor pajak', 'Anggaran vs realisasi'],
                        'detail' => null,
                    ],
                    [
                        'name' => 'Analysis &amp; Reporting Applications',
                        'short' => 'Analitik &amp; Laporan',
                        'icon' => 'bi-bar-chart-line-fill',
                        'body' => 'Dashboard dan laporan yang mengambil data dari aplikasi lain, sehingga manajemen bisa melihat angka terbaru tanpa menunggu rekap manual.',
                        'features' => ['Dashboard per divisi dan per cabang', 'Laporan berkala untuk manajemen', 'Ekspor ke Excel dan PDF'],
                        'detail' => null,
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Apakah aplikasi ini bisa dipakai tanpa ERP?',
                        'answer' => 'Bisa. Setiap aplikasi bisa berjalan sendiri. Kalau nanti perusahaan memakai ERP, datanya tinggal dihubungkan sehingga tidak perlu diinput ulang.',
                    ],
                    [
                        'question' => 'Kami sudah punya software akuntansi. Apakah harus diganti?',
                        'answer' => 'Tidak harus. Kalau software yang sekarang bisa diakses lewat API atau ekspor data, HRIS, WMS, dan CRM bisa dihubungkan ke sana. Kemungkinannya kami periksa di tahap discovery.',
                    ],
                    [
                        'question' => 'Aplikasi mana yang sebaiknya dibuat lebih dulu?',
                        'answer' => 'Biasanya aplikasi untuk divisi yang paling banyak menghabiskan waktu di pekerjaan manual. Di sesi konsultasi, kami bantu menentukan urutannya sesuai kondisi perusahaan Anda.',
                    ],
                ],
            ],

            'advertisement-application' => [
                'name' => 'Advertisement Application',
                'apps_label' => 'Lead, loyalitas, analitik kampanye',
                'icon' => 'bi-megaphone-fill',
                'summary' => 'Aplikasi untuk tim marketing dan sales: mengumpulkan prospek dari berbagai kanal, menjaga pelanggan tetap kembali, dan melihat hasil kampanye iklan.',
                'title' => 'Advertisement Application: Lead, Loyalty & Analitik Kampanye | Arsytech',
                'description' => 'Aplikasi pemasaran dari Arsytech: manajemen lead omnichannel, program loyalitas pelanggan, dan dashboard analitik kampanye iklan digital.',
                'heading' => 'Satukan prospek, follow-up, dan hasil penjualan dalam satu sistem',
                'lead' => 'Prospek dari berbagai kanal masuk ke satu tempat, tim lebih mudah menindaklanjuti, dan hasil setiap aktivitas pemasaran dapat dipantau dengan lebih jelas',
                'intro' => [
                    'title' => 'Dari Prospek hingga Menjadi Pelanggan',
                    'paragraphs' => [
                        'Data prospek, aktivitas follow-up, status penawaran, hingga hasil penjualan tersimpan dalam satu alur. Dengan begitu, tim tidak hanya melihat berapa banyak prospek yang masuk, tetapi juga mengetahui apa yang terjadi setelahnya',
                        'Aplikasi dalam kelompok ini membantu mengumpulkan prospek ke satu sistem. Tim dapat melihat dari mana prospek berasal, siapa yang menanganinya, bagaimana perkembangannya, hingga berapa banyak yang akhirnya menjadi pelanggan    ',
                    ],
                ],
                'apps' => [
                    [
                        'name' => 'Omnichannel Sales &amp; Lead Management System',
                        'short' => 'Lead Management',
                        'icon' => 'bi-inboxes-fill',
                        'body' => 'Prospek dari WhatsApp, media sosial, website, dan marketplace masuk ke satu kotak masuk. Setiap prospek punya penanggung jawab dan jadwal tindak lanjut.',
                        'features' => ['Kotak masuk gabungan dari berbagai kanal', 'Pembagian prospek ke tim sales', 'Status dan riwayat tindak lanjut'],
                        'detail' => null,
                    ],
                    [
                        'name' => 'Loyalty &amp; Customer Retention Program Platform',
                        'short' => 'Loyalty',
                        'icon' => 'bi-gift-fill',
                        'body' => 'Program poin, membership, dan voucher untuk pelanggan tetap. Anda juga bisa melihat siapa yang sering membeli dan siapa yang mulai jarang datang.',
                        'features' => ['Poin, tier membership, dan voucher', 'Segmentasi berdasarkan riwayat belanja', 'Pengingat untuk pelanggan yang lama tidak belanja'],
                        'detail' => null,
                    ],
                    [
                        'name' => 'Campaign &amp; Digital Advertising Analytics Dashboard',
                        'short' => 'Analitik Kampanye',
                        'icon' => 'bi-bar-chart-fill',
                        'body' => 'Biaya iklan, jumlah prospek, dan penjualan dari setiap kampanye dalam satu dashboard, jadi mudah melihat kampanye mana yang layak diteruskan.',
                        'features' => ['Biaya per prospek dan per penjualan', 'Perbandingan antarkampanye dan antarkanal', 'Laporan berkala untuk manajemen'],
                        'detail' => null,
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Apakah bisa terhubung ke WhatsApp dan media sosial?',
                        'answer' => 'Bisa, lewat API resmi dari masing-masing platform. Perlu diketahui, beberapa API resmi seperti WhatsApp Business API dikenai biaya oleh penyedianya, terpisah dari biaya pengembangan.',
                    ],
                    [
                        'question' => 'Apa bedanya dengan CRM?',
                        'answer' => 'CRM fokus pada proses penjualan setelah prospek ditangani sales. Aplikasi di kelompok ini lebih ke hulunya: dari mana prospek datang, berapa biaya mendapatkannya, dan bagaimana menjaga pelanggan agar kembali. Keduanya bisa dihubungkan.',
                    ],
                    [
                        'question' => 'Data iklan dari platform mana saja yang bisa ditarik?',
                        'answer' => 'Tergantung platform yang Anda pakai dan akses API yang disediakan. Daftar kanalnya kami pastikan bersama di tahap discovery sebelum pengerjaan dimulai.',
                    ],
                ],
            ],

            'e-learning-application' => [
                'name' => 'E-Learning Application',
                'apps_label' => 'LMS, onboarding, knowledge base',
                'icon' => 'bi-mortarboard-fill',
                'summary' => 'Aplikasi untuk pelatihan karyawan: kelas online, onboarding karyawan baru, dan pusat pengetahuan internal yang mudah dicari.',
                'title' => 'E-Learning Application: LMS & Onboarding Karyawan | Arsytech',
                'description' => 'Aplikasi e-learning perusahaan dari Arsytech: learning management system, portal pelatihan dan onboarding karyawan, serta knowledge base internal.',
                'heading' => 'Satukan materi, onboarding, dan pembelajaran dalam satu sistem',
                'lead' => 'Materi pelatihan, SOP, dan program onboarding tersimpan dalam satu tempat. HR dapat menyusun jalur pembelajaran dan memantau perkembangan setiap karyawan',
                'intro' => [
                    'title' => 'Satu Tempat untuk Belajar dan Berbagi Pengetahuan',
                    'paragraphs' => [
                        'Materi yang sudah disusun dapat digunakan kembali untuk karyawan baru, pelatihan berkala, maupun pembaruan prosedur. Dengan dokumentasi yang lebih teratur, proses transfer pengetahuan menjadi lebih mudah dan konsisten',
                        'Aplikasi e-learning membantu membuat proses tersebut lebih terstruktur. Materi dapat disusun berdasarkan jabatan atau kebutuhan, karyawan baru memiliki jalur onboarding yang jelas, dan HR dapat memantau pelatihan yang sudah maupun belum diselesaikan',
                    ],
                ],
                'apps' => [
                    [
                        'name' => 'Corporate Learning Management System',
                        'short' => 'LMS',
                        'icon' => 'bi-journal-bookmark-fill',
                        'body' => 'Kelas online, kuis, dan sertifikat untuk karyawan. Materinya bisa berupa video, dokumen, atau presentasi, dan dikelompokkan per jabatan atau divisi.',
                        'features' => ['Kelas, modul, kuis, dan sertifikat', 'Jalur belajar per jabatan', 'Laporan progres per karyawan'],
                        'detail' => null,
                    ],
                    [
                        'name' => 'Interactive Training Portal &amp; Onboarding System',
                        'short' => 'Onboarding',
                        'icon' => 'bi-person-check-fill',
                        'body' => 'Karyawan baru mendapat daftar tugas dan materi untuk minggu-minggu pertamanya, dan atasan bisa memantau sampai mana prosesnya.',
                        'features' => ['Checklist onboarding per posisi', 'Materi pengenalan perusahaan dan SOP', 'Pemantauan oleh atasan dan HR'],
                        'detail' => null,
                    ],
                    [
                        'name' => 'Knowledge Base &amp; Internal Academy Hub',
                        'short' => 'Knowledge Base',
                        'icon' => 'bi-lightbulb-fill',
                        'body' => 'Tempat menyimpan SOP, panduan kerja, dan jawaban untuk pertanyaan yang sering muncul, sehingga karyawan bisa mencari sendiri sebelum bertanya.',
                        'features' => ['Artikel dan SOP yang mudah dicari', 'Hak akses per divisi', 'Riwayat perubahan dokumen'],
                        'detail' => null,
                    ],
                ],
                'faq' => [
                    [
                        'question' => 'Apakah bisa terhubung dengan HRIS?',
                        'answer' => 'Bisa. Data karyawan dan jabatan bisa diambil dari HRIS, sehingga jalur pelatihan menyesuaikan posisi masing-masing dan riwayat pelatihan tercatat di data karyawan.',
                    ],
                    [
                        'question' => 'Siapa yang membuat materi pelatihannya?',
                        'answer' => 'Materinya tetap disusun tim Anda karena isinya khusus untuk perusahaan. Kami menyiapkan sistemnya dan membantu memindahkan materi yang sudah ada ke dalam aplikasi.',
                    ],
                    [
                        'question' => 'Apakah bisa diakses dari HP?',
                        'answer' => 'Bisa. Aplikasinya berjalan di browser dan tampilannya menyesuaikan layar HP, jadi karyawan di lapangan tetap bisa mengikuti pelatihan.',
                    ],
                ],
            ],
        ];
    }

    public static function find(string $slug): ?array
    {
        return static::all()[$slug] ?? null;
    }

    public static function parentOf(string $solusi): ?string
    {
        foreach (static::all() as $slug => $kategori) {
            foreach ($kategori['apps'] as $app) {
                if ($app['detail'] === $solusi) {
                    return $slug;
                }
            }
        }

        return null;
    }
}
