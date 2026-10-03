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
  .logo-wrap img { width: 180px; height: auto; }
  .pill { display: inline-block; border: 1px solid #f0b8ba; color: #A90F14; font-size: 11px; font-weight: 700; padding: 5px 12px; border-radius: 999px; }
  .meta { width: 100%; border: 1px solid #d9e3f2; border-radius: 8px; background: #f6f9ff; padding: 12px 14px; margin-bottom: 16px; }
  .meta td:first-child { border-left: 4px solid #A90F14; }
  .meta td { width: 50%; padding: 6px 8px; vertical-align: top; }
  .meta .k { font-size: 11px; color: #5e7393; font-weight: 700; text-transform: uppercase; margin-bottom: 2px; letter-spacing: .3px; }
  .meta .v { font-size: 13px; color: #111f34; }
  .section-title { font-size: 15px; font-weight: 700; margin: 16px 0 8px; color: #12243f; }

  /* Progress Row Safe for DomPDF */
  .progress-table { width: 100%; margin-bottom: 6px; }
  .progress-table td { padding: 0; }
  .progress-table .lbl { font-weight: 700; text-align: left; }
  .progress-table .num { font-weight: 800; text-align: right; color: #A90F14; }
  .bar { margin-top: 5px; height: 9px; border-radius: 99px; background: #deebf8; overflow: hidden; width: 100%; margin-bottom: 14px; }
  .bar > span { display: block; height: 100%; background: #A90F14; }

  table.modules { width: 100%; border-collapse: collapse; }
  .modules th, .modules td { border-bottom: 1px solid #d8e4f2; padding: 8px 9px; vertical-align: top; }
  .modules th { background: #14233c; color: #fff; font-size: 11px; text-align: left; }
  .status { display: inline-block; font-size: 10px; font-weight: 700; padding: 3px 8px; border-radius: 999px; }
  .s-done { background: #dff6e6; color: #0b7c45; }
  .s-progress { background: #fff2cf; color: #8c6100; }
  .s-pending { background: #eceff4; color: #516074; }

  .action-box { border: 1px solid #f2c9cb; border-radius: 8px; background: #fff5f5; padding: 10px 12px; }
  .action-box h4 { margin: 0 0 8px; font-size: 12px; color: #7e1014; }
  .action-box ul { margin: 0; padding-left: 18px; }
  .action-box li { margin-bottom: 4px; }

  .attachments { margin-top: 10px; }
  .attachments-grid { width: 100%; border-collapse: collapse; }
  .attachments-grid td { width: 50%; padding: 6px; vertical-align: top; }
  .attachment-card { border: 1px solid #e4e9f2; border-radius: 8px; overflow: hidden; text-align: center; background: #fafcff; }
  /* FIX: Hapus object-fit, pakai max-height */
  .attachment-card img { max-width: 100%; max-height: 200px; height: auto; display: block; margin: 0 auto; }
  .attachment-cap { padding: 7px 9px; font-size: 11px; color: #2b3850; background: #fafcff; text-align: left; border-top: 1px solid #e4e9f2; }

  .sign { width: 100%; margin-top: 20px; }
  .sign td { text-align: right; vertical-align: top; padding: 8px 0; }
  .sign-box { display: inline-block; text-align: center; min-width: 200px; }
  .line { margin: 50px auto 4px auto; width: 100%; border-top: 1px solid #a5b7d1; }
  .name { font-weight: 700; }
  .role, .company { font-size: 11px; color: #5c7190; }

  .footer { background: #121f37; color: #d8e5fa; font-size: 10px; padding: 8px 12px; width: 100%; }
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
            @php
                $logoPath = public_path('assets/img/logo.png');
                $logoBase64 = '';
                if (file_exists($logoPath)) {
                    $logoData = file_get_contents($logoPath);
                    $logoType = pathinfo($logoPath, PATHINFO_EXTENSION);
                    $logoBase64 = 'data:image/' . $logoType . ';base64,' . base64_encode($logoData);
                }
            @endphp

            @if($logoBase64)
                <img src="{{ $logoBase64 }}" alt="Arsytech" style="width: 180px; height: auto;">
            @else
                <strong style="font-size: 18px; color: #A90F14;">ARSYTECH.ID</strong>
            @endif
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

    <!-- FIX: Progress bar pakai tabel agar rapi -->
    <table class="progress-table">
      <tr>
        <td class="lbl">Total progres pengembangan (overall progress)</td>
        <td class="num">{{ number_format($report->overall_progress, 0, ',', '.') }}%</td>
      </tr>
    </table>
    <div class="bar"><span style="width: {{ max(0, min(100, $report->overall_progress)) }}%"></span></div>

    <div class="section-title">Status modul & fitur (Sprint Check)</div>
    <table class="modules">
      <thead>
        <tr>
          <th style="width:18%">Modul / Scope</th>
          <th style="width:35%">Sub-fitur / Deskripsi</th>
          <th style="width:17%">Status</th>
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
            <td><strong>{{ $module['module_scope'] ?? '-' }}</strong></td>
            <td>{{ $module['feature_description'] ?? '-' }}</td>
            <td><span class="status {{ $statusClass }}">{{ $status }}</span></td>
            <td>{{ $module['deliverable_notes'] ?? '-' }}</td>
          </tr>
        @empty
          <tr><td colspan="4" style="text-align: center;">Belum ada data modul.</td></tr>
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
                    @php
                        $dbPath = $attachment->path;

                        $fullPath = public_path('storage/' . $dbPath);

                        if (!file_exists($fullPath)) {
                            $fullPath = storage_path('app/public/' . $dbPath);
                        }

                        $imgBase64 = '';
                        if (file_exists($fullPath) && !is_dir($fullPath)) {
                            $imgData = file_get_contents($fullPath);
                            $ext = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
                            $mime = ($ext === 'png') ? 'image/png' : (($ext === 'webp') ? 'image/webp' : 'image/jpeg');
                            $imgBase64 = 'data:' . $mime . ';base64,' . base64_encode($imgData);
                        }
                    @endphp

                    <td>
                        <div class="attachment-card">
                        @if ($imgBase64)
                            <img src="{{ $imgBase64 }}" alt="Lampiran">
                        @else
                            <div style="padding: 15px; font-size: 10px; color: #999; text-align: center;">
                            [ Gambar Tidak Ditemukan ]
                            </div>
                        @endif
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
            <div class="sign-box">
                <div class="role">Disiapkan & dilaporkan oleh:</div>
                <div class="line"></div>
                <div class="name">{{ $report->prepared_by_name ?: '-' }}</div>
                <div class="role">{{ $report->prepared_by_title ?: '-' }}</div>
            </div>
            </td>
        </tr>
        </table>
    </div>

  <table class="footer">
    <tr>
      <td>&copy; {{ now()->year }} PT Arsytech Nawasena Zetta. All rights reserved.</td>
      <td>SOP Document Ref: DOC-PRG/ABS/{{ optional($report->report_date)->format('Y') ?: now()->format('Y') }}</td>
    </tr>
  </table>
</div>
</body>
</html>
