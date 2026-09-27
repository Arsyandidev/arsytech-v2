<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Konsultasi baru</title>
</head>
<body style="margin:0;padding:24px;background:#F4F4F5;font-family:Arial,Helvetica,sans-serif;color:#18181B">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;margin:0 auto;background:#ffffff;border-radius:12px;overflow:hidden;border:1px solid #E4E4E7">
    <tr>
      <td style="background:#A90E14;padding:20px 28px;color:#ffffff">
        <div style="font-size:12px;letter-spacing:.12em;text-transform:uppercase;opacity:.8">Formulir konsultasi arsytech.id</div>
        <div style="font-size:20px;font-weight:bold;margin-top:6px">Ada permintaan konsultasi baru</div>
      </td>
    </tr>
    <tr>
      <td style="padding:24px 28px">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:14px;line-height:1.5">
          @foreach ($rows as $label => $value)
            <tr>
              <td style="padding:8px 0;border-bottom:1px solid #F4F4F5;color:#71717A;width:38%;vertical-align:top">{{ $label }}</td>
              <td style="padding:8px 0;border-bottom:1px solid #F4F4F5;font-weight:bold;vertical-align:top">{{ $value }}</td>
            </tr>
          @endforeach
        </table>
        <div style="margin-top:20px;font-size:13px;color:#71717A">Pesan</div>
        <div style="margin-top:6px;padding:14px 16px;background:#FAFAFA;border-left:3px solid #A90E14;border-radius:6px;font-size:14px;line-height:1.6;white-space:pre-line">{{ $pesan }}</div>
        <p style="margin:24px 0 0;font-size:14px;line-height:1.6">Balas email ini untuk langsung menjawab ke {{ $rows['Email'] }}.
          @if ($whatsapp)
            Atau hubungi lewat <a href="{{ $whatsapp }}" style="color:#A90E14">WhatsApp</a>.
          @endif
        </p>
      </td>
    </tr>
    <tr>
      <td style="padding:14px 28px;background:#FAFAFA;font-size:12px;color:#A1A1AA">Dikirim {{ $waktuKirim }}@if ($ip) dari IP {{ $ip }}@endif.</td>
    </tr>
  </table>
</body>
</html>
