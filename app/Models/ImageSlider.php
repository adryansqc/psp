<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ImageSlider extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'title',
        'second_title',
        'gambar',
        'order',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid7();
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('aktif', true)->orderBy('order');
    }
}
