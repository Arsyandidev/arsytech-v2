@extends('layouts.dashboard')

@section('title', $client->exists ? 'Ubah klien' : 'Tambah klien')

@section('crumbs')
  <a href="{{ route('dashboard.klien.index') }}">Klien</a> / {{ $client->exists ? $client->name : 'Klien baru' }}
@endsection

@section('content')
<form method="post" action="{{ $client->exists ? route('dashboard.klien.update', $client) : route('dashboard.klien.store') }}" enctype="multipart/form-data" novalidate>
  @csrf
  @if ($client->exists)
    @method('PUT')
  @endif
  <div class="row g-4">
    <div class="col-xl-7">
      <div class="panel">
        <div class="panel-head"><h2>Data klien</h2></div>
        <div class="panel-body">
          <div class="mb-3">
            <label for="name" class="form-label">Nama klien</label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" value="{{ old('name', $client->name) }}" maxlength="150" placeholder="Misalnya: PT Sumber Makmur" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            <div class="form-hint">Dipakai sebagai teks alternatif logo dan tooltip di beranda.</div>
          </div>
          <div class="mb-3">
            <label for="project" class="form-label">Keterangan proyek <span class="text-muted-2 fw-normal">(opsional)</span></label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('project')]) id="project" name="project" value="{{ old('project', $client->project) }}" maxlength="150" placeholder="Misalnya: Katalog B2B & order management">
            @error('project')<div class="invalid-feedback">{{ $message }}</div>@enderror
            <div class="form-hint">Tampil kecil di bawah logo. Kosongkan kalau klien tidak ingin proyeknya disebut.</div>
          </div>
          <div class="mb-3">
            <label for="website" class="form-label">Website <span class="text-muted-2 fw-normal">(opsional)</span></label>
            <input type="url" @class(['form-control', 'is-invalid' => $errors->has('website')]) id="website" name="website" value="{{ old('website', $client->website) }}" maxlength="255" placeholder="https://perusahaan.co.id">
            @error('website')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="row g-3 align-items-end">
            <div class="col-sm-5">
              <label for="sort_order" class="form-label">Urutan</label>
              <input type="number" @class(['form-control', 'is-invalid' => $errors->has('sort_order')]) id="sort_order" name="sort_order" value="{{ old('sort_order', $client->sort_order) }}" min="0" max="9999">
              @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
              <div class="form-hint">Angka kecil tampil lebih dulu.</div>
            </div>
            <div class="col-sm-7">
              <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" role="switch" id="is_published" name="is_published" value="1" @checked(old('is_published', $client->is_published))>
                <label class="form-check-label" for="is_published">Tampilkan di beranda</label>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-foot d-flex flex-wrap gap-2 justify-content-between">
          <button type="submit" class="btn btn-brand">{{ $client->exists ? 'Simpan perubahan' : 'Simpan klien' }}</button>
          @if ($client->exists)
            <button type="button" class="btn btn-soft-danger" data-delete-form="#deleteClient"><i class="bi bi-trash3 me-1"></i> Hapus</button>
          @endif
        </div>
      </div>
    </div>
    <div class="col-xl-5">
      <div class="panel">
        <div class="panel-head"><h2>Logo</h2></div>
        <div class="panel-body">
          <label class="cover-drop logo-drop" data-cover-drop>
            @if ($client->logoUrl())
              <img src="{{ $client->logoUrl() }}" alt="" data-cover-preview>
            @else
              <img src="" alt="" data-cover-preview hidden>
            @endif
            <span class="ph" @if ($client->logoUrl()) hidden @endif><i class="bi bi-image"></i>Klik atau seret logo ke sini<br><small>PNG atau WebP dengan latar transparan paling bagus.</small></span>
            <input type="file" name="logo" accept="image/png,image/jpeg,image/webp" data-preview>
          </label>
          @error('logo')<div class="text-danger small mt-2">{{ $message }}</div>@enderror
          <div class="form-hint mt-3">Di beranda, logo tampil abu-abu dan berwarna saat disorot. Pilih versi logo yang tetap terbaca dalam warna abu-abu. Maksimal 5 MB.</div>
          <div class="logo-preview mt-3">
            <div class="mini-label">Pratinjau di beranda</div>
            <div class="lp-box"><img src="{{ $client->logoUrl() ?? '' }}" alt="" data-strip-preview @if (! $client->logoUrl()) hidden @endif></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

@if ($client->exists)
  <form method="post" action="{{ route('dashboard.klien.destroy', $client) }}" id="deleteClient" data-confirm="Hapus klien ini beserta logonya?">
    @csrf
    @method('DELETE')
  </form>
@endif
@endsection
