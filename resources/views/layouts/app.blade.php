<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="theme-color" content="#A90E14">

<title>@yield('title')</title>
<meta name="description" content="@yield('description')">
<link rel="canonical" href="{{ url()->current() }}">

<meta property="og:type" content="@yield('og_type', 'website')">
<meta property="og:site_name" content="{{ config('arsytech.name') }}">
<meta property="og:locale" content="id_ID">
<meta property="og:title" content="@yield('title')">
<meta property="og:description" content="@yield('description')">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta name="twitter:card" content="summary_large_image">

<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="{{ asset('assets/css/arsytech.css') }}" rel="stylesheet">
</head>
<body id="top">
<a class="skip-link" href="#main">Lompat ke konten utama</a>
@include('layouts.components.topbar')
@include('layouts.components.navbar')
<main id="main">
@yield('content')
</main>
@include('layouts.components.footer')
<script type="application/ld+json">
{!! app(\App\Support\StructuredData::class)->toJson() !!}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/arsytech.js') }}"></script>
@stack('scripts')
</body>
</html>
