<?php

namespace App\Observers;

use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaObserver
{
    /**
     * Sebelum record di-update: cek perubahan cover + gambar di dalam konten.
     */
    public function updating(Berita $berita): void
    {
        $this->handleCoverChange($berita);
        $this->handleKontenImagesChange($berita);
    }

    /**
     * Sebelum record dihapus total: hapus cover + semua gambar di dalam konten.
     */
    public function deleting(Berita $berita): void
    {
        if ($berita->cover && Storage::disk('public')->exists($berita->cover)) {
            Storage::disk('public')->delete($berita->cover);
        }

        $this->deletePaths($this->extractImagePaths($berita->konten));
    }

    protected function handleCoverChange(Berita $berita): void
    {
        $oldCover = $berita->getOriginal('cover');
        $newCover = $berita->cover;

        if ($oldCover && $oldCover !== $newCover && Storage::disk('public')->exists($oldCover)) {
            Storage::disk('public')->delete($oldCover);
        }
    }

    protected function handleKontenImagesChange(Berita $berita): void
    {
        $old = $berita->getOriginal('konten');
        $new = $berita->konten;

        if ($old === $new) {
            return;
        }

        $oldPaths = $this->extractImagePaths($old);
        $newPaths = $this->extractImagePaths($new);

        $this->deletePaths(array_diff($oldPaths, $newPaths));
    }

    protected function extractImagePaths(?string $html): array
    {
        if (blank($html)) {
            return [];
        }

        preg_match_all('/<img[^>]+src="([^">]+)"/i', $html, $matches);

        return collect($matches[1] ?? [])
            ->map(fn(string $url) => $this->urlToStoragePath($url))
            ->filter()
            ->values()
            ->all();
    }

    protected function urlToStoragePath(string $url): ?string
    {
        $path = parse_url($url, PHP_URL_PATH);

        if (! $path) {
            return null;
        }

        $marker = '/storage/';
        $position = strpos($path, $marker);

        if ($position === false) {
            return null;
        }

        return substr($path, $position + strlen($marker));
    }

    protected function deletePaths(array $paths): void
    {
        foreach ($paths as $path) {
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }
    }
}
