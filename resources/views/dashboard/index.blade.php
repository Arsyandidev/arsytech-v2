@extends('layouts.dashboard')

@section('title', 'Dashboard')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css" rel="stylesheet">
@endpush


@section('content')
@php($fmt = fn ($value, $decimals = 0) => number_format($value, $decimals, ',', '.'))
<div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
  <div>
    <p class="text-muted-2 mb-1">Halo, {{ \Illuminate\Support\Str::before(auth()->user()->name, ' ') }}. Ini performa situs pada <strong>{{ $report->label() }}</strong> ({{ $fmt($report->days) }} hari).</p>
    <p class="small text-muted-2 mb-0">Dibanding periode sebelumnya: {{ $report->previousLabel() }}</p>
    <p class="small text-muted-2 mb-0 mt-1"><i class="bi bi-shield-check me-1"></i>Kunjungan tim tidak dihitung. Tandai perangkat lain (misalnya HP tim) dengan membuka <a href="{{ url('/?internal=1') }}" target="_blank" rel="noopener">{{ preg_replace('#^https?://#', '', url('/?internal=1')) }}</a> sekali di perangkat itu.</p>
  </div>
  <form class="range-picker" method="get" action="{{ route('dashboard.index') }}" data-range-picker>
    <i class="bi bi-calendar3"></i>
    <input type="text" class="form-control" data-range-input data-start="{{ $report->start->toDateString() }}" data-end="{{ $report->end->toDateString() }}" data-max="{{ today()->toDateString() }}" data-max-days="{{ \App\Support\Analytics\Report::MAX_DAYS }}" aria-label="Pilih rentang tanggal" readonly>
    <input type="hidden" name="dari" value="{{ $report->start->toDateString() }}">
    <input type="hidden" name="sampai" value="{{ $report->end->toDateString() }}">
    <i class="bi bi-chevron-down rp-caret"></i>
  </form>
</div>

<div class="today-strip mb-4">
  <div class="ts-item"><span class="ts-label">Pengunjung hari ini</span><span class="ts-val">{{ $fmt($today['visitors']) }}</span></div>
  <div class="ts-item"><span class="ts-label">Tayangan hari ini</span><span class="ts-val">{{ $fmt($today['pageviews']) }}</span></div>
  <div class="ts-item"><span class="ts-label"><span @class(['live-dot', 'on' => $today['active'] > 0])></span>Aktif 5 menit terakhir</span><span class="ts-val">{{ $fmt($today['active']) }}</span></div>
  <div class="ts-item"><span class="ts-label">Menghubungi hari ini</span><span class="ts-val">{{ $fmt($today['conversions']) }}</span></div>
</div>

@unless ($hasData)
  <div class="panel mb-4">
    <div class="empty">
      <div class="ico"><i class="bi bi-graph-up-arrow"></i></div>
      <h3>Data kunjungan mulai dikumpulkan</h3>
      <p class="mb-0">Begitu ada pengunjung yang membuka situs, angka dan grafik di halaman ini terisi otomatis. Kunjungan Anda sendiri saat sedang login tidak ikut dihitung.</p>
    </div>
  </div>
@endunless

<div class="kpi-grid mb-4">
  <div class="kpi-card">
    <div class="kc-top"><span class="kc-label"><i class="bi bi-people"></i> Pengunjung</span></div>
    <div class="kc-val">{{ $fmt($summary['visitors']['value']) }}@include('dashboard.partials.delta', ['change' => $summary['visitors']['change']])</div>
    <div class="kc-sub">Sebelumnya {{ $fmt($summary['visitors']['previous']) }} · 1 IP dihitung 1x per hari</div>
  </div>
  <div class="kpi-card">
    <div class="kc-top"><span class="kc-label"><i class="bi bi-window-stack"></i> Tayangan halaman</span></div>
    <div class="kc-val">{{ $fmt($summary['pageviews']['value']) }}@include('dashboard.partials.delta', ['change' => $summary['pageviews']['change']])</div>
    <div class="kc-sub">1 IP 1x per halaman per hari · {{ $fmt($summary['pages_per_visit']['value'], 1) }} halaman per kunjungan</div>
  </div>
  <div class="kpi-card">
    <div class="kc-top"><span class="kc-label"><i class="bi bi-journal-richtext"></i> Pembaca blog</span></div>
    <div class="kc-val">{{ $fmt($summary['readers']['value']) }}@include('dashboard.partials.delta', ['change' => $summary['readers']['change']])</div>
    <div class="kc-sub">Unik per artikel per hari · hanya tampil di sini</div>
  </div>
  <div class="kpi-card">
    <div class="kc-top"><span class="kc-label"><i class="bi bi-arrow-repeat"></i> Pengunjung kembali</span></div>
    <div class="kc-val">{{ $summary['visitors']['value'] ? $fmt($summary['returning']['value'] / $summary['visitors']['value'] * 100, 1) : 0 }}%@include('dashboard.partials.delta', ['change' => $summary['returning']['change']])</div>
    <div class="kc-sub">{{ $fmt($summary['returning']['value']) }} kembali · {{ $fmt($summary['visitors']['value'] - $summary['returning']['value']) }} baru</div>
  </div>
  <div class="kpi-card kpi-accent">
    <div class="kc-top"><span class="kc-label"><i class="bi bi-chat-dots"></i> Menghubungi</span></div>
    <div class="kc-val">{{ $fmt($summary['conversions']['value']) }}@include('dashboard.partials.delta', ['change' => $summary['conversions']['change']])</div>
    <div class="kc-sub">{{ $fmt($summary['forms']['value']) }} form · {{ $fmt($summary['whatsapp']['value']) }} WhatsApp · konversi {{ $fmt($summary['conversion_rate']['value'], 1) }}%</div>
  </div>
</div>

<div class="panel mb-4">
  <div class="panel-head">
    <div>
      <h2 data-chart-title>Pengunjung per {{ $report->monthly ? 'bulan' : 'hari' }}</h2>
      <div class="small text-muted-2">Arahkan kursor ke batang untuk melihat detail</div>
    </div>
    <div class="d-flex flex-wrap gap-2 align-items-center">
      <div class="seg seg-sm" role="tablist" aria-label="Pilih metrik">
        <a href="#" class="on" data-metric="visitors">Pengunjung</a>
        <a href="#" data-metric="pageviews">Tayangan</a>
        <a href="#" data-metric="readers">Pembaca blog</a>
        <a href="#" data-metric="conversions">Menghubungi</a>
      </div>
      <button class="btn btn-sm btn-soft" type="button" data-bs-toggle="collapse" data-bs-target="#trendTable" aria-expanded="false"><i class="bi bi-table me-1"></i> Tabel</button>
    </div>
  </div>
  <div class="panel-body">
    <div class="chart-box"><canvas id="trendChart" aria-label="Grafik tren kunjungan" role="img"></canvas></div>
    <div class="collapse mt-3" id="trendTable">
      <div class="table-responsive" style="max-height:320px">
        <table class="table table-sm dash-table mb-0">
          <thead><tr><th>{{ $report->monthly ? 'Bulan' : 'Tanggal' }}</th><th class="text-end">Pengunjung</th><th class="text-end">Tayangan</th><th class="text-end">Pembaca blog</th><th class="text-end">Menghubungi</th></tr></thead>
          <tbody>
            @foreach (array_reverse($trend) as $row)
              <tr><td>{{ $row['full'] }}</td><td class="text-end">{{ $fmt($row['visitors']) }}</td><td class="text-end">{{ $fmt($row['pageviews']) }}</td><td class="text-end">{{ $fmt($row['readers']) }}</td><td class="text-end">{{ $fmt($row['conversions']) }}</td></tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row g-4 mb-4">
  <div class="col-xl-7">
    <div class="panel h-100">
      <div class="panel-head"><h2>Halaman paling sering dibuka</h2><span class="small text-muted-2">1 IP dihitung 1x per halaman per hari</span></div>
      @if ($topPages->isEmpty())
        <div class="empty py-4"><p class="mb-0">Belum ada data pada periode ini.</p></div>
      @else
        @php($maxViews = max(1, $topPages->max('views')))
        <ul class="bar-list px-3 pt-3 pb-2">
          @foreach ($topPages as $page)
            <li title="{{ $page['path'] }}">
              <div class="bl-head">
                <span class="bl-name">{{ $page['title'] }} <small class="text-muted-2 d-none d-sm-inline">{{ $page['path'] }}</small></span>
                <span class="bl-val">{{ $fmt($page['views']) }} <small>kali</small></span>
              </div>
              <div class="bl-track"><span style="width:{{ max(2, round($page['views'] / $maxViews * 100, 1)) }}%"></span></div>
            </li>
          @endforeach
        </ul>
      @endif
    </div>
  </div>
  <div class="col-xl-5">
    <div class="panel h-100">
      <div class="panel-head"><h2>Sumber kunjungan</h2><span class="small text-muted-2">Dari halaman pertama yang dibuka</span></div>
      <div class="px-3 pt-3 pb-2">
        @if ($sources->isEmpty())
          <div class="empty py-4"><p class="mb-0">Belum ada data pada periode ini.</p></div>
        @else
          @include('dashboard.partials.bar-list', ['items' => $sources])
          <p class="small text-muted-2 mt-2 mb-1"><i class="bi bi-info-circle me-1"></i>"Langsung" berarti alamat diketik sendiri, dari bookmark, atau dari aplikasi yang tidak mengirim asal kunjungan (sering terjadi pada link WhatsApp).</p>
        @endif
      </div>
    </div>
  </div>
</div>

<div class="row g-4 mb-4">
  <div class="col-xl-7">
    <div class="panel h-100">
      <div class="panel-head">
        <h2>Artikel paling banyak dibaca</h2>
        <a href="{{ route('dashboard.blog.index') }}" class="small fw-bold text-decoration-none">Semua artikel <i class="bi bi-arrow-right"></i></a>
      </div>
      @if ($topPosts->isEmpty())
        <div class="empty py-4"><p class="mb-0">Belum ada pembaca blog pada periode ini.</p></div>
      @else
        <div class="table-responsive">
          <table class="table dash-table">
            <thead><tr><th>Artikel</th><th class="text-end">Pembaca</th><th class="text-end">Tayangan</th><th class="text-end">Total pembaca</th></tr></thead>
            <tbody>
              @foreach ($topPosts as $row)
                <tr>
                  <td>
                    <div class="d-flex align-items-center gap-3">
                      @if ($row['post']->coverThumbUrl())
                        <img class="t-thumb" src="{{ $row['post']->coverThumbUrl() }}" alt="">
                      @else
                        <span class="t-thumb"><i class="bi bi-file-earmark-text"></i></span>
                      @endif
                      <div class="min-w-0">
                        <a class="t-title" href="{{ route('dashboard.blog.edit', $row['post']) }}">{{ $row['post']->title }}</a>
                        <div class="t-sub">{{ $row['post']->category ?: 'Tanpa kategori' }}</div>
                      </div>
                    </div>
                  </td>
                  <td class="text-end fw-bold">{{ $fmt($row['readers']) }}</td>
                  <td class="text-end">{{ $fmt($row['views']) }}</td>
                  <td class="text-end text-muted-2">{{ $fmt($row['all_time']) }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </div>
  <div class="col-xl-5">
    <div class="panel h-100">
      <div class="panel-head"><h2>Perangkat &amp; browser</h2></div>
      <div class="px-3 pt-3 pb-2">
        <div class="device-tiles mb-3">
          @foreach (['Mobile' => 'bi-phone', 'Desktop' => 'bi-laptop', 'Tablet' => 'bi-tablet'] as $device => $icon)
            @php($row = $devices->firstWhere('name', $device))
            <div class="dt"><i class="bi {{ $icon }}"></i><span class="dt-val">{{ $row ? $fmt($row['share'], 1) : 0 }}%</span><span class="dt-label">{{ $device }}</span></div>
          @endforeach
        </div>
        <div class="row g-3">
          <div class="col-sm-6 col-xl-12 col-xxl-6"><div class="mini-label">Browser</div>@include('dashboard.partials.bar-list', ['items' => $browsers])</div>
          <div class="col-sm-6 col-xl-12 col-xxl-6"><div class="mini-label">Sistem operasi</div>@include('dashboard.partials.bar-list', ['items' => $systems])</div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row g-4 mb-4">
  <div class="col-xl-7">
    <div class="panel h-100">
      <div class="panel-head"><h2>Jam ramai pengunjung</h2><span class="small text-muted-2">Berdasarkan jam pertama kali datang (WIB)</span></div>
      <div class="panel-body"><div class="chart-box chart-box-sm"><canvas id="hourChart" aria-label="Grafik jam ramai" role="img"></canvas></div></div>
    </div>
  </div>
  <div class="col-xl-5">
    <div class="panel h-100">
      <div class="panel-head"><h2>Klik tombol ajakan</h2><span class="small text-muted-2">Jumlah orang yang mengklik</span></div>
      @if ($clicks->isEmpty())
        <div class="empty py-4"><p class="mb-0">Belum ada yang mengklik tombol WhatsApp atau konsultasi pada periode ini.</p></div>
      @else
        <div class="table-responsive">
          <table class="table dash-table mb-0">
            <thead><tr><th>Tombol</th><th>Di halaman</th><th class="text-end">Orang</th></tr></thead>
            <tbody>
              @foreach ($clicks as $click)
                <tr title="{{ $fmt($click['visitors']) }} orang, {{ $fmt($click['clicks']) }} klik">
                  <td class="text-nowrap"><i @class(['bi me-1', 'bi-whatsapp text-success' => $click['type'] === 'whatsapp', 'bi-chat-square-text' => $click['type'] !== 'whatsapp'])></i>{{ $click['type'] === 'whatsapp' ? 'WhatsApp' : 'Konsultasi' }}</td>
                  <td><span class="t-cell-title" style="max-width:190px" title="{{ $click['page'] }} ({{ $click['path'] }})">{{ $click['page'] }}</span></td>
                  <td class="text-end fw-bold">{{ $fmt($click['visitors']) }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </div>
</div>

<div class="panel mb-5">
  <div class="panel-head">
    <h2>Pengunjung terbaru</h2>
    <span class="small text-muted-2"><i class="bi bi-shield-lock me-1"></i>IP disamarkan untuk menjaga privasi</span>
  </div>
  @if ($recentVisits->isEmpty())
    <div class="empty py-4"><p class="mb-0">Belum ada pengunjung.</p></div>
  @else
    <div class="table-responsive">
      <table class="table dash-table">
        <thead><tr><th>IP</th><th>Terakhir aktif</th><th>Halaman masuk</th><th class="text-end">Halaman</th><th>Sumber</th><th>Perangkat</th><th>Status</th></tr></thead>
        <tbody>
          @foreach ($recentVisits as $row)
            @php($visit = $row['visit'])
            <tr>
              <td class="font-monospace small">{{ $visit->ip_masked ?? '—' }}</td>
              <td class="text-nowrap"><span title="{{ $visit->last_seen_at->translatedFormat('d M Y, H.i') }}">{{ $visit->last_seen_at->diffForHumans() }}</span><div class="t-sub">datang {{ $visit->first_seen_at->format('H.i') }}</div></td>
              <td><span class="t-cell-title">{{ $row['landing'] }}</span></td>
              <td class="text-end">{{ $visit->hits }}</td>
              <td>{{ $visit->source }}</td>
              <td class="text-nowrap"><i @class(['bi me-1', 'bi-phone' => $visit->device === 'Mobile', 'bi-laptop' => $visit->device === 'Desktop', 'bi-tablet' => $visit->device === 'Tablet'])></i>{{ $visit->browser }}<div class="t-sub">{{ $visit->os }}</div></td>
              <td class="text-nowrap">
                @if ($visit->converted_at)
                  <span class="badge-status s-live">Kirim form</span>
                @elseif ($visit->whatsapp_at)
                  <span class="badge-status s-live">Klik WhatsApp</span>
                @elseif ($visit->is_returning)
                  <span class="badge-status s-sched">Kembali</span>
                @else
                  <span class="badge-status s-draft">Baru</span>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
</div>

<div class="d-flex align-items-center justify-content-between mb-3">
  <h2 class="h5 m-0">Konten situs</h2>
  <a href="{{ route('dashboard.blog.create') }}" class="btn btn-brand btn-sm"><i class="bi bi-plus-lg me-1"></i> Tulis artikel</a>
</div>
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-xl-3"><div class="stat-card"><div class="ico ico-sm"><i class="bi bi-journal-check"></i></div><div><div class="v">{{ $stats['published'] }}</div><div class="l">Artikel terbit</div></div></div></div>
  <div class="col-sm-6 col-xl-3"><div class="stat-card"><div class="ico ico-sm"><i class="bi bi-pencil-square"></i></div><div><div class="v">{{ $stats['drafts'] + $stats['scheduled'] }}</div><div class="l">Draf &amp; terjadwal</div></div></div></div>
  <div class="col-sm-6 col-xl-3"><div class="stat-card"><div class="ico ico-sm"><i class="bi bi-collection"></i></div><div><div class="v">{{ $stats['galleries'] }}</div><div class="l">Album galeri</div></div></div></div>
  <div class="col-sm-6 col-xl-3"><div class="stat-card"><div class="ico ico-sm"><i class="bi bi-image"></i></div><div><div class="v">{{ $stats['photos'] }}</div><div class="l">Media tersimpan</div></div></div></div>
</div>

<div class="row g-4">
  <div class="col-lg-7">
    <div class="panel h-100">
      <div class="panel-head">
        <h2>Artikel terakhir diubah</h2>
        <a href="{{ route('dashboard.blog.index') }}" class="small fw-bold text-decoration-none">Semua artikel <i class="bi bi-arrow-right"></i></a>
      </div>
      @forelse ($posts as $post)
        <a class="recent-item" href="{{ route('dashboard.blog.edit', $post) }}">
          @if ($post->coverThumbUrl())
            <img class="t-thumb" src="{{ $post->coverThumbUrl() }}" alt="">
          @else
            <span class="t-thumb"><i class="bi bi-file-earmark-text"></i></span>
          @endif
          <div class="flex-grow-1 min-w-0">
            <div class="t text-truncate">{{ $post->title }}</div>
            <div class="s">Diubah {{ $post->updated_at->diffForHumans() }}</div>
          </div>
          @include('dashboard.posts.status', ['post' => $post])
        </a>
      @empty
        <div class="empty">
          <div class="ico"><i class="bi bi-journal-plus"></i></div>
          <h3>Belum ada artikel</h3>
          <p class="mb-3">Tulisan pertama bisa berupa cerita proyek, tips, atau kabar perusahaan.</p>
          <a href="{{ route('dashboard.blog.create') }}" class="btn btn-brand btn-sm">Tulis artikel</a>
        </div>
      @endforelse
    </div>
  </div>
  <div class="col-lg-5">
    <div class="panel h-100">
      <div class="panel-head">
        <h2>Album terbaru</h2>
        <a href="{{ route('dashboard.galeri.index') }}" class="small fw-bold text-decoration-none">Semua album <i class="bi bi-arrow-right"></i></a>
      </div>
      @forelse ($galleries as $gallery)
        <a class="recent-item" href="{{ route('dashboard.galeri.edit', $gallery) }}">
          @if ($gallery->cover)
            @if ($gallery->cover->isVideo())
              <span class="t-thumb"><i class="bi bi-play-circle"></i></span>
            @else
              <img class="t-thumb" src="{{ $gallery->cover->thumbUrl() }}" alt="">
            @endif
          @else
            <span class="t-thumb"><i class="bi bi-images"></i></span>
          @endif
          <div class="flex-grow-1 min-w-0">
            <div class="t text-truncate">{{ $gallery->title }}</div>
            <div class="s">{{ $gallery->photos_count }} media · {{ $gallery->displayDate()->translatedFormat('d M Y') }}</div>
          </div>
          <span @class(['badge-status', 's-live' => $gallery->is_published, 's-draft' => ! $gallery->is_published])>{{ $gallery->is_published ? 'Tayang' : 'Draf' }}</span>
        </a>
      @empty
        <div class="empty">
          <div class="ico"><i class="bi bi-images"></i></div>
          <h3>Belum ada album</h3>
          <p class="mb-3">Simpan dokumentasi kegiatan, kunjungan klien, atau acara internal di sini.</p>
          <a href="{{ route('dashboard.galeri.create') }}" class="btn btn-brand btn-sm">Buat album</a>
        </div>
      @endforelse
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/l10n/id.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
window.dashboardCharts = {
  trend: @json($trend),
  hours: @json($hours),
  monthly: @json($report->monthly)
};
</script>
@endpush
