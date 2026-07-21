<?php

namespace App\Models;

use App\Observers\FasilitasObserver;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\Uuid;

class Fasilitas extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'gambar',
        'order',
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid7();
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}