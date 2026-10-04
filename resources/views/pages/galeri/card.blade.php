<a class="gcard" href="{{ route('galeri.show', $gallery) }}">
  <span class="gcard-img">
    @if ($gallery->cover)
      @if ($gallery->cover->isVideo())
        <span class="media-poster-placeholder"><i class="bi bi-play-circle"></i><span>Video</span></span>
      @else
        <img src="{{ $gallery->cover->thumbUrl() }}" alt="{{ $gallery->title }}" loading="lazy">
      @endif
    @endif
    @isset($gallery->photos_count)
      <span class="gcard-count"><i class="bi bi-images"></i> {{ $gallery->photos_count }}</span>
    @endisset
  </span>
  <span class="gcard-title">{{ $gallery->title }}</span>
  <span class="gcard-date">{{ $gallery->displayDate()->translatedFormat('d F Y') }}</span>
</a>
