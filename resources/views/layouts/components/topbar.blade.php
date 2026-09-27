<div class="topbar d-none d-lg-block">
  <div class="container d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-3">
      <span><i class="bi bi-geo-alt me-1"></i> {{ config('arsytech.contact.city') }}, {{ config('arsytech.contact.region') }}</span>
      <span class="sep"></span>
      <a href="mailto:{{ config('arsytech.contact.email') }}"><i class="bi bi-envelope me-1"></i> {{ config('arsytech.contact.email') }}</a>
      <span class="sep"></span>
      <a href="{{ config('arsytech.contact.whatsapp') }}" target="_blank" rel="noopener"><i class="bi bi-whatsapp me-1"></i> {{ config('arsytech.contact.phone') }}</a>
    </div>
    <div class="d-flex align-items-center gap-3">
      {{-- <span><i class="bi bi-clock me-1"></i> {{ config('arsytech.contact.hours') }}</span> --}}
      <span class="sep"></span>
      <div class="d-flex gap-2">
        <a href="{{ config('arsytech.social.linkedin') }}" target="_blank" rel="noopener" aria-label="LinkedIn Arsytech"><i class="bi bi-linkedin"></i></a>
        <a href="{{ config('arsytech.social.instagram') }}" target="_blank" rel="noopener" aria-label="Instagram Arsytech"><i class="bi bi-instagram"></i></a>
        <a href="{{ config('arsytech.social.facebook') }}" target="_blank" rel="noopener" aria-label="Facebook Arsytech"><i class="bi bi-facebook"></i></a>
      </div>
    </div>
  </div>
</div>
