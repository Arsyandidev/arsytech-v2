@extends('layouts.dashboard')

@section('title', $post->exists ? 'Ubah artikel' : 'Tulis artikel')

@section('crumbs')
  <a href="{{ route('dashboard.blog.index') }}">Blog</a> / {{ $post->exists ? \Illuminate\Support\Str::limit($post->title, 40) : 'Artikel baru' }}
@endsection

@section('actions')
  @if ($post->exists)
    <a href="{{ route('blog.show', $post) }}" target="_blank" rel="noopener" class="btn btn-soft d-none d-sm-inline-flex"><i class="bi bi-eye me-1"></i> {{ $post->isPublished() ? 'Lihat' : 'Pratinjau' }}</a>
  @endif
@endsection

@section('content')
@php($status = old('status', $post->published_at ? 'terbit' : 'draf'))
<form method="post" action="{{ $post->exists ? route('dashboard.blog.update', $post) : route('dashboard.blog.store') }}" enctype="multipart/form-data" novalidate>
  @csrf
  @if ($post->exists)
    @method('PUT')
  @endif
  <div class="row g-4">
    <div class="col-xl-8">
      <div class="panel">
        <div class="panel-body">
          <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" @class(['form-control form-control-lg', 'is-invalid' => $errors->has('title')]) id="title" name="title" value="{{ old('title', $post->title) }}" maxlength="200" placeholder="Misalnya: Lima tanda gudang Anda butuh WMS" data-slug-source="#slug" required>
            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label">Alamat artikel</label>
            <div @class(['slug-field', 'is-invalid' => $errors->has('slug')])>
              <span>{{ url('/blog') }}/</span>
              <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" maxlength="200" data-slug-locked="{{ $post->exists ? '1' : '' }}">
            </div>
            @error('slug')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
            <div class="form-hint">Terisi otomatis dari judul. Sebaiknya jangan diubah setelah artikel terbit.</div>
          </div>
          <div class="mb-3">
            <label for="excerpt" class="form-label">Ringkasan <span class="text-muted-2 fw-normal">(opsional)</span></label>
            <textarea @class(['form-control', 'is-invalid' => $errors->has('excerpt')]) id="excerpt" name="excerpt" rows="2" maxlength="300" placeholder="Satu atau dua kalimat yang muncul di daftar artikel dan saat dibagikan.">{{ old('excerpt', $post->excerpt) }}</textarea>
            @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
            <div class="form-hint">Kalau dikosongkan, kami ambil otomatis dari paragraf pertama.</div>
          </div>
          <div>
            <label for="body" class="form-label">Isi artikel</label>
            @error('body')<div class="text-danger small mb-2">{{ $message }}</div>@enderror
            <textarea id="body" name="body" rows="18" data-editor data-upload-url="{{ route('dashboard.blog.gambar') }}" data-content-css="{{ \App\Support\Asset::url('assets/css/editor-content.css') }}">{{ old('body', $post->body) }}</textarea>
            <div class="form-hint">Atur ukuran huruf, perataan teks, judul, daftar, tautan, tabel, dan gambar lewat toolbar. Gambar juga bisa ditempel atau di-drag langsung ke editor.</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="panel mb-4">
        <div class="panel-head"><h2>Publikasi</h2></div>
        <div class="panel-body">
          <label class="status-opt">
            <span class="d-flex gap-2">
              <input class="form-check-input" type="radio" name="status" value="draf" @checked($status === 'draf')>
              <span><strong>Simpan sebagai draf</strong><small>Belum tampil di situs.</small></span>
            </span>
          </label>
          <label class="status-opt">
            <span class="d-flex gap-2">
              <input class="form-check-input" type="radio" name="status" value="terbit" @checked($status === 'terbit')>
              <span><strong>Terbitkan</strong><small>Tampil di situs sesuai tanggal terbit.</small></span>
            </span>
          </label>
          <div class="mt-3" data-show-when="terbit">
            <label for="published_at" class="form-label">Tanggal terbit</label>
            <input type="datetime-local" @class(['form-control', 'is-invalid' => $errors->has('published_at')]) id="published_at" name="published_at" value="{{ old('published_at', optional($post->published_at ?? now())->format('Y-m-d\TH:i')) }}">
            @error('published_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
            <div class="form-hint">Isi tanggal ke depan untuk menjadwalkan artikel.</div>
          </div>
        </div>
        <div class="panel-foot d-flex gap-2">
          <button type="submit" class="btn btn-brand flex-grow-1">{{ $post->exists ? 'Simpan perubahan' : 'Simpan artikel' }}</button>
        </div>
      </div>

      <div class="panel mb-4">
        <div class="panel-head"><h2>Gambar sampul</h2></div>
        <div class="panel-body">
          <label class="cover-drop" data-cover-drop>
            @if ($post->coverUrl())
              <img src="{{ $post->coverUrl() }}" alt="" data-cover-preview>
            @else
              <img src="" alt="" data-cover-preview hidden>
            @endif
            <span class="ph" @if ($post->coverUrl()) hidden @endif><i class="bi bi-image"></i>Klik atau seret gambar ke sini<br><small>JPG, PNG, atau WebP. Rasio 16:9 paling pas.</small></span>
            <input type="file" name="cover" accept="image/jpeg,image/png,image/webp" data-resize="1600">
          </label>
          @error('cover')<div class="text-danger small mt-2">{{ $message }}</div>@enderror
          @if ($post->coverUrl())
            <div class="form-check mt-3">
              <input class="form-check-input" type="checkbox" id="remove_cover" name="remove_cover" value="1">
              <label class="form-check-label small" for="remove_cover">Hapus gambar sampul</label>
            </div>
          @endif
        </div>
      </div>

      <div class="panel mb-4">
        <div class="panel-head"><h2>Kategori</h2></div>
        <div class="panel-body">
          <input type="text" @class(['form-control', 'is-invalid' => $errors->has('category')]) name="category" value="{{ old('category', $post->category) }}" list="categoryList" maxlength="60" placeholder="Misalnya: Tips, Studi Kasus, Kabar">
          <datalist id="categoryList">
            @foreach ($categories as $category)
              <option value="{{ $category }}">
            @endforeach
          </datalist>
          @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
          <div class="form-hint">Pilih yang sudah ada atau ketik kategori baru.</div>
        </div>
      </div>

      @isset($readerStats)
        <div class="panel mb-4">
          <div class="panel-head"><h2>Statistik pembaca</h2><span class="small text-muted-2">Hanya terlihat di dashboard</span></div>
          <div class="panel-body">
            <div class="row g-3 text-center">
              <div class="col-4"><div class="dt-val">{{ number_format($readerStats['readers'], 0, ',', '.') }}</div><div class="dt-label">Total pembaca</div></div>
              <div class="col-4"><div class="dt-val">{{ number_format($readerStats['readers_30'], 0, ',', '.') }}</div><div class="dt-label">30 hari terakhir</div></div>
              <div class="col-4"><div class="dt-val">{{ number_format($readerStats['views'], 0, ',', '.') }}</div><div class="dt-label">Tayangan</div></div>
            </div>
            <div class="small text-muted-2 mt-3">
              @if ($readerStats['last_read'])
                Terakhir dibaca {{ \Illuminate\Support\Carbon::parse($readerStats['last_read'])->diffForHumans() }}.
              @else
                Belum ada yang membaca artikel ini.
              @endif
            </div>
          </div>
        </div>
      @endisset

      @if ($post->exists)
        <div class="panel">
          <div class="panel-body d-flex align-items-center justify-content-between gap-3">
            <div class="small text-muted-2">Dibuat {{ $post->created_at->translatedFormat('d M Y') }}@if ($post->author) oleh {{ $post->author->name }}@endif</div>
            <button type="button" class="btn btn-sm btn-soft-danger" data-delete-form="#deletePost"><i class="bi bi-trash3 me-1"></i> Hapus</button>
          </div>
        </div>
      @endif
    </div>
  </div>
</form>

@if ($post->exists)
  <form method="post" action="{{ route('dashboard.blog.destroy', $post) }}" id="deletePost" data-confirm="Hapus artikel ini? Artikel yang dihapus tidak bisa dikembalikan.">
    @csrf
    @method('DELETE')
  </form>
@endif
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@7.6.0/tinymce.min.js" referrerpolicy="origin"></script>
@endpush
