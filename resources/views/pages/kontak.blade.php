@extends('layouts.app')

@section('title', 'Hubungi Kami untuk Konsultasi | Arsytech')
@section('description', 'Konsultasikan kebutuhan sistem bisnis Anda dengan Arsytech. Kami balas dalam 1x24 jam kerja dan siap menandatangani NDA.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Mari mulai dari cerita Anda',
    'subtitle' => 'Ceritakan singkat kebutuhan sistem Anda. Tim kami membalas dalam 1×24 jam kerja dan langsung membahas masalahnya, tanpa presentasi penjualan.',
    'breadcrumbs' => [
        'Kontak' => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5 rv">
        <h2>Formulir konsultasi</h2>
        <p class="lead-sm mt-3">Makin jelas ceritanya, makin berguna jawaban pertama dari kami.
          Istilah teknis tidak perlu. Cukup ceritakan bagian pekerjaan yang sekarang paling merepotkan.</p>

        <div class="mt-4">
          <div class="tick on-light"><i class="bi bi-check-circle-fill"></i><div><strong>Analisis kebutuhan gratis</strong>Kami bantu memetakan masalahnya dulu.</div></div>
          <div class="tick on-light"><i class="bi bi-check-circle-fill"></i><div><strong>Estimasi lingkup, waktu, dan anggaran</strong>Dalam bentuk tertulis, jadi mudah Anda bandingkan.</div></div>
          <div class="tick on-light"><i class="bi bi-check-circle-fill"></i><div><strong>Siap menandatangani NDA</strong>Kerahasiaan data dan proses bisnis Anda kami jaga.</div></div>
        </div>

        <hr class="soft my-4">

        <div class="row g-3">
          <div class="col-sm-6"><div class="card-x flat">
            <div class="ico ico-sm"><i class="bi bi-whatsapp"></i></div>
            <h3 style="font-size:.9375rem">WhatsApp</h3>
            <p style="font-size:.875rem"><a href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener">{{ config('arsytech.contact.phone') }}</a><br>
              <span style="color:var(--muted)">Paling cepat dibalas.</span></p></div></div>
          <div class="col-sm-6"><div class="card-x flat">
            <div class="ico ico-sm"><i class="bi bi-envelope"></i></div>
            <h3 style="font-size:.9375rem">Email</h3>
            <p style="font-size:.875rem"><a href="mailto:{{ config('arsytech.contact.email') }}">{{ config('arsytech.contact.email') }}</a><br>
              <span style="color:var(--muted)">Untuk lampiran dan dokumen.</span></p></div></div>
          <div class="col-sm-6"><div class="card-x flat">
            <div class="ico ico-sm"><i class="bi bi-geo-alt"></i></div>
            <h3 style="font-size:.9375rem">Lokasi</h3>
            <p style="font-size:.875rem">Bogor, Jawa Barat<br>
              <span style="color:var(--muted)">Menerima klien dari seluruh Indonesia.</span></p></div></div>
          <div class="col-sm-6"><div class="card-x flat">
            <div class="ico ico-sm"><i class="bi bi-clock"></i></div>
            <h3 style="font-size:.9375rem">Jam kerja</h3>
            <p style="font-size:.875rem">Senin–Jumat<br>
              <span style="color:var(--muted)">08.00–17.00 WIB.</span></p></div></div>
        </div>
      </div>

      <div class="col-lg-7 rv">
        <div class="form-card" id="formulir">
          @if (session()->has('konsultasi_terkirim'))
            <div class="form-done" role="status">
              <div class="ico mx-auto"><i class="bi bi-envelope-check"></i></div>
              <h3>Terima kasih{{ session('konsultasi_terkirim') ? ', '.session('konsultasi_terkirim') : '' }}.</h3>
              <p>Pesan Anda sudah kami terima. Tim kami akan membalas lewat email atau WhatsApp dalam 1&times;24 jam kerja.</p>
              <p>Kalau ada yang ingin ditambahkan, langsung saja kirim ke <a href="mailto:{{ config('arsytech.contact.email') }}">{{ config('arsytech.contact.email') }}</a>.</p>
              <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
                <a href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener" class="btn btn-wa"><i class="bi bi-whatsapp me-1"></i> Chat WhatsApp</a>
                <a href="{{ route('kontak') }}#formulir" class="btn btn-outline-ink">Kirim pesan lain</a>
              </div>
            </div>
          @else
          @if (session('konsultasi_gagal'))
            <div class="form-alert" role="alert"><i class="bi bi-exclamation-triangle-fill"></i><div>{{ session('konsultasi_gagal') }}</div></div>
          @elseif ($errors->any())
            <div class="form-alert" role="alert"><i class="bi bi-exclamation-triangle-fill"></i><div>Ada beberapa isian yang perlu diperbaiki. Silakan cek kolom yang ditandai merah.</div></div>
          @endif
          <p class="mb-4" style="font-size:.875rem;color:var(--muted)">Kolom bertanda <span style="color:var(--brand)">*</span> wajib diisi.</p>
          <form action="{{ route('kontak.kirim') }}" method="post" class="needs-validation" novalidate id="leadForm">
            @csrf
            <div class="hp-field" aria-hidden="true">
              <label for="website">Jangan isi kolom ini</label>
              <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <label for="nama" class="form-label">Nama lengkap <span class="req">*</span></label>
                <input type="text" @class(['form-control', 'is-invalid' => $errors->has('nama')]) id="nama" name="nama" value="{{ old('nama') }}" autocomplete="name" placeholder="Budi Santoso" maxlength="100" required>
                <div class="invalid-feedback">{{ $errors->first('nama') ?: 'Nama belum diisi.' }}</div>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email kantor <span class="req">*</span></label>
                <input type="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) id="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="budi@perusahaan.co.id" maxlength="150" required>
                <div class="invalid-feedback">{{ $errors->first('email') ?: 'Periksa lagi alamat email Anda.' }}</div>
              </div>
              <div class="col-md-6">
                <label for="perusahaan" class="form-label">Nama perusahaan</label>
                <input type="text" @class(['form-control', 'is-invalid' => $errors->has('perusahaan')]) id="perusahaan" name="perusahaan" value="{{ old('perusahaan') }}" autocomplete="organization" placeholder="PT Sumber Makmur" maxlength="150">
                <div class="invalid-feedback">{{ $errors->first('perusahaan') }}</div>
              </div>
              <div class="col-md-6">
                <label for="telepon" class="form-label">Nomor WhatsApp</label>
                <input type="tel" @class(['form-control', 'is-invalid' => $errors->has('telepon')]) id="telepon" name="telepon" value="{{ old('telepon') }}" autocomplete="tel" inputmode="tel" placeholder="0812-3456-7890" maxlength="30">
                <div class="form-text">Supaya kami bisa membalas lebih cepat.</div>
                <div class="invalid-feedback">{{ $errors->first('telepon') }}</div>
              </div>
              <div class="col-md-6">
                <label for="kebutuhan" class="form-label">Kebutuhan utama <span class="req">*</span></label>
                <select @class(['form-select', 'is-invalid' => $errors->has('kebutuhan')]) id="kebutuhan" name="kebutuhan" required>
                  <option value="" @selected(! old('kebutuhan')) disabled>Pilih salah satu…</option>
                  @foreach (\App\Content\Konsultasi::KEBUTUHAN as $value => $label)
                    <option value="{{ $value }}" @selected(old('kebutuhan') === $value)>{!! $label !!}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">{{ $errors->first('kebutuhan') ?: 'Pilih salah satu kebutuhan dulu.' }}</div>
              </div>
              <div class="col-md-6">
                <label for="industri" class="form-label">Industri</label>
                <select @class(['form-select', 'is-invalid' => $errors->has('industri')]) id="industri" name="industri">
                  <option value="" @selected(! old('industri')) disabled>Pilih sektor…</option>
                  @foreach (\App\Content\Konsultasi::INDUSTRI as $value => $label)
                    <option value="{{ $value }}" @selected(old('industri') === $value)>{!! $label !!}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="skala" class="form-label">Jumlah calon pengguna</label>
                <select @class(['form-select', 'is-invalid' => $errors->has('skala')]) id="skala" name="skala">
                  <option value="" @selected(! old('skala')) disabled>Perkiraan saja…</option>
                  @foreach (\App\Content\Konsultasi::SKALA as $value => $label)
                    <option value="{{ $value }}" @selected(old('skala') === $value)>{{ $label }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="waktu" class="form-label">Target mulai</label>
                <select @class(['form-select', 'is-invalid' => $errors->has('waktu')]) id="waktu" name="waktu">
                  <option value="" @selected(! old('waktu')) disabled>Kapan rencananya…</option>
                  @foreach (\App\Content\Konsultasi::WAKTU as $value => $label)
                    <option value="{{ $value }}" @selected(old('waktu') === $value)>{{ $label }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12">
                <label for="pesan" class="form-label">Ceritakan kebutuhan Anda <span class="req">*</span></label>
                <textarea @class(['form-control', 'is-invalid' => $errors->has('pesan')]) id="pesan" name="pesan" rows="5" minlength="10" maxlength="3000" required
                  placeholder="Contoh: stok gudang sering selisih dan rekap bulanan selalu telat. Kami punya 3 gudang dan sekitar 400 SKU.">{{ old('pesan') }}</textarea>
                <div class="invalid-feedback">{{ $errors->first('pesan') ?: 'Ceritakan sedikit kebutuhan Anda, beberapa kalimat sudah cukup.' }}</div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input @class(['form-check-input', 'is-invalid' => $errors->has('setuju')]) type="checkbox" id="setuju" name="setuju" value="1" @checked(old('setuju')) required>
                  <label class="form-check-label" for="setuju" style="font-size:.875rem;color:var(--muted)">
                    Saya setuju data ini dipakai untuk menindaklanjuti permintaan konsultasi saya. <span class="req">*</span>
                  </label>
                  <div class="invalid-feedback">{{ $errors->first('setuju') ?: 'Centang persetujuan ini supaya kami bisa menghubungi Anda.' }}</div>
                </div>
              </div>
              <div class="col-12 d-grid d-sm-flex align-items-center gap-3 mt-2">
                <button type="submit" class="btn btn-brand btn-lg flex-shrink-0 text-nowrap" data-loading="Mengirim…">
                  Kirim &amp; Jadwalkan Konsultasi <i class="bi bi-arrow-right ms-1"></i></button>
                <span style="font-size:.8125rem;color:var(--muted)">
                  <i class="bi bi-shield-check me-1" style="color:var(--ok)"></i>Tidak mengikat · Siap menandatangani NDA</span>
              </div>
            </div>
          </form>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow">Setelah Anda mengirim</span>
      <h2>Langkah selanjutnya</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:58ch">
        Anda tidak akan ditelepon sales berulang kali. Prosesnya seperti ini.
      </p>
    </div>
    <div class="row g-4">
      <div class="col-md-3 rv"><div class="card-x text-center h-100">
        <div class="ico mx-auto"><i class="bi bi-envelope-check"></i></div>
        <h3 style="font-size:.9375rem">1. Balasan awal</h3>
        <p>Dalam 1&times;24 jam kerja kami kirim balasan, biasanya berisi beberapa pertanyaan lanjutan sesuai cerita Anda.</p></div></div>
      <div class="col-md-3 rv"><div class="card-x text-center h-100">
        <div class="ico mx-auto"><i class="bi bi-camera-video"></i></div>
        <h3 style="font-size:.9375rem">2. Sesi konsultasi</h3>
        <p>Gratis, daring atau tatap muka selama 45–60 menit. Kami banyak mendengarkan, dan Anda bebas bertanya.</p></div></div>
      <div class="col-md-3 rv"><div class="card-x text-center h-100">
        <div class="ico mx-auto"><i class="bi bi-file-earmark-ruled"></i></div>
        <h3 style="font-size:.9375rem">3. Estimasi tertulis</h3>
        <p>Lingkup, tahapan, perkiraan waktu, dan rentang anggaran, semuanya dalam satu dokumen.</p></div></div>
      <div class="col-md-3 rv"><div class="card-x text-center h-100">
        <div class="ico mx-auto"><i class="bi bi-signpost-split"></i></div>
        <h3 style="font-size:.9375rem">4. Keputusan Anda</h3>
        <p>Anda bebas memilih: lanjut, menunda dulu, atau membawa dokumennya ke vendor lain.</p></div></div>
    </div>
  </div>
</section>

<section class="section-tight">
  <div class="container">
    <div class="text-center rv">
      <p class="lead-sm mb-3">Bisa jadi pertanyaan Anda sudah dijawab di halaman FAQ.</p>
      <a href="{{ route('faq') }}" class="btn btn-outline-ink">Lihat Tanya Jawab <i class="bi bi-arrow-right ms-1"></i></a>
    </div>
  </div>
</section>
@endsection
