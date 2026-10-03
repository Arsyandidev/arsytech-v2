<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_progress_reports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('report_number', 50)->nullable();
            $table->string('project_name');
            $table->string('project_code')->nullable();
            $table->string('client_name');
            $table->string('development_period');
            $table->string('main_status');
            $table->unsignedTinyInteger('overall_progress')->default(0);
            $table->json('modules')->nullable();
            $table->json('action_items')->nullable();
            $table->string('prepared_by_name')->nullable();
            $table->string('prepared_by_title')->nullable();
            $table->string('approved_by_name')->nullable();
            $table->string('approved_by_title')->nullable();
            $table->string('approved_by_company')->nullable();
            $table->date('report_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_progress_reports');
    }
};
