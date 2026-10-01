<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_visits', function (Blueprint $table) {
            $table->id();
            $table->string('ip_masked', 64)->nullable();
            $table->char('visitor_hash', 64)->nullable();
            $table->date('visit_date');
            $table->dateTime('first_seen_at');
            $table->dateTime('last_seen_at');
            $table->unsignedInteger('hits')->default(0);
            $table->string('landing_path')->nullable();
            $table->string('landing_route', 80)->nullable();
            $table->string('last_path')->nullable();
            $table->string('referrer_host')->nullable();
            $table->string('source', 60)->default('Langsung');
            $table->string('utm_campaign', 100)->nullable();
            $table->string('device', 20)->nullable();
            $table->string('browser', 40)->nullable();
            $table->string('os', 40)->nullable();
            $table->boolean('is_returning')->default(false);
            $table->dateTime('converted_at')->nullable();
            $table->unique(['visitor_hash', 'visit_date']);
            $table->index('visit_date');
        });

        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_visit_id')->constrained()->cascadeOnDelete();
            $table->string('path');
            $table->string('route', 80)->nullable();
            $table->foreignId('post_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('gallery_id')->nullable()->constrained()->nullOnDelete();
            $table->dateTime('viewed_at');
            $table->index('viewed_at');
            $table->index(['post_id', 'viewed_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_views');
        Schema::dropIfExists('site_visits');
    }
};
