<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    public function index()
    {
        return view('pages.galeri.index', [
            'galleries' => Gallery::published()
                ->has('photos')
                ->with('cover')
                ->withCount('photos')
                ->latestEvent()
                ->paginate(12),
        ]);
    }

    public function show(Gallery $gallery)
    {
        abort_unless($gallery->is_published || Auth::check(), 404);

        $gallery->load('photos');

        return view('pages.galeri.show', [
            'gallery' => $gallery,
            'others' => Gallery::published()
                ->has('photos')
                ->whereKeyNot($gallery->id)
                ->with('cover')
                ->latestEvent()
                ->take(3)
                ->get(),
        ]);
    }
}
