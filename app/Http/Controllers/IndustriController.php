<?php

namespace App\Http\Controllers;

use App\Content\Industri;

class IndustriController extends Controller
{
    public function index()
    {
        return view('pages.industri.index', [
            'industriList' => Industri::all(),
        ]);
    }

    public function show(string $industri)
    {
        $content = Industri::find($industri);

        abort_unless($content, 404);

        return view('pages.industri.show', [
            'slug' => $industri,
            'industri' => $content,
        ]);
    }
}
