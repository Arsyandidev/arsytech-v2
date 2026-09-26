@extends('layouts.app')

@section('title', 'Hubungi Kami | Arsytech')
@section('description', 'Hubungi Arsytech untuk konsultasi kebutuhan sistem bisnis Anda. Balasan dalam 1x24 jam kerja, siap menandatangani NDA.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Mulai dari percakapan, bukan dari penawaran',
    'subtitle' => 'Ceritakan singkat kebutuhan sistem Anda. Tim kami membalas dalam 1×24 jam kerja — tanpa presentasi penjualan, langsung ke pokok masalah.',
    'breadcrumbs' => [
        'Kontak' => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-5 rv">
        <h2>Formulir konsultasi</h2>
        <p class="lead-sm mt-3">Semakin konkret ceritanya, semakin berguna jawaban pertama dari kami.
          Tidak perlu tahu istilah teknisnya — cukup jelaskan apa yang saat ini melelahkan.</p>

        <div class="mt-4">
          <div class="tick on-light"><i class="bi bi-check-circle-fill"></i><div><strong>Analisis kebutuhan tanpa biaya</strong>Kami bantu petakan masalahnya lebih dulu.</div></div>
          <div class="tick on-light"><i class="bi bi-check-circle-fill"></i><div><strong>Estimasi lingkup, waktu, dan anggaran</strong>Tertulis, agar bisa Anda bandingkan.</div></div>
          <div class="tick on-light"><i class="bi bi-check-circle-fill"></i><div><strong>Siap menandatangani NDA</strong>Data dan proses bisnis Anda kami jaga.</div></div>
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
              <span style="color:var(--muted)">Melayani klien se-Indonesia.</span></p></div></div>
          <div class="col-sm-6"><div class="card-x flat">
            <div class="ico ico-sm"><i class="bi bi-clock"></i></div>
            <h3 style="font-size:.9375rem">Jam kerja</h3>
            <p style="font-size:.875rem">Senin–Jumat<br>
              <span style="color:var(--muted)">08.00–17.00 WIB.</span></p></div></div>
        </div>
      </div>

      <div class="col-lg-7 rv">
        <div class="form-card">
          <p class="mb-4" style="font-size:.875rem;color:var(--muted)">Kolom bertanda <span style="color:var(--brand)">*</span> wajib diisi.</p>
          <form action="/contact/send" method="post" class="needs-validation" novalidate id="leadForm">
            @csrf
            <div class="hp-field" aria-hidden="true">
              <label for="website">Jangan isi kolom ini</label>
              <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <label for="nama" class="form-label">Nama lengkap <span class="req">*</span></label>
                <input type="text" class="form-control" id="nama" name="nama" autocomplete="name" placeholder="Budi Santoso" required>
                <div class="invalid-feedback">Mohon isi nama Anda.</div>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">Email kantor <span class="req">*</span></label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="email" placeholder="budi@perusahaan.co.id" required>
                <div class="invalid-feedback">Mohon isi alamat email yang valid.</div>
              </div>
              <div class="col-md-6">
                <label for="perusahaan" class="form-label">Nama perusahaan</label>
                <input type="text" class="form-control" id="perusahaan" name="perusahaan" autocomplete="organization" placeholder="PT Sumber Makmur">
              </div>
              <div class="col-md-6">
                <label for="telepon" class="form-label">Nomor WhatsApp</label>
                <input type="tel" class="form-control" id="telepon" name="telepon" autocomplete="tel" inputmode="tel" placeholder="0812-3456-7890">
                <div class="form-text">Untuk respons yang lebih cepat.</div>
              </div>
              <div class="col-md-6">
                <label for="kebutuhan" class="form-label">Kebutuhan utama <span class="req">*</span></label>
                <select class="form-select" id="kebutuhan" name="kebutuhan" required>
                  <option value="" selected disabled>Pilih salah satu…</option>
                  <option value="ERP">ERP — Sistem terintegrasi</option>
                  <option value="WMS">WMS — Manajemen gudang</option>
                  <option value="HRIS">HRIS — Kepegawaian &amp; payroll</option>
                  <option value="CRM">CRM — Penjualan &amp; pelanggan</option>
                  <option value="Finance">Accounting &amp; Finance</option>
                  <option value="Website">Website / portal perusahaan</option>
                  <option value="Lainnya">Belum tahu / lainnya</option>
                </select>
                <div class="invalid-feedback">Pilih salah satu kebutuhan.</div>
              </div>
              <div class="col-md-6">
                <label for="industri" class="form-label">Industri</label>
                <select class="form-select" id="industri" name="industri">
                  <option value="" selected disabled>Pilih sektor…</option>
                  <option value="Manufaktur">Manufaktur</option>
                  <option value="Distribusi">Distribusi &amp; Logistik</option>
                  <option value="Retail">Retail &amp; FMCG</option>
                  <option value="Pemerintahan">Pemerintahan &amp; NGO</option>
                  <option value="Jasa">Jasa &amp; Konsultan</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="skala" class="form-label">Jumlah calon pengguna</label>
                <select class="form-select" id="skala" name="skala">
                  <option value="" selected disabled>Perkiraan saja…</option>
                  <option value="1-25">1 – 25 orang</option>
                  <option value="26-100">26 – 100 orang</option>
                  <option value="101-500">101 – 500 orang</option>
                  <option value="500+">Lebih dari 500 orang</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="waktu" class="form-label">Target mulai</label>
                <select class="form-select" id="waktu" name="waktu">
                  <option value="" selected disabled>Kapan rencananya…</option>
                  <option value="segera">Secepatnya</option>
                  <option value="3bulan">Dalam 3 bulan</option>
                  <option value="6bulan">Dalam 6 bulan</option>
                  <option value="survei">Masih survei vendor</option>
                </select>
              </div>
              <div class="col-12">
                <label for="pesan" class="form-label">Ceritakan kebutuhan Anda <span class="req">*</span></label>
                <textarea class="form-control" id="pesan" name="pesan" rows="5" required
                  placeholder="Contoh: stok gudang sering selisih dan rekap bulanan selalu telat. Kami punya 3 gudang dan sekitar 400 SKU."></textarea>
                <div class="invalid-feedback">Mohon ceritakan sedikit kebutuhan Anda.</div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="setuju" name="setuju" required>
                  <label class="form-check-label" for="setuju" style="font-size:.875rem;color:var(--muted)">
                    Saya setuju data ini digunakan untuk menindaklanjuti permintaan konsultasi. <span class="req">*</span>
                  </label>
                  <div class="invalid-feedback">Persetujuan diperlukan agar kami dapat menghubungi Anda.</div>
                </div>
              </div>
              <div class="col-12 d-grid d-sm-flex align-items-center gap-3 mt-2">
                <button type="submit" class="btn btn-brand btn-lg flex-shrink-0 text-nowrap">
                  Kirim &amp; Jadwalkan Konsultasi <i class="bi bi-arrow-right ms-1"></i></button>
                <span style="font-size:.8125rem;color:var(--muted)">
                  <i class="bi bi-shield-check me-1" style="color:var(--ok)"></i>Tanpa komitmen · Siap menandatangani NDA</span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="container">
    <div class="text-center mb-5 rv">
      <span class="eyebrow">Setelah Anda mengirim</span>
      <h2>Yang terjadi berikutnya</h2>
      <p class="lead-sm mt-3 mx-auto" style="max-width:58ch">
        Tidak ada tim sales yang menelepon berulang kali. Ini urutannya.
      </p>
    </div>
    <div class="row g-4">
      <div class="col-md-3 rv"><div class="card-x text-center h-100">
        <div class="ico mx-auto"><i class="bi bi-envelope-check"></i></div>
        <h3 style="font-size:.9375rem">1. Balasan awal</h3>
        <p>Dalam 1&times;24 jam kerja, berisi pertanyaan lanjutan yang relevan dengan cerita Anda.</p></div></div>
      <div class="col-md-3 rv"><div class="card-x text-center h-100">
        <div class="ico mx-auto"><i class="bi bi-camera-video"></i></div>
        <h3 style="font-size:.9375rem">2. Sesi konsultasi</h3>
        <p>Daring atau tatap muka, 45–60 menit. Kami mendengar, Anda bertanya. Gratis.</p></div></div>
      <div class="col-md-3 rv"><div class="card-x text-center h-100">
        <div class="ico mx-auto"><i class="bi bi-file-earmark-ruled"></i></div>
        <h3 style="font-size:.9375rem">3. Estimasi tertulis</h3>
        <p>Lingkup, tahapan, perkiraan waktu, dan rentang anggaran dalam satu dokumen.</p></div></div>
      <div class="col-md-3 rv"><div class="card-x text-center h-100">
        <div class="ico mx-auto"><i class="bi bi-signpost-split"></i></div>
        <h3 style="font-size:.9375rem">4. Keputusan Anda</h3>
        <p>Lanjut, tunda, atau bawa dokumennya ke vendor lain. Semuanya sah.</p></div></div>
    </div>
  </div>
</section>

<section class="section-tight">
  <div class="container">
    <div class="text-center rv">
      <p class="lead-sm mb-3">Mungkin pertanyaan Anda sudah terjawab di halaman FAQ.</p>
      <a href="{{ route('faq') }}" class="btn btn-outline-ink">Lihat Tanya Jawab <i class="bi bi-arrow-right ms-1"></i></a>
    </div>
  </div>
</section>
@endsection
