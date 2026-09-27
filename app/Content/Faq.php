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
                        'answer' => 'Tergantung seberapa luas lingkupnya. Untuk satu modul yang fokus, misalnya WMS di satu gudang, biasanya 2–4 bulan. ERP untuk banyak divisi umumnya 6–12 bulan dan kami rilis bertahap, jadi modul pertama sudah bisa Anda pakai jauh sebelum semuanya selesai. Angka pastinya kami sampaikan setelah tahap discovery.',
                    ],
                    [
                        'question' => 'Kira-kira berapa biayanya?',
                        'answer' => 'Untuk satu modul, proyek kami biasanya mulai dari puluhan juta. Angkanya naik mengikuti jumlah modul, rumitnya integrasi, dan jumlah pengguna. Sebelum kontrak, Anda akan menerima estimasi tertulis berisi rincian lingkup, waktu, dan anggaran. Estimasi ini gratis dan tidak mengikat.',
                    ],
                    [
                        'question' => 'Kami belum tahu persis kebutuhannya. Apa bisa mulai?',
                        'answer' => 'Tentu bisa. Kebanyakan klien kami juga mulai dari kondisi seperti ini. Tahap discovery bisa diambil terpisah: kami memetakan alur kerja Anda, lalu menyusun dokumen kebutuhan beserta estimasi anggarannya. Dokumen itu jadi milik Anda dan boleh dibawa ke vendor mana pun.',
                    ],
                    [
                        'question' => 'Arsytech menjual produk jadi atau membangun dari nol?',
                        'answer' => 'Di antara keduanya. Sistemnya kami bangun mengikuti proses kerja Anda, dan di baliknya kami memakai ulang komponen yang sudah teruji di proyek sebelumnya. Anda tidak perlu mengubah cara kerja demi menyesuaikan diri dengan software, dan pengerjaannya juga tidak mulai dari halaman kosong.',
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
                        'answer' => 'Untuk backend biasanya Laravel atau Node.js, dengan database PostgreSQL atau MySQL. Frontend-nya Vue, React, atau Livewire. Semuanya open source dan banyak dipakai, jadi kalau suatu saat Anda butuh pengembang lain, tidak sulit mencarinya.',
                    ],
                    [
                        'question' => 'Sistem lama kami masih dipakai. Bisa diintegrasikan?',
                        'answer' => 'Dalam banyak kasus bisa. Kami sudah sering menghubungkan sistem baru dengan aplikasi akuntansi, mesin absensi, marketplace, dan payment gateway, lewat REST API, webhook, atau sinkronisasi database terjadwal. Sebelum menjanjikan apa pun, kami cek dulu kelayakannya di tahap discovery.',
                    ],
                    [
                        'question' => 'Bagaimana dengan migrasi data lama?',
                        'answer' => 'Migrasi data master dan saldo awal sudah termasuk dalam tahap UAT &amp; Go-Live. Pemindahannya sendiri biasanya cepat. Yang sering makan waktu adalah merapikan data sumbernya, karena itu kami sudah mulai memeriksanya sejak discovery.',
                    ],
                    [
                        'question' => 'Apakah sistemnya bisa dibuka dari HP?',
                        'answer' => 'Bisa, dari HP maupun tablet. Semua sistem kami berjalan di browser dan tampilannya menyesuaikan ukuran layar, jadi tidak perlu memasang aplikasi terpisah. Untuk kebutuhan khusus, misalnya scan barcode di gudang, tampilannya kami sesuaikan.',
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
                        'answer' => 'Itu Anda yang menentukan. Pilihannya server milik perusahaan sendiri (on-premise), atau cloud di data center Indonesia maupun regional. Enkripsi, backup terjadwal, dan pengaturan hak akses kami siapkan mengikuti kebijakan keamanan internal Anda.',
                    ],
                    [
                        'question' => 'Siapa saja yang bisa melihat data kami selama pengembangan?',
                        'answer' => 'Hanya orang-orang yang mengerjakan proyek Anda, dan semuanya terikat NDA. Selama pengembangan, kami lebih suka memakai data contoh yang sudah disamarkan ketimbang salinan data produksi.',
                    ],
                    [
                        'question' => 'Apakah sistemnya punya jejak audit?',
                        'answer' => 'Ada. Setiap perubahan pada data penting tercatat: siapa yang mengubah, kapan, serta nilai sebelum dan sesudahnya. Fitur ini sudah kami siapkan dari awal dan tidak dijual sebagai tambahan.',
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
                        'answer' => 'Benar, dan hal ini kami tulis di kontrak. Begitu proyek selesai dan diserahterimakan, seluruh source code, skema database, dan dokumentasi teknisnya menjadi milik Anda. Setelah itu Anda bebas melanjutkan pengembangan dengan tim internal atau vendor lain.',
                    ],
                    [
                        'question' => 'Bagaimana skema pembayarannya?',
                        'answer' => 'Biasanya bertahap, mengikuti milestone yang sudah selesai, jadi Anda tidak perlu membayar semuanya di muka. Pembagian tahapannya kita sepakati bersama sebelum kontrak ditandatangani.',
                    ],
                    [
                        'question' => 'Kalau di tengah jalan kami ingin berhenti?',
                        'answer' => 'Itu hak Anda. Dokumen dan kode dari tahap yang sudah dibayar tetap menjadi milik Anda. Kami tidak akan menahan hasil kerja untuk menekan klien.',
                    ],
                    [
                        'question' => 'Bisakah bekerja sama dengan tim IT internal kami?',
                        'answer' => 'Tentu, kami malah senang kalau tim internal ikut terlibat. Di beberapa proyek, tim IT klien sudah ikut sejak awal. Mereka jadi belajar sambil jalan dan sudah siap mengurus pemeliharaan setelah go-live.',
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
                        'answer' => 'Setiap proyek sudah termasuk masa garansi perbaikan bug, tanpa biaya tambahan. Setelah garansi selesai, Anda bisa mengambil paket dukungan berkala. Isinya pemantauan, pembaruan keamanan, dan jam pengembangan lanjutan, dengan SLA respons yang disepakati di awal.',
                    ],
                    [
                        'question' => 'Apakah pelatihan tim termasuk?',
                        'answer' => 'Sudah termasuk. Sebelum go-live, kami siapkan panduan pengguna, dokumentasi teknis, dan sesi pelatihan. Kalau penggunanya banyak, biasanya kami latih dulu beberapa pengguna kunci supaya nanti mereka bisa membantu rekan-rekannya.',
                    ],
                    [
                        'question' => 'Kalau kami butuh fitur baru setahun kemudian?',
                        'answer' => 'Tinggal dikerjakan sebagai pengembangan lanjutan, bisa oleh kami atau oleh tim lain, karena kode dan dokumentasinya sudah Anda pegang. Sistemnya kami buat modular, jadi menambah fitur tidak perlu membongkar bagian yang sudah berjalan.',
                    ],
                ],
            ],
        ];
    }
}
