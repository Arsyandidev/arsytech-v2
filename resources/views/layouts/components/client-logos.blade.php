@php($clients = \App\Models\Client::published()->ordered()->get())
@if ($clients->isNotEmpty())
  <section class="client-strip" aria-labelledby="clientStripTitle">
    <div class="container">
      <ul class="cs-logos">
        @foreach ($clients as $client)
          <li>
            @if ($client->website)
              <a href="{{ $client->website }}" target="_blank" rel="noopener nofollow" class="cs-logo" title="{{ $client->name }}{{ $client->project ? ' · '.$client->project : '' }}">
                <img src="{{ $client->logoUrl() }}" alt="{{ $client->name }}" @if ($client->logo_width) width="{{ $client->logo_width }}" height="{{ $client->logo_height }}" @endif loading="lazy">
              </a>
            @else
              <span class="cs-logo" title="{{ $client->name }}{{ $client->project ? ' · '.$client->project : '' }}">
                <img src="{{ $client->logoUrl() }}" alt="{{ $client->name }}" @if ($client->logo_width) width="{{ $client->logo_width }}" height="{{ $client->logo_height }}" @endif loading="lazy">
              </span>
            @endif
            @if ($client->project)
              <span class="cs-project">{{ $client->project }}</span>
            @endif
          </li>
        @endforeach
      </ul>
    </div>
  </section>
@endif
