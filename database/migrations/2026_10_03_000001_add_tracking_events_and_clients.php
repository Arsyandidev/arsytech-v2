<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_visits', function (Blueprint $table) {
            $table->boolean('is_verified')->default(false)->after('is_returning');
            $table->dateTime('whatsapp_at')->nullable()->after('converted_at');
            $table->index(['is_verified', 'visit_date']);
        });

        DB::table('site_visits')->update(['is_verified' => true]);

        Schema::create('site_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_visit_id')->constrained()->cascadeOnDelete();
            $table->string('type', 30);
            $table->string('label', 120)->nullable();
            $table->string('path')->nullable();
            $table->dateTime('created_at');
            $table->index(['type', 'created_at']);
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('logo_path');
            $table->unsignedInteger('logo_width')->nullable();
            $table->unsignedInteger('logo_height')->nullable();
            $table->string('website')->nullable();
            $table->string('project', 150)->nullable();
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
        Schema::dropIfExists('site_events');

        Schema::table('site_visits', function (Blueprint $table) {
            $table->dropIndex(['is_verified', 'visit_date']);
            $table->dropColumn(['is_verified', 'whatsapp_at']);
        });
    }
};
