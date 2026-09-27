<article class="bcard">
  <a class="bcard-img" href="{{ route('blog.show', $post) }}" tabindex="-1" aria-hidden="true">
    @if ($post->coverThumbUrl())
      <img src="{{ $post->coverThumbUrl() }}" alt="" loading="lazy">
    @else
      <span class="bcard-ph">@include('layouts.components.brand-mark', ['color' => '#E4545A'])</span>
    @endif
  </a>
  <div class="bcard-body">
    @if ($post->category)
      <a class="post-cat" href="{{ route('blog.index', ['kategori' => $post->category]) }}">{{ $post->category }}</a>
    @endif
    <h3><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h3>
    <p>{{ \Illuminate\Support\Str::limit($post->summary(), 140) }}</p>
    <div class="post-meta">
      <span>{{ $post->published_at->translatedFormat('d M Y') }}</span>
      <span>{{ $post->readingMinutes() }} menit baca</span>
    </div>
  </div>
</article>
