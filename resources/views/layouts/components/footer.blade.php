<footer class="site-footer">
  <div class="container">
    <div class="row g-4 g-lg-5">
      <div class="col-lg-4">
        <a class="navbar-brand mb-3" href="{{ route('home') }}" aria-label="Arsytech — beranda">
          <img src="{{ asset('assets/img/logo-white.png') }}" alt="Arsytech" style="height:2rem">
        </a>
        <p class="f-about">Kami membuat ERP dan aplikasi pendukungnya, mulai dari HRIS, WMS, dan CRM sampai
          aplikasi pemasaran dan e-learning, untuk perusahaan yang ingin operasionalnya lebih tertata.</p>
        <div class="d-flex gap-2 mt-4">
          <a class="soc" href="{{ config('arsytech.social.linkedin') }}" target="_blank" rel="noopener" aria-label="LinkedIn Arsytech"><i class="bi bi-linkedin"></i></a>
          <a class="soc" href="{{ config('arsytech.social.instagram') }}" target="_blank" rel="noopener" aria-label="Instagram Arsytech"><i class="bi bi-instagram"></i></a>
          <a class="soc" href="{{ config('arsytech.social.facebook') }}" target="_blank" rel="noopener" aria-label="Facebook Arsytech"><i class="bi bi-facebook"></i></a>
          <a class="soc" href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener" aria-label="WhatsApp Arsytech"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>
      <div class="col-6 col-lg-2">
        <h5>Solusi</h5>
        <ul class="list-unstyled mb-0">
          <li><a href="{{ route('solusi.show', 'erp') }}">Enterprise Resource Planning</a></li>
          @foreach (\App\Content\KategoriSolusi::all() as $slug => $item)
            <li><a href="{{ route('solusi.show', $slug) }}">{!! $item['name'] !!}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-6 col-lg-2">
        <h5>Industri</h5>
        <ul class="list-unstyled mb-0">
          @foreach (\App\Content\Industri::all() as $slug => $item)
            <li><a href="{{ route('industri.index').'#'.$slug }}">{!! $item['name'] !!}</a></li>
          @endforeach
          <li><a href="{{ route('industri.index') }}">Lihat semua</a></li>
        </ul>
      </div>
      <div class="col-lg-4">
        <h5>Hubungi Kami</h5>
        <ul class="list-unstyled mb-0">
          <li class="d-flex gap-2 mb-2"><i class="bi bi-geo-alt mt-1"></i><span style="font-size:.9375rem">{{ config('arsytech.contact.city') }}, {{ config('arsytech.contact.region') }}, Indonesia</span></li>
          <li class="d-flex gap-2 mb-2"><i class="bi bi-envelope mt-1"></i><a href="mailto:{{ config('arsytech.contact.email') }}">{{ config('arsytech.contact.email') }}</a></li>
          <li class="d-flex gap-2 mb-2"><i class="bi bi-whatsapp mt-1"></i><a href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener">{{ config('arsytech.contact.phone') }}</a></li>
        </ul>
        <div class="d-flex flex-wrap gap-2 mt-3">
          <a href="{{ route('kontak') }}" class="btn btn-outline-light-2">Minta Penawaran <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
      </div>
    </div>
    <div class="f-bottom d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
      <span>&copy; {{ date('Y') }} Arsytech, bagian dari Clarsyara Group. Seluruh hak cipta dilindungi.</span>
      <span class="d-flex flex-wrap gap-3">
        <a href="{{ route('blog.index') }}">Blog</a>
        <a href="{{ route('galeri.index') }}">Galeri</a>
        <a href="{{ route('kebijakan-privasi') }}">Kebijakan Privasi</a>
        <a href="{{ route('syarat-ketentuan') }}">Syarat &amp; Ketentuan</a>
        <a href="{{ route('kontak') }}">Kontak</a>
      </span>
    </div>
  </div>
</footer>

<div class="fab">
  <a href="#top" class="to-top" id="toTop" aria-label="Kembali ke atas"><i class="bi bi-arrow-up"></i></a>
  <a href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener" class="fab-wa" aria-label="Chat via WhatsApp"><i class="bi bi-whatsapp"></i></a>
</div>
