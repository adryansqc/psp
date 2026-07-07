<?php

namespace App\Observers;

use App\Models\ImageSlider;
use Illuminate\Support\Facades\Storage;

class ImageSliderObserver
{
    public function updating(ImageSlider $imageSlider): void
    {
        if ($imageSlider->isDirty('gambar')) {
            $oldImage = $imageSlider->getOriginal('gambar');

            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
        }
    }


    public function deleted(ImageSlider $imageSlider): void
    {
        if ($imageSlider->gambar && Storage::disk('public')->exists($imageSlider->gambar)) {
            Storage::disk('public')->delete($imageSlider->gambar);
        }
    }
}
