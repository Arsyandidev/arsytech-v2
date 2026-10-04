@extends('layouts.dashboard')

@section('title', 'Klien')

@section('actions')
  <a href="{{ route('dashboard.klien.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg me-1"></i> <span class="d-none d-sm-inline">Tambah klien</span></a>
@endsection

@section('content')
<p class="text-muted-2 mb-4">Logo yang berstatus <strong>Tayang</strong> muncul di beranda, tepat di bawah bagian pembuka, sesuai urutan di bawah. Pastikan setiap klien sudah mengizinkan logonya ditampilkan.</p>

@if ($clients->isEmpty())
  <div class="panel">
    <div class="empty">
      <div class="ico"><i class="bi bi-buildings"></i></div>
      <h3>Belum ada logo klien</h3>
      <p class="mb-3">Selama belum ada logo yang tayang, bagian logo klien di beranda otomatis disembunyikan.</p>
      <a href="{{ route('dashboard.klien.create') }}" class="btn btn-brand btn-sm">Tambah klien</a>
    </div>
  </div>
@else
  <div class="row g-4">
    @foreach ($clients as $client)
      <div class="col-sm-6 col-xl-4 col-xxl-3">
        <div class="album-card">
          <a class="client-logo-box" href="{{ route('dashboard.klien.edit', $client) }}">
            <img src="{{ $client->logoUrl() }}" alt="{{ $client->name }}" loading="lazy">
            <span class="count">#{{ $client->sort_order }}</span>
          </a>
          <div class="bd">
            <span @class(['badge-status', 's-live' => $client->is_published, 's-draft' => ! $client->is_published])>{{ $client->is_published ? 'Tayang' : 'Disembunyikan' }}</span>
            <h3><a class="t-title text-decoration-none" style="color:var(--ink)" href="{{ route('dashboard.klien.edit', $client) }}">{{ $client->name }}</a></h3>
            @if ($client->project)
              <div class="small text-muted-2">{{ $client->project }}</div>
            @endif
            @if ($client->website)
              <a href="{{ $client->website }}" target="_blank" rel="noopener" class="small text-decoration-none d-inline-block mt-1 text-truncate" style="max-width:100%">{{ preg_replace('#^https?://(www\.)?#', '', rtrim($client->website, '/')) }} <i class="bi bi-box-arrow-up-right"></i></a>
            @endif
          </div>
          <div class="ft">
            <a href="{{ route('dashboard.klien.edit', $client) }}" class="btn btn-icon btn-soft" title="Ubah"><i class="bi bi-pencil"></i></a>
            <form method="post" action="{{ route('dashboard.klien.destroy', $client) }}" data-confirm="Hapus klien &quot;{{ $client->name }}&quot; beserta logonya?">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-icon btn-soft-danger" title="Hapus"><i class="bi bi-trash3"></i></button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endif
@endsection
