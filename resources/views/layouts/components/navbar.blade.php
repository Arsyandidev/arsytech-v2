<nav class="navbar navbar-expand-lg site-nav sticky-top" id="siteNav">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}" aria-label="Arsytech — beranda">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Arsytech Logo" style="height: 60px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
            aria-controls="mainNav" aria-expanded="false" aria-label="Buka menu navigasi">
      <i class="bi bi-list fs-4"></i>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a @class(['nav-link', 'active' => request()->routeIs('home')]) href="{{ route('home') }}">Beranda</a></li>
        <li class="nav-item"><a @class(['nav-link', 'active' => request()->routeIs('tentang')]) href="{{ route('tentang') }}">Tentang Kami</a></li>
        <li class="nav-item dropdown">
          <a @class(['nav-link dropdown-toggle', 'active' => request()->routeIs('solusi.*')]) href="{{ route('solusi.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">Solusi</a>
          <ul class="dropdown-menu">
            @foreach (\App\Content\Solusi::all() as $slug => $item)
              <li><a @class(['dropdown-item', 'active' => request()->is('solusi/'.$slug)]) href="{{ route('solusi.show', $slug) }}"><i class="bi {{ $item['icon'] }} di-ico"></i><span class="di-txt">{{ $item['name'] }}<small>{{ $item['short'] }}</small></span></a></li>
            @endforeach
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item fw-bold" href="{{ route('solusi.index') }}"><span class="di-txt">Lihat semua solusi <i class="bi bi-arrow-right ms-1"></i></span></a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a @class(['nav-link dropdown-toggle', 'active' => request()->routeIs('industri.*')]) href="{{ route('industri.index') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">Industri</a>
          <ul class="dropdown-menu">
            @foreach (\App\Content\Industri::all() as $slug => $item)
              <li><a @class(['dropdown-item', 'active' => request()->is('industri/'.$slug)]) href="{{ route('industri.show', $slug) }}"><i class="bi {{ $item['icon'] }} di-ico"></i><span class="di-txt">{!! $item['name'] !!}<small>{!! $item['name'] !!}</small></span></a></li>
            @endforeach
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item fw-bold" href="{{ route('industri.index') }}"><span class="di-txt">Lihat semua industri <i class="bi bi-arrow-right ms-1"></i></span></a></li>
          </ul>
        </li>
        <li class="nav-item"><a @class(['nav-link', 'active' => request()->routeIs('studi-kasus')]) href="{{ route('studi-kasus') }}">Studi Kasus</a></li>
        <li class="nav-item"><a @class(['nav-link', 'active' => request()->routeIs('faq')]) href="{{ route('faq') }}">FAQ</a></li>
        <li class="nav-item ms-lg-3 mt-3 mt-lg-0"><a class="btn btn-brand w-100" href="{{ route('kontak') }}">Konsultasi Gratis</a></li>
      </ul>
    </div>
  </div>
</nav>
