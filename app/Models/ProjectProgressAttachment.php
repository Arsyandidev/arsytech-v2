<?php

namespace App\Models;

use App\Support\ImageUploader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectProgressAttachment extends Model
{
    protected $fillable = [
        'project_progress_report_id',
        'path',
        'thumb_path',
        'width',
        'height',
        'caption',
        'sort_order',
    ];

    protected static function booted(): void
    {
        static::deleted(fn (ProjectProgressAttachment $attachment) => ImageUploader::delete($attachment->path, $attachment->thumb_path));
    }

    public function report(): BelongsTo
    {
        return $this->belongsTo(ProjectProgressReport::class, 'project_progress_report_id');
    }

    public function url(): string
    {
        return (string) ImageUploader::url($this->path);
    }

    public function thumbUrl(): string
    {
        return (string) ImageUploader::url($this->thumb_path ?: $this->path);
    }

    public function publicPath(): string
    {
        return public_path('storage/'.$this->path);
    }
}
