<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<meta name="theme-color" content="#A90E14">
<title>Masuk | Arsytech</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="{{ \App\Support\Asset::url('assets/css/arsytech.css') }}" rel="stylesheet">
<link href="{{ \App\Support\Asset::url('assets/css/dashboard.css') }}" rel="stylesheet">
</head>
<body class="auth-body">
<main class="auth-wrap">
  <div class="auth-side">
    <a class="navbar-brand" href="{{ route('home') }}" aria-label="Arsytech — beranda">
      <img src="{{ asset('assets/img/logo-white.png') }}" alt="Arsytech" style="height:2rem">
    </a>
    <div>
      <h1>Ruang kerja tim Arsytech</h1>
      <p>Tempat mengelola artikel blog dan dokumentasi galeri yang tampil di arsytech.id.</p>
    </div>
    <small>&copy; {{ date('Y') }} Arsytech Nawasena Zetta</small>
  </div>
  <div class="auth-main">
    <div class="auth-card">
      <h2>Masuk</h2>
      <p class="text-muted-2">Gunakan akun internal yang sudah diberikan kepada Anda.</p>

      @if (session('status'))
        <div class="alert alert-success py-2 small">{{ session('status') }}</div>
      @endif

      <form method="post" action="{{ route('login.store') }}" class="mt-4" novalidate>
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) id="email" name="email" value="{{ old('email') }}" autocomplete="username" required autofocus>
          @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group has-validation">
            <input type="password" @class(['form-control', 'is-invalid' => $errors->has('password')]) id="password" name="password" autocomplete="current-password" required>
            <button class="btn btn-outline-secondary" type="button" data-toggle-password="#password" aria-label="Tampilkan password"><i class="bi bi-eye"></i></button>
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" type="checkbox" id="remember" name="remember" value="1" @checked(old('remember'))>
          <label class="form-check-label" for="remember">Ingat saya di perangkat ini</label>
        </div>
        <button type="submit" class="btn btn-brand w-100 btn-lg">Masuk</button>
      </form>
      <a href="{{ route('home') }}" class="auth-back"><i class="bi bi-arrow-left"></i> Kembali ke situs</a>
    </div>
  </div>
</main>
<script>
document.querySelectorAll('[data-toggle-password]').forEach(function (btn) {
  btn.addEventListener('click', function () {
    var input = document.querySelector(btn.dataset.togglePassword);
    var show = input.type === 'password';
    input.type = show ? 'text' : 'password';
    btn.innerHTML = show ? '<i class="bi bi-eye-slash"></i>' : '<i class="bi bi-eye"></i>';
  });
});
</script>
</body>
</html>
