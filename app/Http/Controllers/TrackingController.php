<?php

namespace App\Http\Controllers;

use App\Models\SiteEvent;
use App\Support\Analytics\Recorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class TrackingController extends Controller
{
    public function ping(Request $request)
    {
        if (! Auth::check()) {
            $this->safely(fn () => Recorder::verify($request));
        }

        return response()->noContent();
    }

    public function event(Request $request)
    {
        $type = (string) $request->input('type');

        if (! Auth::check() && array_key_exists($type, SiteEvent::TYPES)) {
            $this->safely(fn () => Recorder::event($request, $type, $request->input('label'), $request->input('path')));
        }

        return response()->noContent();
    }

    protected function safely(callable $callback): void
    {
        try {
            $callback();
        } catch (Throwable $e) {
            Log::warning('Gagal mencatat event analitik', ['error' => $e->getMessage()]);
        }
    }
}
