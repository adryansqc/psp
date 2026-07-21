<?php

namespace App\Observers;

use App\Models\Fasilitas;
use Illuminate\Support\Facades\Storage;

class FasilitasObserver
{
    public function updating(Fasilitas $fasilitas): void
    {
        $oldGambar = $fasilitas->getOriginal('gambar');
        $newGambar = $fasilitas->gambar;

        if ($oldGambar && $oldGambar !== $newGambar && Storage::disk('public')->exists($oldGambar)) {
            Storage::disk('public')->delete($oldGambar);
        }
    }

    public function deleting(Fasilitas $fasilitas): void
    {
        if ($fasilitas->gambar && Storage::disk('public')->exists($fasilitas->gambar)) {
            Storage::disk('public')->delete($fasilitas->gambar);
        }
    }
}