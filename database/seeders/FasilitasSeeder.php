<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FasilitasSeeder extends Seeder
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
            $fasilitas = [
                [
                    'title' => 'Kolam Renang',
                    'gambar' => null,
                    'order' => 1,
                ],
                [
                    'title' => 'Taman Bermain',
                    'gambar' => null,
                    'order' => 2,
                ],
                [
                    'title' => 'Keamanan 24 Jam',
                    'gambar' => null,
                    'order' => 3,
                ],
                [
                    'title' => 'Area Parkir',
                    'gambar' => null,
                    'order' => 4,
                ],
                [
                    'title' => 'Musala',
                    'gambar' => null,
                    'order' => 5,
                ],
                [
                    'title' => 'Jogging Track',
                    'gambar' => null,
                    'order' => 6,
                ],
            ];

            foreach ($fasilitas as $item) {
                Fasilitas::create(array_merge($item, [
                    'uuid' => Str::uuid(),
                    'project_uuid' => $project->uuid,
                ]));
            }
        }
    }
}