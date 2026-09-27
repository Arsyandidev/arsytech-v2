<?php

namespace App\Content;

class Konsultasi
{
    public const KEBUTUHAN = [
        'ERP' => 'ERP (sistem terintegrasi)',
        'WMS' => 'WMS (manajemen gudang)',
        'HRIS' => 'HRIS (kepegawaian &amp; payroll)',
        'CRM' => 'CRM (penjualan &amp; pelanggan)',
        'Finance' => 'Accounting &amp; Finance',
        'Website' => 'Website / portal perusahaan',
        'Lainnya' => 'Belum tahu / lainnya',
    ];

    public const INDUSTRI = [
        'Manufaktur' => 'Manufaktur',
        'Distribusi' => 'Distribusi &amp; Logistik',
        'Retail' => 'Retail &amp; FMCG',
        'Pemerintahan' => 'Pemerintahan &amp; NGO',
        'Jasa' => 'Jasa &amp; Konsultan',
        'Lainnya' => 'Lainnya',
    ];

    public const SKALA = [
        '1-25' => '1 – 25 orang',
        '26-100' => '26 – 100 orang',
        '101-500' => '101 – 500 orang',
        '500+' => 'Lebih dari 500 orang',
    ];

    public const WAKTU = [
        'segera' => 'Secepatnya',
        '3bulan' => 'Dalam 3 bulan',
        '6bulan' => 'Dalam 6 bulan',
        'survei' => 'Masih survei vendor',
    ];

    public static function label(array $options, ?string $value): ?string
    {
        return $value === null ? null : html_entity_decode($options[$value] ?? $value);
    }
}
