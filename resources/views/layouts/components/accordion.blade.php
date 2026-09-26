@php(app(\App\Support\StructuredData::class)->questions($items))
@php($firstOpen = $firstOpen ?? true)
<div class="accordion" id="{{ $id }}">
  @foreach ($items as $item)
    @php($open = $firstOpen && $loop->first)
    <div class="accordion-item rv">
      <h3 class="accordion-header"><button @class(['accordion-button', 'collapsed' => ! $open]) type="button"
          data-bs-toggle="collapse" data-bs-target="#{{ $id }}-{{ $loop->index }}" aria-expanded="{{ $open ? 'true' : 'false' }}" aria-controls="{{ $id }}-{{ $loop->index }}">{!! $item['question'] !!}</button></h3>
      <div id="{{ $id }}-{{ $loop->index }}" @class(['accordion-collapse collapse', 'show' => $open]) data-bs-parent="#{{ $id }}">
        <div class="accordion-body">{!! $item['answer'] !!}</div>
      </div>
    </div>
  @endforeach
</div>
