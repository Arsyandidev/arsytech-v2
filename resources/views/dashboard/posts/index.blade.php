@extends('layouts.dashboard')

@section('title', 'Blog')

@section('actions')
  <a href="{{ route('dashboard.blog.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg me-1"></i> <span class="d-none d-sm-inline">Tulis artikel</span></a>
@endsection

@section('content')
<div class="panel">
  <div class="panel-head">
    <div class="seg">
      @foreach (['' => 'Semua', 'terbit' => 'Terbit', 'terjadwal' => 'Terjadwal', 'draf' => 'Draf'] as $value => $label)
        <a @class(['on' => (string) $status === $value]) href="{{ route('dashboard.blog.index', array_filter(['status' => $value, 'q' => request('q')])) }}">{{ $label }}</a>
      @endforeach
    </div>
    <form class="filter-bar" method="get">
      @if ($status)<input type="hidden" name="status" value="{{ $status }}">@endif
      <input type="search" class="form-control form-control-sm" name="q" value="{{ request('q') }}" placeholder="Cari judul artikel…">
    </form>
  </div>

  @if ($posts->isEmpty())
    <div class="empty">
      <div class="ico"><i class="bi bi-journal-text"></i></div>
      @if (request('q') || $status)
        <h3>Tidak ada artikel yang cocok</h3>
        <p class="mb-0">Coba kata kunci lain atau ganti filter status.</p>
      @else
        <h3>Belum ada artikel</h3>
        <p class="mb-3">Mulai dari satu tulisan pendek. Tidak perlu panjang untuk bermanfaat.</p>
        <a href="{{ route('dashboard.blog.create') }}" class="btn btn-brand btn-sm">Tulis artikel</a>
      @endif
    </div>
  @else
    <div class="table-responsive">
      <table class="table dash-table">
        <thead>
          <tr>
            <th>Artikel</th>
            <th>Status</th>
            <th class="text-end">Pembaca</th>
            <th>Tanggal terbit</th>
            <th class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <td>
                <div class="d-flex align-items-center gap-3">
                  @if ($post->coverThumbUrl())
                    <img class="t-thumb" src="{{ $post->coverThumbUrl() }}" alt="">
                  @else
                    <span class="t-thumb"><i class="bi bi-file-earmark-text"></i></span>
                  @endif
                  <div class="min-w-0">
                    <a class="t-title" href="{{ route('dashboard.blog.edit', $post) }}">{{ $post->title }}</a>
                    <div class="t-sub">{{ $post->category ?: 'Tanpa kategori' }} · diubah {{ $post->updated_at->diffForHumans() }}</div>
                  </div>
                </div>
              </td>
              <td>@include('dashboard.posts.status', ['post' => $post])</td>
              <td class="text-end fw-bold" title="Pembaca unik sepanjang waktu (1 IP per hari)">{{ number_format($readers[$post->id] ?? 0, 0, ',', '.') }}</td>
              <td class="text-nowrap t-sub">{{ $post->published_at ? $post->published_at->translatedFormat('d M Y, H.i') : '—' }}</td>
              <td class="text-end text-nowrap">
                <a href="{{ route('blog.show', $post) }}" target="_blank" rel="noopener" class="btn btn-icon btn-soft" title="{{ $post->isPublished() ? 'Lihat di situs' : 'Pratinjau' }}"><i class="bi bi-eye"></i></a>
                <a href="{{ route('dashboard.blog.edit', $post) }}" class="btn btn-icon btn-soft" title="Ubah"><i class="bi bi-pencil"></i></a>
                <form method="post" action="{{ route('dashboard.blog.destroy', $post) }}" class="d-inline" data-confirm="Hapus artikel &quot;{{ $post->title }}&quot;? Artikel yang dihapus tidak bisa dikembalikan.">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-icon btn-soft-danger" title="Hapus"><i class="bi bi-trash3"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @if ($posts->hasPages())
      <div class="panel-foot">{{ $posts->links() }}</div>
    @endif
  @endif
</div>
@endsection
