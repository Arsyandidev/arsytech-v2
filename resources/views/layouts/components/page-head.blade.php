@php(app(\App\Support\StructuredData::class)->breadcrumbs($breadcrumbs))
<header class="page-head">
  <div class="container">
    @isset($back)
    <div class="ph-top">
    @endisset
    <nav class="crumb" aria-label="Remah roti"><a href="{{ route('home') }}">Beranda</a>@foreach ($breadcrumbs as $label => $link)<span class="sepx">/</span>@if ($link)<a href="{{ $link }}">{!! $label !!}</a>@else<span class="now">{!! $label !!}</span>@endif
@endforeach</nav>
    @isset($back)
      <a class="ph-back" href="{{ $back }}"><i class="bi bi-arrow-left-circle"></i> {{ $backLabel ?? 'Kembali ke daftar' }}</a>
    </div>
    @endisset
    <h1>{!! $title !!}</h1>
    @isset($meta)
    <div class="ph-meta">{!! $meta !!}</div>
    @endisset
    @isset($subtitle)
    <p class="ph-sub">{!! $subtitle !!}</p>
    @endisset
  </div>
</header>
