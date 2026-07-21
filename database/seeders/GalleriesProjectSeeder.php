<?php

namespace Database\Seeders;

use App\Models\GalleriesProject;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GalleriesProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $targetProjects = [
            'Puri Selincah Residence',
            'PSP Commercial Center',
            'Rumah Kito Resort Hotel',
        ];

        $projects = Project::whereIn('nama_projek', $targetProjects)->get();

        foreach ($projects as $project) {
            $galleries = [
                [
                    'gambar' => null,
                    'is_video' => false,
                    'video_url' => null,
                    'order' => 1,
                ],
                [
                    'gambar' => null,
                    'is_video' => false,
                    'video_url' => null,
                    'order' => 2,
                ],
                [
                    'gambar' => null,
                    'is_video' => false,
                    'video_url' => null,
                    'order' => 3,
                ],
                [
                    'gambar' => null,
                    'is_video' => true,
                    'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                    'order' => 4,
                ],
            ];

            foreach ($galleries as $gallery) {
                GalleriesProject::create(array_merge($gallery, [
                    'uuid' => Str::uuid(),
                    'project_uuid' => $project->uuid,
                ]));
            }
        }
    }
}
