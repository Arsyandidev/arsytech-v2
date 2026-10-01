<?php

namespace App\Http\Controllers;

use App\Content\Konsultasi;
use App\Mail\KonsultasiBaru;
use App\Rules\NoLineBreaks;
use App\Support\Analytics\Recorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Throwable;

class KonsultasiController extends Controller
{
    public function store(Request $request)
    {
        $back = redirect()->to(route('kontak').'#formulir');

        if ($request->filled('website')) {
            return $back->with('konsultasi_terkirim', $request->input('nama', ''));
        }

        $key = 'konsultasi:'.$request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $minutes = ceil(RateLimiter::availableIn($key) / 60);

            return $back->withInput()->with('konsultasi_gagal', "Terlalu banyak pengiriman dari jaringan Anda. Coba lagi dalam {$minutes} menit, atau hubungi kami lewat WhatsApp.");
        }

        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:100', new NoLineBreaks],
            'email' => ['required', 'email:rfc,filter', 'max:150', new NoLineBreaks],
            'perusahaan' => ['nullable', 'string', 'max:150', new NoLineBreaks],
            'telepon' => ['nullable', 'string', 'max:30', 'regex:/^[0-9+\-\s().]+$/'],
            'kebutuhan' => ['required', Rule::in(array_keys(Konsultasi::KEBUTUHAN))],
            'industri' => ['nullable', Rule::in(array_keys(Konsultasi::INDUSTRI))],
            'skala' => ['nullable', Rule::in(array_keys(Konsultasi::SKALA))],
            'waktu' => ['nullable', Rule::in(array_keys(Konsultasi::WAKTU))],
            'pesan' => ['required', 'string', 'min:10', 'max:3000'],
            'setuju' => ['accepted'],
        ], [
            'telepon.regex' => 'Nomor WhatsApp hanya boleh berisi angka, spasi, dan tanda + atau -.',
            'pesan.min' => 'Ceritakan sedikit lebih banyak, minimal 10 karakter.',
            'setuju.accepted' => 'Centang persetujuan ini supaya kami bisa menghubungi Anda.',
        ]);

        if ($validator->fails()) {
            return $back->withErrors($validator)->withInput($request->except('website'));
        }

        $data = $validator->validated();

        RateLimiter::hit($key, 600);

        try {
            Mail::to(config('arsytech.contact.inbox'))->send(new KonsultasiBaru($data, $request->ip()));
        } catch (Throwable $e) {
            Log::error('Gagal mengirim email konsultasi', ['error' => $e->getMessage(), 'data' => $data]);

            return $back->withInput()->with('konsultasi_gagal', 'Maaf, pesan Anda belum terkirim karena ada gangguan di server email kami. Silakan coba lagi sebentar lagi, atau hubungi kami langsung lewat WhatsApp.');
        }

        Recorder::markConverted($request);

        return $back->with('konsultasi_terkirim', $data['nama']);
    }
}
