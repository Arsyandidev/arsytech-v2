<?php

namespace App\Providers;

use App\Support\StructuredData;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->scoped(StructuredData::class);
    }
}
