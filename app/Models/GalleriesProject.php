<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class GalleriesProject extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'gambar',
        'is_video',
        'video_url',
        'order',
    ];

    protected $casts = [
        'is_video' => 'boolean',
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
     * Get the retribusi that owns the Jenis
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function getEmbedVideoUrlAttribute(): ?string
    {
        if (! $this->video_url) {
            return null;
        }

        $url = $this->video_url;

        if (Str::contains($url, 'drive.google.com')) {
            preg_match('/[-\w]{25,}/', $url, $matches);

            if (isset($matches[0])) {
                return 'https://drive.google.com/file/d/' . $matches[0] . '/preview';
            }
        }

        if (Str::contains($url, ['youtube.com', 'youtu.be'])) {
            if (preg_match('/[?&]v=([^&]+)/', $url, $matches)) {
                return 'https://www.youtube.com/embed/' . $matches[1];
            }
            if (preg_match('/youtu\.be\/([^?&]+)/', $url, $matches)) {
                return 'https://www.youtube.com/embed/' . $matches[1];
            }
            if (Str::contains($url, '/embed/')) {
                return $url;
            }
        }
        return $url;
    }
}
