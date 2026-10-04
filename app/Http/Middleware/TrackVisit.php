<?php

namespace App\Http\Middleware;

use App\Support\Analytics\Recorder;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class TrackVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('internal')) {
            $internal = $request->query('internal') !== '0';

            Cookie::queue($internal
                ? Cookie::make(Recorder::INTERNAL_COOKIE, '1', 60 * 24 * 730)
                : Cookie::forget(Recorder::INTERNAL_COOKIE));

            return redirect()->to($request->url())->with('internal_device', $internal);
        }

        return $next($request);
    }

    public function terminate(Request $request, Response $response): void
    {
        if (! $this->shouldTrack($request, $response)) {
            return;
        }

        try {
            Recorder::record($request);
        } catch (Throwable $e) {
            Log::warning('Gagal mencatat kunjungan', ['error' => $e->getMessage()]);
        }
    }

    protected function shouldTrack(Request $request, Response $response): bool
    {
        if (! $request->isMethod('GET') || $response->getStatusCode() !== 200 || Auth::check()) {
            return false;
        }

        if (! str_contains((string) $response->headers->get('Content-Type'), 'text/html')) {
            return false;
        }

        $purpose = strtolower($request->headers->get('Sec-Purpose', $request->headers->get('Purpose', $request->headers->get('X-Moz', ''))));

        return ! str_contains($purpose, 'prefetch') && ! str_contains($purpose, 'prerender');
    }
}
