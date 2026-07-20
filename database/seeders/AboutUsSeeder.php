<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::query()->first()
            ? AboutUs::query()->first()->update($this->data())
            : AboutUs::create($this->data());
    }

    private function data(): array
    {
        return [
            'deskripsi_psp' => '<p>PT Contoh Sejahtera Perkasa (PSP) adalah perusahaan yang bergerak di bidang jasa konsultasi dan pengembangan bisnis, berkomitmen memberikan solusi terbaik bagi klien di seluruh Indonesia.</p>',

            'history' => '<p>Perusahaan ini didirikan pada tahun 2015 dengan tujuan menjadi mitra terpercaya bagi pelaku usaha kecil dan menengah. Seiring berjalannya waktu, perusahaan terus berkembang dan memperluas jangkauan layanan hingga ke berbagai daerah di Indonesia.</p>',

            'visi' => '<p>Menjadi perusahaan terdepan yang memberikan nilai tambah berkelanjutan bagi mitra dan masyarakat melalui inovasi dan integritas.</p>',

            'nilai' => '<ul><li>Integritas dalam setiap tindakan</li><li>Inovasi berkelanjutan</li><li>Kolaborasi yang saling menguntungkan</li><li>Profesionalisme tinggi</li></ul>',

            'our_project' => '<p>Kami telah menyelesaikan berbagai proyek strategis, mulai dari pengembangan sistem digital, pelatihan sumber daya manusia, hingga konsultasi manajemen bisnis untuk berbagai instansi dan perusahaan mitra.</p>',
        ];
    }
}
