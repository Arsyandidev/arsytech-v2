<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SiteVisit extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $casts = [
        'visit_date' => 'date',
        'first_seen_at' => 'datetime',
        'last_seen_at' => 'datetime',
        'converted_at' => 'datetime',
        'whatsapp_at' => 'datetime',
        'is_returning' => 'boolean',
        'is_verified' => 'boolean',
    ];

    public function scopeVerified(Builder $query): void
    {
        $query->where('is_verified', true);
    }

    public function pageViews(): HasMany
    {
        return $this->hasMany(PageView::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(SiteEvent::class);
    }
}
