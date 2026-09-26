<?php

namespace App\Content;

class Faq
{
    public static function all(): array
    {
        return [
            'layanan' => [
                'accordion' => 'fq-a',
                'title' => 'Layanan &amp; lingkup',
                'icon' => 'bi-briefcase',
                'items' => [
                    [
                        'question' => 'Berapa lama pengerjaan satu sistem?',
                        'answer' => 'Bergantung ruang lingkup. Satu modul fokus — misalnya WMS untuk satu gudang — umumnya 2–4 bulan. ERP multi-divisi biasanya 6–12 bulan dan dirilis bertahap, sehingga Anda sudah bisa memakai modul pertama jauh sebelum keseluruhan sistem selesai. Estimasi pastinya kami berikan setelah tahap discovery.',
                    ],
                    [
                        'question' => 'Berapa kisaran biayanya?',
                        'answer' => 'Proyek kami umumnya dimulai dari puluhan juta untuk satu modul dan naik sesuai jumlah modul, kompleksitas integrasi, serta jumlah pengguna. Kami memberikan estimasi tertulis berisi rincian lingkup, waktu, dan anggaran sebelum kontrak — tanpa biaya dan tanpa kewajiban melanjutkan.',
                    ],
                    [
                        'question' => 'Kami belum tahu persis kebutuhannya. Apa bisa mulai?',
                        'answer' => 'Bisa, dan itu justru kondisi yang paling umum. Tahap discovery bisa dibeli terpisah: kami memetakan alur kerja Anda dan menghasilkan dokumen kebutuhan beserta estimasi anggaran. Dokumen itu milik Anda dan bebas dibawa ke vendor mana pun.',
                    ],
                    [
                        'question' => 'Apakah Arsytech menjual produk jadi atau membangun dari nol?',
                        'answer' => 'Kami membangun sistem sesuai proses Anda, dengan memanfaatkan komponen yang sudah teruji di proyek sebelumnya. Jadi bukan produk kaku yang memaksa Anda berubah, tapi juga bukan menulis ulang segalanya dari halaman kosong.',
                    ],
                ],
            ],
            'teknis' => [
                'accordion' => 'fq-b',
                'title' => 'Teknis &amp; integrasi',
                'icon' => 'bi-cpu',
                'items' => [
                    [
                        'question' => 'Teknologi apa yang kalian pakai?',
                        'answer' => 'Backend umumnya Laravel atau Node.js dengan PostgreSQL atau MySQL. Frontend memakai Vue, React, atau Livewire. Semuanya open source dan umum dipakai, sehingga Anda mudah mencari pengembang lain bila suatu saat diperlukan.',
                    ],
                    [
                        'question' => 'Sistem lama kami masih dipakai. Bisa diintegrasikan?',
                        'answer' => 'Umumnya bisa. Kami terbiasa menyambungkan sistem baru ke aplikasi akuntansi, mesin absensi, marketplace, dan payment gateway melalui REST API, webhook, atau sinkronisasi basis data terjadwal. Kelayakannya kami periksa di tahap discovery sebelum apa pun dijanjikan.',
                    ],
                    [
                        'question' => 'Bagaimana dengan migrasi data lama?',
                        'answer' => 'Migrasi data master dan saldo awal adalah bagian standar dari tahap UAT & Go-Live. Yang biasanya memakan waktu bukan proses pemindahannya, melainkan pembersihan data sumber — karena itu kami memeriksanya sejak discovery.',
                    ],
                    [
                        'question' => 'Apakah sistemnya bisa dibuka dari HP?',
                        'answer' => 'Ya. Semua sistem kami dirancang responsif dan berjalan di browser, sehingga bisa dipakai dari HP maupun tablet tanpa perlu memasang aplikasi terpisah. Untuk kebutuhan khusus seperti pemindaian barcode di gudang, kami sesuaikan antarmukanya.',
                    ],
                ],
            ],
            'keamanan' => [
                'accordion' => 'fq-c',
                'title' => 'Keamanan &amp; data',
                'icon' => 'bi-shield-lock',
                'items' => [
                    [
                        'question' => 'Di mana data kami disimpan?',
                        'answer' => 'Anda yang memilih: server milik perusahaan sendiri (on-premise), atau cloud di data center Indonesia maupun regional. Kami menyiapkan enkripsi, pencadangan terjadwal, dan kontrol akses sesuai kebijakan keamanan internal Anda.',
                    ],
                    [
                        'question' => 'Siapa saja yang bisa melihat data kami selama pengembangan?',
                        'answer' => 'Hanya anggota tim yang mengerjakan proyek Anda, dan seluruhnya terikat NDA. Untuk pengembangan, kami lebih memilih memakai data contoh yang disamarkan daripada salinan data produksi.',
                    ],
                    [
                        'question' => 'Apakah sistemnya punya jejak audit?',
                        'answer' => 'Ya. Setiap perubahan pada data penting mencatat siapa yang melakukannya, kapan, dan nilai sebelum-sesudahnya. Ini kami rancang sejak awal, bukan fitur tambahan yang dibeli terpisah.',
                    ],
                ],
            ],
            'kerjasama' => [
                'accordion' => 'fq-d',
                'title' => 'Skema kerja sama',
                'icon' => 'bi-file-earmark-check',
                'items' => [
                    [
                        'question' => 'Apakah source code benar-benar jadi milik kami?',
                        'answer' => 'Ya, dan itu tertulis di kontrak. Setelah proyek selesai dan diserahterimakan, seluruh source code, skema basis data, serta dokumentasi teknis menjadi milik Anda. Anda bebas melanjutkan pengembangannya dengan tim internal atau vendor lain.',
                    ],
                    [
                        'question' => 'Bagaimana skema pembayarannya?',
                        'answer' => 'Umumnya bertahap dan dikaitkan dengan penyelesaian milestone, bukan dibayar di muka seluruhnya. Rincian tahapannya disepakati bersama sebelum kontrak ditandatangani.',
                    ],
                    [
                        'question' => 'Kalau di tengah jalan kami ingin berhenti?',
                        'answer' => 'Dokumen dan kode yang sudah selesai pada tahap yang sudah dibayar tetap menjadi milik Anda. Kami tidak menahan hasil kerja sebagai alat tawar.',
                    ],
                    [
                        'question' => 'Bisakah bekerja sama dengan tim IT internal kami?',
                        'answer' => 'Bisa, dan kami menyambutnya. Dalam beberapa proyek, tim internal klien ikut sejak awal supaya proses alih pengetahuan berjalan alami dan mereka siap mengambil alih pemeliharaan setelah go-live.',
                    ],
                ],
            ],
            'support' => [
                'accordion' => 'fq-e',
                'title' => 'Dukungan purna jual',
                'icon' => 'bi-headset',
                'items' => [
                    [
                        'question' => 'Bagaimana dukungan setelah sistem berjalan?',
                        'answer' => 'Setiap proyek mencakup masa garansi perbaikan bug tanpa biaya tambahan. Setelahnya tersedia paket dukungan berkala yang mencakup pemantauan, pembaruan keamanan, dan jam pengembangan lanjutan dengan SLA respons yang disepakati di awal.',
                    ],
                    [
                        'question' => 'Apakah pelatihan tim termasuk?',
                        'answer' => 'Termasuk. Kami menyediakan panduan pengguna, dokumentasi teknis, dan sesi pelatihan sebelum go-live. Untuk sistem yang dipakai banyak orang, kami biasanya melatih kelompok kecil pengguna kunci lebih dulu agar mereka bisa membantu rekannya.',
                    ],
                    [
                        'question' => 'Kalau kami butuh fitur baru setahun kemudian?',
                        'answer' => 'Bisa dikerjakan sebagai pengembangan lanjutan, baik oleh kami maupun tim lain — karena kode dan dokumentasinya ada di tangan Anda. Arsitektur modular membuat penambahan tidak berarti membongkar sistem yang sudah berjalan.',
                    ],
                ],
            ],
        ];
    }
}
