<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>{{ $report->title }}</title>
<style>
  @page { margin: 18px; }
  body { font-family: DejaVu Sans, sans-serif; color: #10213a; font-size: 12px; line-height: 1.45; }
  .primary { color: #A90F14; }
  .sheet { border: 1px solid #d6e0ef; border-radius: 14px; overflow: hidden; }
  .top-line { height: 5px; background: #A90F14; }
  .inner { padding: 20px 24px 14px; }
  .head { width: 100%; margin-bottom: 18px; }
  .head td { vertical-align: middle; }
  .logo-wrap { display: inline-flex; align-items: center; gap: 10px; }
  .logo-wrap img { width: 210px; height: auto; }
  .pill { display: inline-block; border: 1px solid #f0b8ba; color: #A90F14; font-size: 11px; font-weight: 700; padding: 5px 12px; border-radius: 999px; }
  .meta { width: 100%; border: 1px solid #d9e3f2; border-radius: 8px; background: #f6f9ff; padding: 12px 14px; margin-bottom: 16px; }
  .meta td:first-child { border-left: 4px solid #A90F14; }
  .meta td { width: 50%; padding: 6px 8px; vertical-align: top; }
  .meta .k { font-size: 11px; color: #5e7393; font-weight: 700; text-transform: uppercase; margin-bottom: 2px; letter-spacing: .3px; }
  .meta .v { font-size: 13px; color: #111f34; }
  .section-title { font-size: 17px; font-weight: 700; margin: 16px 0 8px; color: #12243f; }
  .progress-row { margin: 5px 0 12px; }
  .progress-row .lbl { font-weight: 700; }
  .progress-row .num { float: right; font-weight: 800; }
  .bar { margin-top: 5px; height: 9px; border-radius: 99px; background: #deebf8; overflow: hidden; }
  .bar > span { display: block; height: 100%; background: #A90F14; }
  table { width: 100%; border-collapse: collapse; }
  .modules th, .modules td { border-bottom: 1px solid #d8e4f2; padding: 8px 9px; vertical-align: top; }
  .modules th { background: #14233c; color: #fff; font-size: 12px; text-align: left; }
  .status { display: inline-block; font-size: 10px; font-weight: 700; padding: 3px 8px; border-radius: 999px; }
  .s-done { background: #dff6e6; color: #0b7c45; }
  .s-progress { background: #fff2cf; color: #8c6100; }
  .s-pending { background: #eceff4; color: #516074; }
  .action-box { border: 1px solid #f2c9cb; border-radius: 8px; background: #fff5f5; padding: 10px 12px; }
  .action-box h4 { margin: 0 0 8px; font-size: 13px; color: #7e1014; }
  .action-box ul { margin: 0; padding-left: 18px; }
  .action-box li { margin-bottom: 4px; }
  .attachments { margin-top: 14px; }
  .attachments-grid { width: 100%; }
  .attachments-grid td { width: 50%; padding: 6px; vertical-align: top; }
  .attachment-card { border: 1px solid #e4e9f2; border-radius: 8px; overflow: hidden; }
  .attachment-card img { width: 100%; height: 180px; object-fit: cover; }
  .attachment-cap { padding: 7px 9px; font-size: 11px; color: #2b3850; background: #fafcff; }
  .sign { width: 100%; margin-top: 28px; }
  .sign td { width: 100%; text-align: right; vertical-align: top; padding: 8px 0; }
  .line { margin: 54px 0 4px auto; width: 48%; border-top: 1px solid #a5b7d1; }
  .name { font-weight: 700; }
  .role, .company { font-size: 11px; color: #5c7190; }
  .footer { background: #121f37; color: #d8e5fa; font-size: 10px; padding: 8px 12px; }
  .footer td:last-child { text-align: right; }
</style>
</head>
<body>
<div class="sheet">
  <div class="top-line"></div>
  <div class="inner">
    <table class="head">
      <tr>
        <td>
          <div class="logo-wrap">
            <img src="{{ public_path('assets/img/logo.png') }}" alt="Arsytech">
          </div>
        </td>
        <td style="text-align:right">
          <span class="pill">PROGRES LAPORAN {{ $report->report_number ?: '#01' }}</span>
        </td>
      </tr>
    </table>

    <table class="meta">
      <tr>
        <td>
          <div class="k">Nama proyek</div>
          <div class="v">{{ $report->project_code ? $report->project_code.' - ' : '' }}{{ $report->project_name }}</div>
        </td>
        <td>
          <div class="k">Klien</div>
          <div class="v">{{ $report->client_name }}</div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="k">Periode pengembangan</div>
          <div class="v">{{ $report->development_period }}</div>
        </td>
        <td>
          <div class="k">Status utama</div>
          <div class="v">{{ $report->main_status }}</div>
        </td>
      </tr>
    </table>

    <div class="progress-row">
      <span class="lbl">Total progres pengembangan (overall progress)</span>
      <span class="num">{{ number_format($report->overall_progress, 0, ',', '.') }}%</span>
      <div class="bar"><span style="width: {{ max(0, min(100, $report->overall_progress)) }}%"></span></div>
    </div>

    <div class="section-title">Status modul & fitur (Sprint Check)</div>
    <table class="modules">
      <thead>
        <tr>
          <th style="width:16%">Modul / Scope</th>
          <th style="width:35%">Sub-fitur / Deskripsi</th>
          <th style="width:16%">Status</th>
          <th>Catatan / Deliverable</th>
        </tr>
      </thead>
      <tbody>
        @forelse(($report->modules ?? []) as $module)
          @php
            $status = $module['status'] ?? 'Belum Dimulai';
            $statusClass = $status === 'Selesai' ? 's-done' : ($status === 'Dalam Proses' ? 's-progress' : 's-pending');
          @endphp
          <tr>
            <td>{{ $module['module_scope'] ?? '-' }}</td>
            <td>{{ $module['feature_description'] ?? '-' }}</td>
            <td><span class="status {{ $statusClass }}">{{ $status }}</span></td>
            <td>{{ $module['deliverable_notes'] ?? '-' }}</td>
          </tr>
        @empty
          <tr><td colspan="4">Belum ada data modul.</td></tr>
        @endforelse
      </tbody>
    </table>

    <div class="section-title">Action Items & Catatan Tindak Lanjut</div>
    <div class="action-box">
      <h4>Catatan pengembangan & tindak lanjut:</h4>
      <ul>
        @forelse(($report->action_items ?? []) as $item)
          <li>{{ $item }}</li>
        @empty
          <li>Tidak ada action items.</li>
        @endforelse
      </ul>
    </div>

    @if ($report->attachments->isNotEmpty())
      <div class="section-title">Lampiran dokumentasi</div>
      <div class="attachments">
        <table class="attachments-grid">
          <tbody>
            @foreach ($report->attachments->chunk(2) as $chunk)
              <tr>
                @foreach ($chunk as $attachment)
                  <td>
                    <div class="attachment-card">
                      <img src="{{ $attachment->publicPath() }}" alt="Lampiran">
                      <div class="attachment-cap">{{ $attachment->caption ?: 'Tanpa caption' }}</div>
                    </div>
                  </td>
                @endforeach
                @if ($chunk->count() === 1)
                  <td></td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif

    <table class="sign">
      <tr>
        <td>
          <div class="role">Disiapkan & dilaporkan oleh:</div>
          <div class="line"></div>
          <div class="name">{{ $report->prepared_by_name ?: '-' }}</div>
          <div class="role">{{ $report->prepared_by_title ?: '-' }}</div>
        </td>
      </tr>
    </table>
  </div>

  <table class="footer" width="100%">
    <tr>
      <td>&copy; {{ now()->year }} PT Arsytech Nawasena Zetta. All rights reserved.</td>
      <td>SOP Document Ref: DOC-PRG/ABS/{{ optional($report->report_date)->format('Y') ?: now()->format('Y') }}</td>
    </tr>
  </table>
</div>
</body>
</html>
