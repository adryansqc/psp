<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ramsey\Uuid\Uuid;

class Visitor extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'ip_address',
        'user_agent',
        'url',
        'referer',
        'session_id',
        'visited_at',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid7();
    }

    public function scopeToday(Builder $query): Builder
    {
        return $query->whereDate('visited_at', today());
    }

    public function scopeThisWeek(Builder $query): Builder
    {
        return $query->whereBetween('visited_at', [now()->startOfWeek(), now()->endOfWeek()]);
    }

    public function scopeThisMonth(Builder $query): Builder
    {
        return $query->whereMonth('visited_at', now()->month)
            ->whereYear('visited_at', now()->year);
    }

    public function scopeUnique(Builder $query): Builder
    {
        return $query->distinct('ip_address');
    }

    public function scopeUniqueSession(Builder $query): Builder
    {
        return $query->distinct('session_id');
    }
}
