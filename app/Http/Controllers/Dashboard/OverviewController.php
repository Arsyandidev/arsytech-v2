<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryPhoto;
use App\Models\Post;

class OverviewController extends Controller
{
    public function __invoke()
    {
        return view('dashboard.index', [
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
