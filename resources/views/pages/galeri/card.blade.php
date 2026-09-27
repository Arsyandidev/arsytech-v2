<a class="gcard" href="{{ route('galeri.show', $gallery) }}">
  <span class="gcard-img">
    @if ($gallery->cover)
      <img src="{{ $gallery->cover->thumbUrl() }}" alt="{{ $gallery->title }}" loading="lazy">
    @endif
    @isset($gallery->photos_count)
      <span class="gcard-count"><i class="bi bi-images"></i> {{ $gallery->photos_count }}</span>
    @endisset
  </span>
  <span class="gcard-title">{{ $gallery->title }}</span>
  <span class="gcard-date">{{ $gallery->displayDate()->translatedFormat('d F Y') }}</span>
</a>
