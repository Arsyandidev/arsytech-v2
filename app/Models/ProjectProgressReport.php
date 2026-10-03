<?php

namespace App\Models;

use App\Models\ProjectProgressAttachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectProgressReport extends Model
{
    protected $fillable = [
        'title',
        'report_number',
        'project_name',
        'project_code',
        'client_name',
        'development_period',
        'main_status',
        'overall_progress',
        'modules',
        'action_items',
        'prepared_by_name',
        'prepared_by_title',
        'approved_by_name',
        'approved_by_title',
        'approved_by_company',
        'report_date',
    ];

    protected $casts = [
        'modules' => 'array',
        'action_items' => 'array',
        'report_date' => 'date',
    ];

    protected static function booted(): void
    {
        static::deleting(function (ProjectProgressReport $report) {
            $report->attachments()->get()->each->delete();
        });
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(ProjectProgressAttachment::class)->orderBy('sort_order')->orderBy('id');
    }
};
