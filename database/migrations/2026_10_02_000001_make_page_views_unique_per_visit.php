<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('page_views', function (Blueprint $table) {
            $table->dateTime('last_viewed_at')->nullable()->after('viewed_at');
        });

        DB::statement('UPDATE page_views pv JOIN (SELECT site_visit_id, path, MIN(id) AS keep_id, MAX(viewed_at) AS last_at FROM page_views GROUP BY site_visit_id, path) d ON d.keep_id = pv.id SET pv.last_viewed_at = d.last_at');
        DB::statement('DELETE pv FROM page_views pv JOIN page_views keep ON keep.site_visit_id = pv.site_visit_id AND keep.path = pv.path AND keep.id < pv.id');
        DB::statement('UPDATE page_views SET last_viewed_at = viewed_at WHERE last_viewed_at IS NULL');
        DB::statement('UPDATE site_visits sv SET hits = (SELECT COUNT(*) FROM page_views pv WHERE pv.site_visit_id = sv.id)');

        Schema::table('page_views', function (Blueprint $table) {
            $table->unique(['site_visit_id', 'path']);
        });
    }

    public function down(): void
    {
        Schema::table('page_views', function (Blueprint $table) {
            $table->dropUnique(['site_visit_id', 'path']);
            $table->dropColumn('last_viewed_at');
        });
    }
};
