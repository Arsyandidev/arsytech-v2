<?php

$whatsappNumber = '628211316623';
$whatsappMessage = 'Halo Arsytech, saya ingin konsultasi kebutuhan pembuatan sistem/software untuk perusahaan saya.';

return [

    'name' => 'Arsytech',
    'legal_name' => 'Arsytech — Part of Clarsyara Group',
    'tagline' => 'Part of Clarsyara Group',
    'description' => 'Software house pengembang sistem bisnis terintegrasi: ERP, WMS, HRIS, CRM, dan sistem keuangan untuk perusahaan di Indonesia.',

    'contact' => [
        'email' => 'info@arsytech.id',
        'inbox' => env('CONTACT_INBOX', 'info@arsytech.id'),
        'phone' => '+628211316623',
        'phone_schema' => '628211316623',
        'whatsapp_message' => $whatsappMessage,
        'whatsapp' => 'https://wa.me/'.$whatsappNumber.'?text='.rawurlencode($whatsappMessage),
        'city' => 'Bogor',
        'region' => 'Jawa Barat',
        'hours' => '',
    ],

    'social' => [
        'linkedin' => 'https://www.linkedin.com/company/arsytech',
        'instagram' => 'https://www.instagram.com/arsytech.id',
        'facebook' => 'https://www.facebook.com/arsytech.id',
    ],

];
