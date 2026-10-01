<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryPhoto;
use App\Models\Post;
use App\Models\SiteVisit;
use App\Support\Analytics\Report;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function __invoke(Request $request)
    {
        $report = Report::fromRequest($request);

        return view('dashboard.index', [
            'report' => $report,
            'hasData' => SiteVisit::exists(),
            'summary' => $report->summary(),
            'today' => $report->today(),
            'trend' => $report->trend(),
            'topPages' => $report->topPages(),
            'topPosts' => $report->topPosts(),
            'sources' => $report->breakdown('source'),
            'devices' => $report->breakdown('device', 3),
            'browsers' => $report->breakdown('browser', 5),
            'systems' => $report->breakdown('os', 5),
            'hours' => $report->hours(),
            'recentVisits' => $report->recentVisits(),
            'stats' => [
                'published' => Post::published()->count(),
                'drafts' => Post::whereNull('published_at')->count(),
                'scheduled' => Post::where('published_at', '>', now())->count(),
                'galleries' => Gallery::count(),
                'photos' => GalleryPhoto::count(),
            ],
            'posts' => Post::latest('updated_at')->take(5)->get(),
            'galleries' => Gallery::with('cover')->withCount('photos')->latest('updated_at')->take(4)->get(),
        ]);
    }
}
