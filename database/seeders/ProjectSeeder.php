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
                'nama_projek' => 'Puri Selincah Residence',
                'kategori' => 'residensial',
                'informasi' => 'Perumahan modern dengan lingkungan yang nyaman dan asri, cocok untuk keluarga dengan akses strategis ke pusat kota. Dilengkapi dengan berbagai fasilitas premium untuk kenyamanan penghuni.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.2659507945888!2d103.64797480448094!3d-1.6038719474405396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e258fb5d6c784b9%3A0x52fdfb0f69f1b52b!2sPuri%20Selincah!5e0!3m2!1sid!2sid!4v1783417857450!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => true,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'Puri Mayang Garden',
                'kategori' => 'residensial',
                'informasi' => 'Perumahan modern minimalis dengan desain tropis yang asri. Lingkungan aman dan nyaman dengan akses mudah ke berbagai fasilitas umum seperti sekolah, rumah sakit, dan pusat perbelanjaan.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.2612301240524!2d103.57793881074106!3d-1.6421676543944628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2587c58cad2057%3A0x8967ac48689eae18!2sPuri%20Mayang!5e0!3m2!1sid!2sid!4v1783418131804!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => true,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'Green Residence Alam Sutera',
                'kategori' => 'residensial',
                'informasi' => 'Kawasan hunian eksklusif dengan konsep hijau dan ramah lingkungan. Mengusung tema living in harmony with nature dengan area hijau yang luas dan desain arsitektur modern.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.876573970983!2d106.6393925147706!3d-6.140764995534787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9c7a6c4f9b7%3A0x8c5f5e8b9f3c4d6!2sAlam%20Sutera!5e0!3m2!1sid!2sid!4v1783418200000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => false,
                'developer' => 'Alam Sutera Group',
            ],
            [
                'nama_projek' => 'Citra Grand Residence',
                'kategori' => 'residensial',
                'informasi' => 'Perumahan mewah dengan arsitektur modern minimalis. Menawarkan kenyamanan dan privasi dengan luas tanah yang lega dan desain interior yang elegan.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.123456789!2d106.789012345!3d-6.234567890!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f8a9b6c5d4e3%3A0x5f4e3d2c1b0a9f8e!2sCitra%20Grand%20Residence!5e0!3m2!1sid!2sid!4v1783418300000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => false,
                'developer' => 'Citra Grand Property',
            ],
            [
                'nama_projek' => 'The Village Residence',
                'kategori' => 'residensial',
                'informasi' => 'Konsep perumahan cluster dengan nuansa desa modern. Menawarkan suasana tenang dan nyaman dengan lingkungan yang bersih dan asri.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.987654321!2d106.654321098!3d-6.210987654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5c4b3a2d1e0%3A0x3c2b1a0f9e8d7c6b!2sThe%20Village%20Residence!5e0!3m2!1sid!2sid!4v1783418400000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => false,
                'developer' => 'Putra Sentosa Prakarsa',
            ],

            [
                'nama_projek' => 'PSP Commercial Center',
                'kategori' => 'commercial_area',
                'informasi' => 'Pusat bisnis dan komersial terpadu di jantung kota. Menyediakan ruang perkantoran modern, retail space, dan area coworking dengan akses strategis.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.876543210!2d106.720123456!3d-6.150987654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7b8c9d0e1f2%3A0x4d3c2b1a0f9e8d7c!2sPSP%20Commercial%20Center!5e0!3m2!1sid!2sid!4v1783418500000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => true,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'PSP Biz Park',
                'kategori' => 'commercial_area',
                'informasi' => 'Kawasan bisnis terintegrasi dengan desain modern dan fasilitas lengkap. Cocok untuk perusahaan startup hingga korporasi besar.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.654321098!2d106.710987654!3d-6.180123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6a9b8c7d6e5%3A0x5f4e3d2c1b0a9f8e!2sPSP%20Biz%20Park!5e0!3m2!1sid!2sid!4v1783418600000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => true,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'Green Business District',
                'kategori' => 'commercial_area',
                'informasi' => 'Kawasan bisnis ramah lingkungan dengan konsep green building. Menggabungkan produktivitas kerja dengan kenyamanan lingkungan.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.543210987!2d106.690123456!3d-6.160987654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9a8b7c6d5e4%3A0x3c2b1a0f9e8d7c6b!2sGreen%20Business%20District!5e0!3m2!1sid!2sid!4v1783418700000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => false,
                'developer' => 'Green Development Group',
            ],
            [
                'nama_projek' => 'Ruko Prima Modern',
                'kategori' => 'commercial_area',
                'informasi' => 'Ruko modern 3 lantai dengan desain minimalis dan lokasi strategis di pusat bisnis. Cocok untuk berbagai jenis usaha.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.432109876!2d106.730123456!3d-6.170987654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f8b7c6d5e4f3%0x2b1a0f9e8d7c6b5a!2sRuko%20Prima%20Modern!5e0!3m2!1sid!2sid!4v1783418800000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => false,
                'developer' => 'Putra Sentosa Prakarsa',
            ],

            [
                'nama_projek' => 'Rumah Kito Resort Hotel',
                'kategori' => 'hotel_resort',
                'informasi' => 'Hunian eksklusif dengan konsep resort yang menawarkan kenyamanan dan kemewahan bagi penghuninya. Dilengkapi dengan pemandangan alam yang indah.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.26110217641806!2d103.57692970521003!3d-1.6431931901460692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2587c60edd0c1d%3A0xae7a9989ad67837a!2sRumah%20Kito%20Resort%20Hotel%20Jambi%20by%20Waringin%20Hospitality!5e0!3m2!1sid!2sid!4v1783418086962!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => true,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'PSP Grand Resort & Spa',
                'kategori' => 'hotel_resort',
                'informasi' => 'Resor bintang 5 dengan konsep modern dan pelayanan premium. Menawarkan pengalaman menginap yang tak terlupakan dengan berbagai fasilitas kelas dunia.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.321098765!2d106.650123456!3d-6.140987654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7a9b8c7d6e5%3A0x5f4e3d2c1b0a9f8e!2sPSP%20Grand%20Resort%20%26%20Spa!5e0!3m2!1sid!2sid!4v1783418900000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => true,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'The Royal Garden Hotel',
                'kategori' => 'hotel_resort',
                'informasi' => 'Hotel mewah dengan taman tropis yang luas. Menggabungkan kenyamanan modern dengan keindahan alam untuk pengalaman menginap yang sempurna.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.210987654!2d106.670123456!3d-6.150987654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f8b9c8d7e6f5%3A0x4d3c2b1a0f9e8d7c!2sThe%20Royal%20Garden%20Hotel!5e0!3m2!1sid!2sid!4v1783419000000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => false,
                'developer' => 'Royal Garden Group',
            ],
            [
                'nama_projek' => 'Mansion Kito Boutique Hotel',
                'kategori' => 'hotel_resort',
                'informasi' => 'Boutique hotel dengan desain modern minimalis dan pelayanan personal. Cocok untuk wisatawan bisnis maupun liburan.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d498.52286421338164!2d103.5746235947699!3d-1.640547403091554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e25876a973dfbdb%3A0x5cf4a4ff7c47dd8c!2sMansion%20Kito!5e0!3m2!1sid!2sid!4v1783418024013!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => false,
                'developer' => 'Putra Sentosa Prakarsa',
            ],
            [
                'nama_projek' => 'Lagoon Bay Resort',
                'kategori' => 'hotel_resort',
                'informasi' => 'Resor tepi pantai dengan laguna buatan yang indah. Menawarkan pengalaman liburan tropis dengan berbagai aktivitas air.',
                'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.109876543!2d106.690123456!3d-6.160987654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9c8d7e6f5a4%3A0x3c2b1a0f9e8d7c6b!2sLagoon%20Bay%20Resort!5e0!3m2!1sid!2sid!4v1783419100000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
                'pin' => false,
                'developer' => 'Lagoon Bay Group',
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
