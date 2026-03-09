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
}
