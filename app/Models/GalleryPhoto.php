<?php

namespace App\Models;

use App\Support\ImageUploader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryPhoto extends Model
{
    protected $fillable = [
        'path',
        'thumb_path',
        'media_type',
        'width',
        'height',
        'caption',
        'sort_order',
    ];

    protected static function booted(): void
    {
        static::deleted(fn (GalleryPhoto $photo) => ImageUploader::delete($photo->path, $photo->thumb_path));
    }

    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }

    public function url(): string
    {
        return ImageUploader::url($this->path);
    }

    public function thumbUrl(): ?string
    {
        return ImageUploader::url($this->thumb_path);
    }

    public function isVideo(): bool
    {
        return $this->media_type === 'video';
    }
}
