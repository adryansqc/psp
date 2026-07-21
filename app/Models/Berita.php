<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Berita extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'beritas';

    protected $fillable = [
        'uuid',
        'cover',
        'judul',
        'konten',
        'tipe',
    ];

    protected $casts = [
        'tipe' => 'string',
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid7();
    }

    /**
     * Scope untuk filter berita
     */
    public function scopeBerita(Builder $query): Builder
    {
        return $query->where('tipe', 'berita');
    }


    public function scopeAcara(Builder $query): Builder
    {
        return $query->where('tipe', 'acara');
    }
}
