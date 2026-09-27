<?php

namespace App\Content;

class Konsultasi
{
    public const KEBUTUHAN = [
        'ERP' => 'ERP (Enterprise Resource Planning)',
        'HRIS' => 'HRIS (kepegawaian &amp; payroll)',
        'WMS' => 'WMS (manajemen gudang)',
        'CRM' => 'CRM (penjualan &amp; pelanggan)',
        'Finance' => 'AMS (akuntansi &amp; keuangan)',
        'Laporan' => 'Analisis &amp; laporan',
        'Lead' => 'Omnichannel sales &amp; lead management',
        'Loyalty' => 'Program loyalitas pelanggan',
        'Kampanye' => 'Analitik kampanye &amp; iklan digital',
        'LMS' => 'Learning management system (LMS)',
        'Onboarding' => 'Portal pelatihan &amp; onboarding',
        'KnowledgeBase' => 'Knowledge base internal',
        'Lainnya' => 'Belum tahu / lainnya',
    ];

    public const KEBUTUHAN_GRUP = [
        'Layanan inti' => ['ERP'],
        'Business Operation System' => ['HRIS', 'WMS', 'CRM', 'Finance', 'Laporan'],
        'Advertisement Application' => ['Lead', 'Loyalty', 'Kampanye'],
        'E-Learning Application' => ['LMS', 'Onboarding', 'KnowledgeBase'],
        'Lainnya' => ['Lainnya'],
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
