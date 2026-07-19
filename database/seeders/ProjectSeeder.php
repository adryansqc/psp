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
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.2659507945888!2d103.64797480448094!3d-1.6038719474405396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e258fb5d6c784b9%3A0x52fdfb0f69f1b52b!2sPuri%20Selincah!5e0!3m2!1sid!2sid!4v1783417857450!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => true,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'Rumah Kito',
                'informasi' => 'Hunian eksklusif dengan konsep resort yang menawarkan kenyamanan dan kemewahan bagi penghuninya.',
                'fasilitas' => 'Kolam renang, clubhouse, jogging track, keamanan 24 jam.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.26110217641806!2d103.57692970521003!3d-1.6431931901460692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2587c60edd0c1d%3A0xae7a9989ad67837a!2sRumah%20Kito%20Resort%20Hotel%20Jambi%20by%20Waringin%20Hospitality!5e0!3m2!1sid!2sid!4v1783418086962!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => true,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'Puri Mayang',
                'informasi' => 'Perumahan modern minimalis dengan fasilitas lengkap dan lingkungan yang aman.',
                'fasilitas' => 'Security 24 jam, taman hijau, area olahraga, tempat ibadah.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.2612301240524!2d103.57793881074106!3d-1.6421676543944628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2587c58cad2057%3A0x8967ac48689eae18!2sPuri%20Mayang!5e0!3m2!1sid!2sid!4v1783418131804!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => true,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'Mansion Kito',
                'informasi' => 'Perumahan modern minimalis dengan fasilitas lengkap dan lingkungan yang aman.',
                'fasilitas' => 'Security 24 jam, taman hijau, area olahraga, tempat ibadah.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d498.52286421338164!2d103.5746235947699!3d-1.640547403091554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e25876a973dfbdb%3A0x5cf4a4ff7c47dd8c!2sMansion%20Kito!5e0!3m2!1sid!2sid!4v1783418024013!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
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
