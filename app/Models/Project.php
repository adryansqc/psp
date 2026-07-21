<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'cover',
        'nama_projek',
        'informasi',
        'kategori',
        // 'fasilitas',
        'lokasi',
        'pin',
        'developer',
    ];

    protected $casts = [
        'pin' => 'boolean',
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid7();
    }

    public function galleries()
    {
        return $this->hasMany(GalleriesProject::class)->orderBy('order', 'asc');;
    }

    public function logos()
    {
        return $this->hasMany(Logo::class)->orderBy('order', 'asc');;
    }

    public function fasilitas()
{
    return $this->hasMany(Fasilitas::class)->orderBy('order', 'asc');
}
    public function getMapLatitudeAttribute(): ?float
    {
        $coords = $this->extractMapCoordinates();
        return $coords['lat'] ?? null;
    }

    public function getMapLongitudeAttribute(): ?float
    {
        $coords = $this->extractMapCoordinates();
        return $coords['lng'] ?? null;
    }

    protected function extractMapCoordinates(): ?array
    {
        if (! $this->lokasi) {
            return null;
        }

        if (preg_match('/q=(-?\d+\.\d+),(-?\d+\.\d+)/', $this->lokasi, $matches)) {
            return [
                'lat' => (float) $matches[1],
                'lng' => (float) $matches[2],
            ];
        }

        if (preg_match('/!2d(-?\d+\.\d+)!3d(-?\d+\.\d+)/', $this->lokasi, $matches)) {
            return [
                'lat' => (float) $matches[2],
                'lng' => (float) $matches[1],
            ];
        }

        return null;
    }

    public function scopeResidensial(Builder $query): Builder
    {
        return $query->where('kategori', 'residensial');
    }

    public function scopeCommercialArea(Builder $query): Builder
    {
        return $query->where('kategori', 'commercial_area');
    }

    public function scopeHotelAndArea(Builder $query): Builder
    {
        return $query->where('kategori', 'hotel_resort');
    }
}
