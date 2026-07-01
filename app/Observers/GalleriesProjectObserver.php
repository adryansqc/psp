<?php

namespace App\Observers;

use App\Models\GalleriesProject;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GalleriesProjectObserver
{
    /**
     * Handle the GalleriesProject "created" event.
     */
    public function created(GalleriesProject $galleriesProject): void
    {
        // if (!$galleriesProject->gambar) {
        //     return;
        // }

        // $imagePath = storage_path('app/public/' . $galleriesProject->gambar);

        // $filename = pathinfo($galleriesProject->gambar, PATHINFO_FILENAME);

        // $thumbnailName = 'thumbnail_' . $filename . '.png';

        // $thumbnailPath = 'galeri/' . $thumbnailName;

        // $image = Image::make($imagePath)
        //     ->resize(300, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //         $constraint->upsize();
        //     });

        // Storage::disk('public')->put(
        //     $thumbnailPath,
        //     (string) $image->encode('png', 80)
        // );

        // $galleriesProject->update([
        //     'thumbnail' => $thumbnailPath,
        // ]);
    }

    public function updated(GalleriesProject $galleriesProject): void
    {
        if ($galleriesProject->isDirty('gambar')) {
            $oldGambar = $galleriesProject->getOriginal('gambar');

            if ($oldGambar && $oldGambar !== $galleriesProject->gambar) {
                if (Storage::disk('public')->exists($oldGambar)) {
                    Storage::disk('public')->delete($oldGambar);
                }

                $oldThumbnail = $galleriesProject->getOriginal('thumbnail');
                if ($oldThumbnail && Storage::disk('public')->exists($oldThumbnail)) {
                    Storage::disk('public')->delete($oldThumbnail);
                }
            }
        }
    }

    public function deleted(GalleriesProject $galleriesProject): void
    {
        if ($galleriesProject->gambar && Storage::disk('public')->exists($galleriesProject->gambar)) {
            Storage::disk('public')->delete($galleriesProject->gambar);
        }

        if ($galleriesProject->thumbnail && Storage::disk('public')->exists($galleriesProject->thumbnail)) {
            Storage::disk('public')->delete($galleriesProject->thumbnail);
        }
    }
}
