@if ($post->isPublished())
  <span class="badge-status s-live">Terbit</span>
@elseif ($post->isScheduled())
  <span class="badge-status s-sched" title="{{ $post->published_at->translatedFormat('d M Y, H.i') }}">Terjadwal</span>
@else
  <span class="badge-status s-draft">Draf</span>
@endif
