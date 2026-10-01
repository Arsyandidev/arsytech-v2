@if (is_null($change))
  <span class="delta d-new" title="Periode sebelumnya belum ada data">Baru</span>
@elseif ($change > 0)
  <span class="delta d-up" title="Dibanding {{ $report->previousLabel() }}"><i class="bi bi-arrow-up-short"></i>{{ number_format($change, 1, ',', '.') }}%</span>
@elseif ($change < 0)
  <span class="delta d-down" title="Dibanding {{ $report->previousLabel() }}"><i class="bi bi-arrow-down-short"></i>{{ number_format(abs($change), 1, ',', '.') }}%</span>
@else
  <span class="delta d-flat" title="Dibanding {{ $report->previousLabel() }}">0%</span>
@endif
