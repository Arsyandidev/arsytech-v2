<?php

namespace App\Mail;

use App\Content\Konsultasi;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KonsultasiBaru extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $data, public ?string $ip = null)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [new Address($this->data['email'], $this->data['nama'])],
            subject: 'Konsultasi baru: '.$this->data['kebutuhan'].' dari '.$this->data['nama'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.konsultasi',
            with: [
                'rows' => array_filter([
                    'Nama' => $this->data['nama'],
                    'Email' => $this->data['email'],
                    'Perusahaan' => $this->data['perusahaan'] ?? null,
                    'WhatsApp' => $this->data['telepon'] ?? null,
                    'Kebutuhan utama' => Konsultasi::label(Konsultasi::KEBUTUHAN, $this->data['kebutuhan']),
                    'Industri' => Konsultasi::label(Konsultasi::INDUSTRI, $this->data['industri'] ?? null),
                    'Calon pengguna' => Konsultasi::label(Konsultasi::SKALA, $this->data['skala'] ?? null),
                    'Target mulai' => Konsultasi::label(Konsultasi::WAKTU, $this->data['waktu'] ?? null),
                ]),
                'pesan' => $this->data['pesan'],
                'whatsapp' => $this->whatsappLink(),
                'waktuKirim' => now()->translatedFormat('l, d F Y H.i').' WIB',
            ],
        );
    }

    protected function whatsappLink(): ?string
    {
        $digits = preg_replace('/\D/', '', $this->data['telepon'] ?? '');

        if ($digits === '') {
            return null;
        }

        if (str_starts_with($digits, '0')) {
            $digits = '62'.substr($digits, 1);
        }

        return 'https://wa.me/'.$digits;
    }
}
