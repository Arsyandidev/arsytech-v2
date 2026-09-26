@php(app(\App\Support\StructuredData::class)->breadcrumbs($breadcrumbs))
<header class="page-head">
  <div class="container">
    <nav class="crumb" aria-label="Remah roti"><a href="{{ route('home') }}">Beranda</a>@foreach ($breadcrumbs as $label => $link)<span class="sepx">/</span>@if ($link)<a href="{{ $link }}">{!! $label !!}</a>@else<span class="now">{!! $label !!}</span>@endif
@endforeach</nav>
    <h1>{!! $title !!}</h1>
    <p class="ph-sub">{!! $subtitle !!}</p>
  </div>
</header>
