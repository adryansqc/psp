<?php

namespace App\Observers;

use App\Models\Logo;
use Illuminate\Support\Facades\Storage;

class LogoObserver
{
    public function updating(Logo $logo): void
    {
        $oldLogo = $logo->getOriginal('logo');
        $newLogo = $logo->logo;

        if ($oldLogo && $oldLogo !== $newLogo && Storage::disk('public')->exists($oldLogo)) {
            Storage::disk('public')->delete($oldLogo);
        }
    }

    /**
     * Dipanggil sebelum record dihapus total.
     * Hapus file logo-nya juga dari storage.
     */
    public function deleting(Logo $logo): void
    {
        if ($logo->logo && Storage::disk('public')->exists($logo->logo)) {
            Storage::disk('public')->delete($logo->logo);
        }
    }
}
