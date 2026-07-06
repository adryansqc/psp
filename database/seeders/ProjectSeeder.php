<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'nama_projek' => 'Puri Selincah',
                'informasi' => 'Perumahan modern dengan lingkungan yang nyaman dan asri, cocok untuk keluarga dengan akses strategis ke pusat kota.',
                'fasilitas' => 'Taman bermain, keamanan 24 jam, area parkir luas, musholla.',
                'lokasi' => '<iframe src="https://www.google.com/maps?q=-2.3134208,102.7473408&z=15&output=embed" width="100%" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
                'pin' => true,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'Rumah Kito',
                'informasi' => 'Hunian eksklusif dengan konsep resort yang menawarkan kenyamanan dan kemewahan bagi penghuninya.',
                'fasilitas' => 'Kolam renang, clubhouse, jogging track, keamanan 24 jam.',
                'lokasi' => '<iframe src="https://www.google.com/maps?q=-2.320000,102.750000&z=15&output=embed" width="100%" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
                'pin' => false,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'Puri Mayang',
                'informasi' => 'Perumahan modern minimalis dengan fasilitas lengkap dan lingkungan yang aman.',
                'fasilitas' => 'Security 24 jam, taman hijau, area olahraga, tempat ibadah.',
                'lokasi' => '<iframe src="https://www.google.com/maps?q=-2.305000,102.740000&z=15&output=embed" width="100%" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
                'pin' => false,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'Mansion Kito',
                'informasi' => 'Perumahan modern minimalis dengan fasilitas lengkap dan lingkungan yang aman.',
                'fasilitas' => 'Security 24 jam, taman hijau, area olahraga, tempat ibadah.',
                'lokasi' => '<iframe src="https://www.google.com/maps?q=-2.305000,102.740000&z=15&output=embed" width="100%" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
                'pin' => true,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
        ];

        foreach ($projects as $project) {
            Project::create(array_merge($project, [
                'uuid' => Str::uuid(),
                'cover' => null,
            ]));
        }
    }
}
