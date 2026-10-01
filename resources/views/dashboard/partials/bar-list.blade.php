@php($max = max(1, collect($items)->max('total')))
<ul class="bar-list">
  @foreach ($items as $item)
    <li title="{{ $item['name'] }}: {{ number_format($item['total'], 0, ',', '.') }} kunjungan ({{ number_format($item['share'], 1, ',', '.') }}%)">
      <div class="bl-head">
        <span class="bl-name">{{ $item['name'] }}</span>
        <span class="bl-val">{{ number_format($item['total'], 0, ',', '.') }} <small>{{ number_format($item['share'], 1, ',', '.') }}%</small></span>
      </div>
      <div class="bl-track"><span style="width:{{ max(2, round($item['total'] / $max * 100, 1)) }}%"></span></div>
    </li>
  @endforeach
</ul>
