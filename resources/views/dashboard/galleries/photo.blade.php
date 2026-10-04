<div class="photo-card" data-photo-id="{{ $photo->id }}" data-update-url="{{ route('dashboard.foto.update', $photo) }}" data-delete-url="{{ route('dashboard.foto.destroy', $photo) }}">
  <div class="thumb">
    @if ($photo->isVideo())
      <video src="{{ $photo->url() }}" controls playsinline preload="metadata" aria-label="Pratinjau video"></video>
      <span class="media-kind"><i class="bi bi-play-circle-fill"></i> Video</span>
    @else
      <img src="{{ $photo->thumbUrl() }}" alt="" loading="lazy">
    @endif
    <span class="handle" title="Seret untuk mengubah urutan"><i class="bi bi-grip-vertical"></i></span>
    <div class="tools">
      <button type="button" class="set-cover" data-set-cover title="Jadikan sampul"><i class="bi bi-star"></i></button>
      <button type="button" data-delete-photo title="Hapus media"><i class="bi bi-trash3"></i></button>
    </div>
    <span class="cover-tag">Sampul</span>
  </div>
  <textarea class="form-control" rows="2" maxlength="500" placeholder="Tulis keterangan media…" data-caption>{{ $photo->caption }}</textarea>
  <span class="save-state" data-save-state></span>
</div>
