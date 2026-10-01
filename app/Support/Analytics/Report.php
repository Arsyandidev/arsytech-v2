<?php

namespace App\Support\Analytics;

use App\Content\KategoriSolusi;
use App\Content\Solusi;
use App\Models\Gallery;
use App\Models\PageView;
use App\Models\Post;
use App\Models\SiteVisit;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Report
{
    public const MAX_DAYS = 731;

    public CarbonImmutable $start;

    public CarbonImmutable $end;

    public CarbonImmutable $previousStart;

    public CarbonImmutable $previousEnd;

    public bool $monthly;

    public int $days;

    public function __construct(?CarbonImmutable $start = null, ?CarbonImmutable $end = null)
    {
        $today = CarbonImmutable::today();
        $this->end = ($end ?? $today)->startOfDay()->min($today);
        $this->start = ($start ?? $this->end->subDays(29))->startOfDay()->min($this->end);

        if ($this->start->diffInDays($this->end) >= static::MAX_DAYS) {
            $this->start = $this->end->subDays(static::MAX_DAYS - 1);
        }

        $this->days = $this->start->diffInDays($this->end) + 1;
        $this->monthly = $this->days > 92;
        $this->previousEnd = $this->start->subDay();
        $this->previousStart = $this->previousEnd->subDays($this->days - 1);
    }

    public static function fromRequest(\Illuminate\Http\Request $request): static
    {
        $parse = function ($value) {
            try {
                return $value ? CarbonImmutable::createFromFormat('!Y-m-d', (string) $value) : null;
            } catch (\Throwable $e) {
                return null;
            }
        };

        $start = $parse($request->query('dari'));
        $end = $parse($request->query('sampai'));

        if ($start && $end && $start->gt($end)) {
            [$start, $end] = [$end, $start];
        }

        return new static($start, $end);
    }

    public function label(): string
    {
        if ($this->start->equalTo($this->end)) {
            return $this->start->translatedFormat('d M Y');
        }

        return $this->start->translatedFormat($this->start->year === $this->end->year ? 'd M' : 'd M Y').' – '.$this->end->translatedFormat('d M Y');
    }

    public function previousLabel(): string
    {
        return $this->previousStart->translatedFormat('d M Y').' – '.$this->previousEnd->translatedFormat('d M Y');
    }

    public function summary(): array
    {
        $current = $this->totals($this->start, $this->end);
        $previous = $this->totals($this->previousStart, $this->previousEnd);

        return collect($current)->map(fn ($value, $key) => [
            'value' => $value,
            'previous' => $previous[$key],
            'change' => $this->change($value, $previous[$key]),
        ])->all();
    }

    public function today(): array
    {
        $today = CarbonImmutable::today();

        return [
            'visitors' => SiteVisit::whereDate('visit_date', $today)->count(),
            'pageviews' => PageView::where('viewed_at', '>=', $today)->count(),
            'active' => SiteVisit::where('last_seen_at', '>=', now()->subMinutes(5))->count(),
            'conversions' => SiteVisit::whereDate('visit_date', $today)->whereNotNull('converted_at')->count(),
        ];
    }

    public function trend(): array
    {
        $visits = $this->visitsQuery($this->start, $this->end)
            ->selectRaw($this->bucket('visit_date').' as bucket, COUNT(*) as visitors, SUM(is_returning) as returning_visitors, SUM(converted_at IS NOT NULL) as conversions')
            ->groupBy('bucket')
            ->get()
            ->keyBy('bucket');

        $views = $this->viewsQuery($this->start, $this->end)
            ->selectRaw($this->bucket('viewed_at').' as bucket, COUNT(*) as pageviews, COUNT(DISTINCT site_visit_id, post_id) as readers')
            ->groupBy('bucket')
            ->get()
            ->keyBy('bucket');

        return $this->buckets()->map(function (CarbonImmutable $date) use ($visits, $views) {
            $key = $this->monthly ? $date->format('Y-m') : $date->toDateString();

            return [
                'label' => $this->monthly ? $date->translatedFormat('M Y') : $date->translatedFormat('d M'),
                'full' => $this->monthly ? $date->translatedFormat('F Y') : $date->translatedFormat('l, d F Y'),
                'visitors' => (int) ($visits[$key]->visitors ?? 0),
                'returning' => (int) ($visits[$key]->returning_visitors ?? 0),
                'conversions' => (int) ($visits[$key]->conversions ?? 0),
                'pageviews' => (int) ($views[$key]->pageviews ?? 0),
                'readers' => (int) ($views[$key]->readers ?? 0),
            ];
        })->values()->all();
    }

    public function topPages(int $limit = 8): Collection
    {
        $rows = $this->viewsQuery($this->start, $this->end)
            ->selectRaw('path, MAX(route) as route, MAX(post_id) as post_id, MAX(gallery_id) as gallery_id, COUNT(*) as views, COUNT(DISTINCT site_visit_id) as visitors')
            ->groupBy('path')
            ->orderByDesc('views')
            ->limit($limit)
            ->get();

        $titles = $this->titlesFor($rows);

        return $rows->map(fn ($row) => [
            'path' => $row->path,
            'title' => $this->pageTitle($row, $titles),
            'views' => (int) $row->views,
            'visitors' => (int) $row->visitors,
        ]);
    }

    public function topPosts(int $limit = 6): Collection
    {
        $rows = $this->viewsQuery($this->start, $this->end)
            ->whereNotNull('post_id')
            ->selectRaw('post_id, COUNT(DISTINCT site_visit_id) as readers, COUNT(*) as views')
            ->groupBy('post_id')
            ->orderByDesc('readers')
            ->limit($limit)
            ->get();

        $posts = Post::whereIn('id', $rows->pluck('post_id'))->get()->keyBy('id');
        $allTime = static::readersPerPost($rows->pluck('post_id')->all());

        return $rows->filter(fn ($row) => $posts->has($row->post_id))->map(fn ($row) => [
            'post' => $posts[$row->post_id],
            'readers' => (int) $row->readers,
            'views' => (int) $row->views,
            'all_time' => $allTime[$row->post_id] ?? 0,
        ])->values();
    }

    public function breakdown(string $column, int $limit = 6): Collection
    {
        $rows = $this->visitsQuery($this->start, $this->end)
            ->selectRaw("COALESCE($column, 'Tidak diketahui') as name, COUNT(*) as total")
            ->groupBy('name')
            ->orderByDesc('total')
            ->get();

        $sum = max(1, $rows->sum('total'));
        $top = $rows->take($limit);
        $rest = $rows->slice($limit)->sum('total');

        if ($rest > 0) {
            $top->push((object) ['name' => 'Lainnya', 'total' => $rest]);
        }

        return $top->map(fn ($row) => [
            'name' => $row->name,
            'total' => (int) $row->total,
            'share' => round($row->total / $sum * 100, 1),
        ])->values();
    }

    public function hours(): array
    {
        $rows = $this->visitsQuery($this->start, $this->end)
            ->selectRaw('HOUR(first_seen_at) as hour, COUNT(*) as total')
            ->groupBy('hour')
            ->pluck('total', 'hour');

        return collect(range(0, 23))->map(fn ($hour) => [
            'label' => str_pad($hour, 2, '0', STR_PAD_LEFT).'.00',
            'total' => (int) ($rows[$hour] ?? 0),
        ])->all();
    }

    public function recentVisits(int $limit = 12): Collection
    {
        $visits = SiteVisit::query()
            ->orderByDesc('last_seen_at')
            ->limit($limit)
            ->get();

        $titles = $this->titlesFor(PageView::whereIn('site_visit_id', $visits->pluck('id'))
            ->select('path', 'route', 'post_id', 'gallery_id')
            ->get());

        return $visits->map(fn (SiteVisit $visit) => [
            'visit' => $visit,
            'landing' => $this->pageTitle((object) ['path' => $visit->landing_path, 'route' => $visit->landing_route, 'post_id' => null, 'gallery_id' => null], $titles),
        ]);
    }

    public static function readersPerPost(array $postIds = []): array
    {
        return PageView::query()
            ->whereNotNull('post_id')
            ->when($postIds, fn ($query) => $query->whereIn('post_id', $postIds))
            ->selectRaw('post_id, COUNT(DISTINCT site_visit_id) as readers')
            ->groupBy('post_id')
            ->pluck('readers', 'post_id')
            ->map(fn ($value) => (int) $value)
            ->all();
    }

    public static function postStats(Post $post): array
    {
        $base = PageView::where('post_id', $post->id);

        return [
            'readers' => (clone $base)->distinct()->count('site_visit_id'),
            'views' => (clone $base)->count(),
            'readers_30' => (clone $base)->where('viewed_at', '>=', CarbonImmutable::today()->subDays(29))->distinct()->count('site_visit_id'),
            'last_read' => (clone $base)->max('viewed_at'),
        ];
    }

    protected function totals(CarbonImmutable $start, CarbonImmutable $end): array
    {
        $visits = $this->visitsQuery($start, $end)
            ->selectRaw('COUNT(*) as visitors, SUM(is_returning) as returning_visitors, SUM(converted_at IS NOT NULL) as conversions')
            ->first();

        $views = $this->viewsQuery($start, $end)
            ->selectRaw('COUNT(*) as pageviews, COUNT(DISTINCT site_visit_id, post_id) as readers')
            ->first();

        $visitors = (int) $visits->visitors;
        $pageviews = (int) $views->pageviews;
        $conversions = (int) $visits->conversions;

        return [
            'visitors' => $visitors,
            'pageviews' => $pageviews,
            'pages_per_visit' => $visitors ? round($pageviews / $visitors, 1) : 0,
            'readers' => (int) $views->readers,
            'returning' => (int) $visits->returning_visitors,
            'conversions' => $conversions,
            'conversion_rate' => $visitors ? round($conversions / $visitors * 100, 1) : 0,
        ];
    }

    protected function change(float|int $current, float|int $previous): ?float
    {
        if ($previous == 0) {
            return $current > 0 ? null : 0.0;
        }

        return round(($current - $previous) / $previous * 100, 1);
    }

    protected function visitsQuery(CarbonImmutable $start, CarbonImmutable $end)
    {
        return SiteVisit::query()->whereBetween('visit_date', [$start->toDateString(), $end->toDateString()]);
    }

    protected function viewsQuery(CarbonImmutable $start, CarbonImmutable $end)
    {
        return PageView::query()->whereBetween('viewed_at', [$start->startOfDay(), $end->endOfDay()]);
    }

    protected function bucket(string $column): string
    {
        return $this->monthly ? "DATE_FORMAT($column, '%Y-%m')" : "DATE($column)";
    }

    protected function buckets(): Collection
    {
        $period = $this->monthly
            ? CarbonPeriod::create($this->start->startOfMonth(), '1 month', $this->end->startOfMonth())
            : CarbonPeriod::create($this->start, '1 day', $this->end);

        return collect($period)->map(fn ($date) => CarbonImmutable::instance($date));
    }

    protected function titlesFor(Collection $rows): array
    {
        return [
            'posts' => Post::whereIn('id', $rows->pluck('post_id')->filter())->pluck('title', 'id')->all(),
            'galleries' => Gallery::whereIn('id', $rows->pluck('gallery_id')->filter())->pluck('title', 'id')->all(),
            'post_slugs' => Post::whereIn('slug', $rows->pluck('path')->filter(fn ($path) => str_starts_with((string) $path, '/blog/'))->map(fn ($path) => substr($path, 6)))->pluck('title', 'slug')->all(),
            'gallery_slugs' => Gallery::whereIn('slug', $rows->pluck('path')->filter(fn ($path) => str_starts_with((string) $path, '/galeri/'))->map(fn ($path) => substr($path, 8)))->pluck('title', 'slug')->all(),
        ];
    }

    protected function pageTitle(object $row, array $titles): string
    {
        $path = (string) $row->path;
        $slug = trim(strrchr($path, '/') ?: '', '/');

        $title = match ($row->route ?? null) {
            'home' => 'Beranda',
            'tentang' => 'Tentang Kami',
            'solusi.index' => 'Semua layanan',
            'solusi.show' => html_entity_decode(KategoriSolusi::find($slug)['name'] ?? (($solusi = Solusi::find($slug)) ? $solusi['short'].' ('.$solusi['name'].')' : $slug)),
            'industri.index' => 'Industri',
            'faq' => 'FAQ',
            'kontak' => 'Kontak',
            'kebijakan-privasi' => 'Kebijakan Privasi',
            'syarat-ketentuan' => 'Syarat & Ketentuan',
            'blog.index' => 'Blog',
            'blog.show' => $titles['posts'][$row->post_id] ?? $titles['post_slugs'][$slug] ?? 'Artikel: '.$slug,
            'galeri.index' => 'Galeri',
            'galeri.show' => $titles['galleries'][$row->gallery_id] ?? $titles['gallery_slugs'][$slug] ?? 'Album: '.$slug,
            default => null,
        };

        return $title ?? ($path === '/' ? 'Beranda' : $path);
    }
}
