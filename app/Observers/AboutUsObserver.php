<?php

namespace App\Observers;

use App\Models\AboutUs;
use Illuminate\Support\Facades\Storage;

class AboutUsObserver
{
    /**
     * Field-field longText/RichEditor yang isinya perlu dicek gambarnya.
     */
    protected array $richTextFields = [
        'deskripsi_psp',
        'history',
        'visi',
        'nilai',
        'our_project',
    ];

    /**
     * Dipanggil sebelum record di-update.
     * Bandingkan isi lama vs baru per field, hapus gambar yang hilang dari konten.
     */
    public function updating(AboutUs $aboutUs): void
    {
        foreach ($this->richTextFields as $field) {
            $old = $aboutUs->getOriginal($field);
            $new = $aboutUs->{$field};

            if ($old === $new) {
                continue;
            }

            $this->deleteRemovedImages($old, $new);
        }
    }

    /**
     * Dipanggil sebelum record dihapus total — hapus semua gambar yang pernah dipakai.
     */
    public function deleting(AboutUs $aboutUs): void
    {
        foreach ($this->richTextFields as $field) {
            $this->deleteAllImages($aboutUs->{$field});
        }
    }

    /**
     * Ambil semua path gambar (relatif terhadap disk 'public') dari HTML.
     */
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

    /**
     * Konversi URL gambar (misal http://domain.test/storage/about-us/xxx.png)
     * jadi path relatif terhadap disk public (about-us/xxx.png).
     */
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

    protected function deleteRemovedImages(?string $old, ?string $new): void
    {
        $oldPaths = $this->extractImagePaths($old);
        $newPaths = $this->extractImagePaths($new);

        $removedPaths = array_diff($oldPaths, $newPaths);

        $this->deletePaths($removedPaths);
    }

    protected function deleteAllImages(?string $content): void
    {
        $this->deletePaths($this->extractImagePaths($content));
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
