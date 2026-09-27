<div class="photo-card" data-photo-id="{{ $photo->id }}" data-update-url="{{ route('dashboard.foto.update', $photo) }}" data-delete-url="{{ route('dashboard.foto.destroy', $photo) }}">
  <div class="thumb">
    <img src="{{ $photo->thumbUrl() }}" alt="" loading="lazy">
    <span class="handle" title="Seret untuk mengubah urutan"><i class="bi bi-grip-vertical"></i></span>
    <div class="tools">
      <button type="button" class="set-cover" data-set-cover title="Jadikan sampul"><i class="bi bi-star"></i></button>
      <button type="button" data-delete-photo title="Hapus foto"><i class="bi bi-trash3"></i></button>
    </div>
    <span class="cover-tag">Sampul</span>
  </div>
  <textarea class="form-control" rows="2" maxlength="500" placeholder="Tulis keterangan foto…" data-caption>{{ $photo->caption }}</textarea>
  <span class="save-state" data-save-state></span>
</div>
