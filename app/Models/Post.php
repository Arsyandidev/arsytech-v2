<?php

namespace App\Models;

use App\Support\ImageUploader;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'body',
        'cover_path',
        'cover_thumb_path',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished(Builder $query): void
    {
        $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function isPublished(): bool
    {
        return $this->published_at !== null && $this->published_at->lte(now());
    }

    public function isScheduled(): bool
    {
        return $this->published_at !== null && $this->published_at->gt(now());
    }

    public function html(): string
    {
        return (string) $this->body;
    }

    public function summary(int $limit = 180): string
    {
        if ($this->excerpt) {
            return $this->excerpt;
        }

        return Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags($this->html()))), $limit);
    }

    public function readingMinutes(): int
    {
        return max(1, (int) ceil(str_word_count(strip_tags($this->html())) / 200));
    }

    public function coverUrl(): ?string
    {
        return $this->cover_path ? ImageUploader::url($this->cover_path) : null;
    }

    public function coverThumbUrl(): ?string
    {
        return $this->cover_thumb_path ? ImageUploader::url($this->cover_thumb_path) : $this->coverUrl();
    }
}
