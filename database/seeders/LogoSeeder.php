<?php

namespace Database\Seeders;

use App\Models\Logo;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LogoSeeder extends Seeder
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
            $logos = [
                [
                    'nama' => 'Logo Utama',
                    'logo' => null,
                    'order' => 1,
                ],
                [
                    'nama' => 'Logo Developer',
                    'logo' => null,
                    'order' => 2,
                ],
                [
                    'nama' => 'Logo kedua',
                    'logo' => null,
                    'order' => 3,
                ],
                [
                    'nama' => 'Logo ketiga',
                    'logo' => null,
                    'order' => 4,
                ],
                [
                    'nama' => 'Logo keempat',
                    'logo' => null,
                    'order' => 5,
                ],
                [
                    'nama' => 'Logo kelima',
                    'logo' => null,
                    'order' => 6,
                ],
            ];

            foreach ($logos as $logo) {
                Logo::create(array_merge($logo, [
                    'uuid' => Str::uuid(),
                    'project_uuid' => $project->uuid,
                ]));
            }
        }
    }
}
