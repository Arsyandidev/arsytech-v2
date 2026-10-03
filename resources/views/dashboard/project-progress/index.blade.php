@extends('layouts.dashboard')

@section('title', 'Progres proyek')

@section('actions')
  <a href="{{ route('dashboard.progres.create') }}" class="btn btn-brand"><i class="bi bi-plus-lg me-1"></i> <span class="d-none d-sm-inline">Buat laporan</span></a>
@endsection

@section('content')
<form class="filter-bar mb-4" method="get">
  <input type="search" class="form-control" name="q" value="{{ request('q') }}" placeholder="Cari judul, kode proyek, atau klien...">
</form>

@if ($reports->isEmpty())
  <div class="panel">
    <div class="empty">
      <div class="ico"><i class="bi bi-file-earmark-bar-graph"></i></div>
      @if (request('q'))
        <h3>Tidak ada laporan yang cocok</h3>
        <p class="mb-0">Coba kata kunci lain.</p>
      @else
        <h3>Belum ada laporan progres</h3>
        <p class="mb-3">Buat laporan pertama untuk memudahkan update progress ke klien.</p>
        <a href="{{ route('dashboard.progres.create') }}" class="btn btn-brand btn-sm">Buat laporan</a>
      @endif
    </div>
  </div>
@else
  <div class="panel">
    <div class="table-responsive">
      <table class="table dash-table">
        <thead>
          <tr>
            <th>Laporan</th>
            <th>Klien</th>
            <th class="text-end">Progres</th>
            <th>Tanggal</th>
            <th class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reports as $report)
            <tr>
              <td>
                <a class="t-title" href="{{ route('dashboard.progres.edit', $report) }}">{{ $report->title }}</a>
                <div class="t-sub">
                  {{ $report->project_code ?: 'Tanpa kode proyek' }} · {{ $report->project_name }} · {{ number_format($report->attachments_count ?? 0, 0, ',', '.') }} lampiran
                </div>
              </td>
              <td>{{ $report->client_name }}</td>
              <td class="text-end fw-bold">{{ number_format($report->overall_progress, 0, ',', '.') }}%</td>
              <td class="text-nowrap t-sub">{{ optional($report->report_date)->translatedFormat('d M Y') ?: '—' }}</td>
              <td class="text-end text-nowrap">
                <a href="{{ route('dashboard.progres.pdf', $report) }}" class="btn btn-icon btn-soft" title="Generate PDF"><i class="bi bi-file-earmark-pdf"></i></a>
                <a href="{{ route('dashboard.progres.edit', $report) }}" class="btn btn-icon btn-soft" title="Ubah"><i class="bi bi-pencil"></i></a>
                <form method="post" action="{{ route('dashboard.progres.destroy', $report) }}" class="d-inline" data-confirm="Hapus laporan &quot;{{ $report->title }}&quot;? Data yang dihapus tidak bisa dikembalikan.">
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
    @if ($reports->hasPages())
      <div class="panel-foot">{{ $reports->links() }}</div>
    @endif
  </div>
@endif
@endsection
