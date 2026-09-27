@extends('layouts.dashboard')

@section('title', 'Akun saya')

@section('content')
<div class="row">
  <div class="col-xl-7">
    <form method="post" action="{{ route('dashboard.akun.update') }}" class="panel" novalidate>
      @csrf
      @method('PUT')
      <div class="panel-head"><h2>Profil</h2></div>
      <div class="panel-body">
        <div class="row g-3">
          <div class="col-md-6">
            <label for="name" class="form-label">Nama</label>
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" value="{{ old('name', $user->name) }}" maxlength="100" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" @class(['form-control', 'is-invalid' => $errors->has('email')]) id="email" name="email" value="{{ old('email', $user->email) }}" maxlength="150" required>
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
        </div>
      </div>
      <div class="panel-head border-top"><h2>Ganti password</h2><span class="small text-muted-2">Kosongkan kalau tidak ingin mengganti.</span></div>
      <div class="panel-body">
        <div class="row g-3">
          <div class="col-12">
            <label for="current_password" class="form-label">Password saat ini</label>
            <input type="password" @class(['form-control', 'is-invalid' => $errors->has('current_password')]) id="current_password" name="current_password" autocomplete="current-password">
            @error('current_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="col-md-6">
            <label for="password" class="form-label">Password baru</label>
            <input type="password" @class(['form-control', 'is-invalid' => $errors->has('password')]) id="password" name="password" autocomplete="new-password">
            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            <div class="form-hint">Minimal 8 karakter.</div>
          </div>
          <div class="col-md-6">
            <label for="password_confirmation" class="form-label">Ulangi password baru</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
          </div>
        </div>
      </div>
      <div class="panel-foot">
        <button type="submit" class="btn btn-brand">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection
