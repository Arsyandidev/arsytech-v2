<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'event_date',
        'is_published',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_published' => 'boolean',
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(GalleryPhoto::class)->orderBy('sort_order')->orderBy('id');
    }

    public function cover(): HasOne
    {
        return $this->hasOne(GalleryPhoto::class)->ofMany(['sort_order' => 'min', 'id' => 'min']);
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('is_published', true);
    }

    public function scopeLatestEvent(Builder $query): void
    {
        $query->orderByRaw('COALESCE(event_date, DATE(created_at)) DESC')->orderByDesc('id');
    }

    public function displayDate()
    {
        return $this->event_date ?? $this->created_at;
    }
}
