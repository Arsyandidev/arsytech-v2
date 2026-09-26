@extends('layouts.app')

@section('title', 'Tanya Jawab (FAQ) | Arsytech')
@section('description', 'Pertanyaan yang sering diajukan seputar layanan, teknis, keamanan, skema kerja sama, dan dukungan purna jual Arsytech.')

@section('content')
@include('layouts.components.page-head', [
    'title' => 'Pertanyaan yang paling sering diajukan',
    'subtitle' => 'Dikelompokkan supaya cepat ditemukan. Kalau pertanyaan Anda belum terjawab, kirim lewat WhatsApp — kami balas dalam 1×24 jam kerja tanpa perlu menjadwalkan pertemuan lebih dulu.',
    'breadcrumbs' => [
        'FAQ' => null,
    ],
])

<section class="section">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="rv" style="position:sticky;top:calc(var(--nav-h) + 24px)">
          <div class="card-x flat">
            <h3 style="font-size:1rem">Lompat ke topik</h3>
            <ul class="feat-list tight mt-3" style="font-size:.9375rem">
              @foreach (\App\Content\Faq::all() as $anchor => $group)
                <li><a href="#{{ $anchor }}">{!! $group['title'] !!}</a></li>
              @endforeach
            </ul>
            <hr class="soft my-4">
            <p style="font-size:.875rem;color:var(--muted)">Pertanyaan Anda belum ada di sini?</p>
            <a href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener" class="btn btn-wa w-100 mt-2"><i class="bi bi-whatsapp me-1"></i> Tanya lewat WhatsApp</a>
            <a href="{{ route('kontak') }}" class="btn btn-outline-ink w-100 mt-2">Kirim lewat formulir</a>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        @foreach (\App\Content\Faq::all() as $anchor => $group)
          <div id="{{ $anchor }}"><div class="mb-5 rv">
            <div class="d-flex align-items-center gap-2 mb-3">
              <div class="ico ico-sm mb-0"><i class="bi {{ $group['icon'] }}"></i></div>
              <h2 class="h3" style="font-size:clamp(1.15rem,1.05rem + .4vw,1.4rem);margin:0">{!! $group['title'] !!}</h2>
            </div>
            @include('layouts.components.accordion', ['id' => $group['accordion'], 'items' => $group['items'], 'firstOpen' => false])
          </div></div>
        @endforeach
      </div>
    </div>
  </div>
</section>

@include('layouts.components.cta-band')
@endsection
