<?php

namespace App\Http\Controllers;

use App\Content\Industri;
use App\Content\Solusi;

class SolusiController extends Controller
{
    public function index()
    {
        return view('pages.solusi.index', [
            'solusiList' => Solusi::all(),
            'industriList' => Industri::all(),
        ]);
    }

    public function show(string $solusi)
    {
        $content = Solusi::find($solusi);

        abort_unless($content, 404);

        return view('pages.solusi.show', [
            'slug' => $solusi,
            'solusi' => $content,
            'industriList' => Industri::all(),
        ]);
    }
}
