<?php

namespace App\Support\Analytics;

use App\Models\Gallery;
use App\Models\PageView;
use App\Models\Post;
use App\Models\SiteVisit;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Recorder
{
    public static function record(Request $request): void
    {
        $userAgent = (string) $request->userAgent();
        $ip = $request->ip();

        if (! $ip || Client::isBot($userAgent)) {
            return;
        }

        $now = now();
        $hash = Client::hashIp($ip);
        $path = '/'.ltrim(Str::limit($request->path(), 250, ''), '/');
        $route = optional($request->route())->getName();

        $visit = SiteVisit::where('visitor_hash', $hash)->whereDate('visit_date', $now->toDateString())->first()
            ?? static::createVisit($request, $hash, $ip, $userAgent, $path, $route, $now);

        $post = $request->route('post');
        $gallery = $request->route('gallery');

        $isNewPage = PageView::query()->insertOrIgnore([
            'site_visit_id' => $visit->id,
            'path' => $path,
            'route' => $route,
            'post_id' => $post instanceof Post ? $post->id : null,
            'gallery_id' => $gallery instanceof Gallery ? $gallery->id : null,
            'viewed_at' => $now,
            'last_viewed_at' => $now,
        ]) > 0;

        if (! $isNewPage) {
            PageView::where('site_visit_id', $visit->id)->where('path', $path)->update(['last_viewed_at' => $now]);
        }

        $visit->forceFill([
            'hits' => $visit->hits + ($isNewPage ? 1 : 0),
            'last_seen_at' => $now,
            'last_path' => $path,
        ])->save();

        if (random_int(1, 200) === 1) {
            static::forgetOldVisitorHashes();
        }
    }

    public static function markConverted(Request $request): void
    {
        if (! $request->ip()) {
            return;
        }

        SiteVisit::where('visitor_hash', Client::hashIp($request->ip()))
            ->whereDate('visit_date', now()->toDateString())
            ->whereNull('converted_at')
            ->update(['converted_at' => now()]);
    }

    public static function forgetOldVisitorHashes(int $days = 90): int
    {
        return SiteVisit::whereNotNull('visitor_hash')
            ->where('visit_date', '<', now()->subDays($days)->toDateString())
            ->update(['visitor_hash' => null]);
    }

    protected static function createVisit(Request $request, string $hash, string $ip, string $userAgent, string $path, ?string $route, $now): SiteVisit
    {
        $referrerHost = parse_url((string) $request->headers->get('referer'), PHP_URL_HOST) ?: null;

        try {
            return SiteVisit::create([
                'ip_masked' => Client::maskIp($ip),
                'visitor_hash' => $hash,
                'visit_date' => $now->toDateString(),
                'first_seen_at' => $now,
                'last_seen_at' => $now,
                'hits' => 0,
                'landing_path' => $path,
                'landing_route' => $route,
                'last_path' => $path,
                'referrer_host' => $referrerHost ? Str::limit($referrerHost, 250, '') : null,
                'source' => Client::source($referrerHost, $request->query('utm_source'), $request->getHost()),
                'utm_campaign' => $request->filled('utm_campaign') ? Str::limit((string) $request->query('utm_campaign'), 100, '') : null,
                'device' => Client::device($userAgent),
                'browser' => Client::browser($userAgent),
                'os' => Client::os($userAgent),
                'is_returning' => SiteVisit::where('visitor_hash', $hash)->where('visit_date', '<', $now->toDateString())->exists(),
            ]);
        } catch (QueryException $e) {
            return SiteVisit::where('visitor_hash', $hash)->whereDate('visit_date', $now->toDateString())->firstOrFail();
        }
    }
}
