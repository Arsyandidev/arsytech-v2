<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="theme-color" content="#0E1216">
<title>@yield('title') | Dashboard Arsytech</title>
<link rel="icon" type="image/png" height="528" width="528" href="{{ asset('assets/img/favicon.png') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
@stack('styles')
<link href="{{ \App\Support\Asset::url('assets/css/arsytech.css') }}" rel="stylesheet">
<link href="{{ \App\Support\Asset::url('assets/css/dashboard.css') }}" rel="stylesheet">
</head>
<body class="dash-body">
<aside class="dash-side" id="dashSide">
  <a class="navbar-brand" href="{{ route('dashboard.index') }}" aria-label="Dashboard Arsytech">
    <img src="{{ asset('assets/img/logo-white.png') }}" alt="Arsytech" style="height:2rem">
  </a>
  <ul class="dash-nav">
    <li><a @class(['active' => request()->routeIs('dashboard.index')]) href="{{ route('dashboard.index') }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
    <li class="label">Konten</li>
    <li><a @class(['active' => request()->routeIs('dashboard.blog.*')]) href="{{ route('dashboard.blog.index') }}"><i class="bi bi-journal-text"></i> Blog</a></li>
    <li><a @class(['active' => request()->routeIs('dashboard.galeri.*')]) href="{{ route('dashboard.galeri.index') }}"><i class="bi bi-images"></i> Galeri</a></li>
    <li class="label">Lainnya</li>
    <li><a @class(['active' => request()->routeIs('dashboard.akun')]) href="{{ route('dashboard.akun') }}"><i class="bi bi-person-gear"></i> Akun saya</a></li>
    <li><a href="{{ route('home') }}" target="_blank" rel="noopener"><i class="bi bi-box-arrow-up-right"></i> Lihat situs</a></li>
  </ul>
  <div class="dash-side-foot">
    <div class="dash-user">
      <span class="dash-avatar">{{ \Illuminate\Support\Str::of(auth()->user()->name)->explode(' ')->take(2)->map(fn ($part) => mb_substr($part, 0, 1))->join('') }}</span>
      <div class="min-w-0">
        <div class="nm">{{ auth()->user()->name }}</div>
        <div class="em">{{ auth()->user()->email }}</div>
      </div>
    </div>
    <form method="post" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="dash-logout"><i class="bi bi-box-arrow-left"></i> Keluar</button>
    </form>
  </div>
</aside>
<div class="dash-backdrop" data-side-close></div>

<div class="dash-main">
  <header class="dash-top">
    <button class="dash-toggle" type="button" data-side-toggle aria-label="Buka menu"><i class="bi bi-list"></i></button>
    <div class="flex-grow-1 min-w-0">
      @hasSection('crumbs')
        <div class="crumbs">@yield('crumbs')</div>
      @endif
      <h1>@yield('title')</h1>
    </div>
    @yield('actions')
  </header>
  <main class="dash-content">
    @yield('content')
  </main>
</div>

<div class="toast-wrap" id="toasts">
  @if (session('success'))
    <div class="toast-x" role="status"><i class="bi bi-check-circle-fill"></i><div>{{ session('success') }}</div></div>
  @endif
  @if ($errors->any())
    <div class="toast-x err" role="alert"><i class="bi bi-exclamation-circle-fill"></i><div>Ada isian yang perlu diperbaiki. Cek kolom yang ditandai merah.</div></div>
  @endif
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:var(--r)">
      <div class="modal-body p-4">
        <div class="ico" style="background:#FEF2F2;border-color:#FECACA;color:#B91C1C"><i class="bi bi-trash3"></i></div>
        <h2 class="h5" data-confirm-title>Hapus data ini?</h2>
        <p class="text-muted-2 mb-0" data-confirm-text>Data yang sudah dihapus tidak bisa dikembalikan.</p>
      </div>
      <div class="modal-footer border-0 pt-0 px-4 pb-4">
        <button type="button" class="btn btn-soft" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" data-confirm-ok>Ya, hapus</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
<script src="{{ \App\Support\Asset::url('assets/js/dashboard.js') }}"></script>
</body>
</html>
