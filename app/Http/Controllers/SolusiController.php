<?php

namespace App\Http\Controllers;

use App\Content\Industri;
use App\Content\KategoriSolusi;
use App\Content\Solusi;

class SolusiController extends Controller
{
    public function index()
    {
        return view('pages.solusi.index', [
            'erp' => Solusi::find('erp'),
            'kategoriList' => KategoriSolusi::all(),
            'industriList' => Industri::all(),
        ]);
    }

    public function show(string $solusi)
    {
        if ($kategori = KategoriSolusi::find($solusi)) {
            return view('pages.solusi.kategori', [
                'slug' => $solusi,
                'kategori' => $kategori,
                'kategoriList' => KategoriSolusi::all(),
            ]);
        }

        $content = Solusi::find($solusi);

        abort_unless($content, 404);

        $parentSlug = KategoriSolusi::parentOf($solusi);

        return view('pages.solusi.show', [
            'slug' => $solusi,
            'solusi' => $content,
            'parentSlug' => $parentSlug,
            'parent' => $parentSlug ? KategoriSolusi::find($parentSlug) : null,
            'industriList' => Industri::all(),
        ]);
    }
}
