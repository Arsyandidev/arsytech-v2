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

    public function redirect(string $industri)
    {
        abort_unless(Industri::find($industri), 404);

        return redirect()->to(route('industri.index').'#'.$industri, 301);
    }
}
