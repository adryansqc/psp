<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'judul' => 'PSP Resmi Luncurkan Fase Baru Griya Prakarsa Residence',
                'konten' => '<p>PT. Putra Sentosa Prakarsa resmi meluncurkan fase pengembangan terbaru dari proyek Griya Prakarsa Residence di Sarolangun. Fase ini menghadirkan lebih banyak pilihan tipe rumah dengan fasilitas yang semakin lengkap.</p><p>Peluncuran ini disambut antusias oleh calon konsumen yang hadir dalam acara grand launching pekan lalu.</p>',
                'tipe' => 'berita',
            ],
            [
                'judul' => 'Progres Pembangunan Prakarsa Business Center Capai 60 Persen',
                'konten' => '<p>Pembangunan Prakarsa Business Center terus menunjukkan progres positif dan telah mencapai 60% dari total pengerjaan. Kawasan komersial ini ditargetkan rampung pada akhir tahun mendatang.</p><p>Manajemen PSP menyatakan optimis proyek ini akan menjadi pusat bisnis baru di kawasan Jambi.</p>',
                'tipe' => 'berita',
            ],
            [
                'judul' => 'PT. Putra Sentosa Prakarsa Raih Penghargaan Developer Terbaik',
                'konten' => '<p>PSP kembali menorehkan prestasi dengan meraih penghargaan sebagai salah satu pengembang properti terbaik di kawasan Sumatera. Penghargaan ini diberikan atas konsistensi kualitas pembangunan dan pelayanan kepada konsumen.</p>',
                'tipe' => 'berita',
            ],
            [
                'judul' => 'Kolaborasi PSP dengan Perbankan untuk Kemudahan KPR',
                'konten' => '<p>Dalam rangka memudahkan konsumen memiliki hunian, PT. Putra Sentosa Prakarsa menjalin kerja sama dengan beberapa lembaga perbankan untuk program KPR dengan bunga kompetitif dan proses yang lebih cepat.</p>',
                'tipe' => 'berita',
            ],
            [
                'judul' => 'Fasilitas Umum di Villa Sentosa Hills Mulai Beroperasi',
                'konten' => '<p>Sejumlah fasilitas umum di kawasan Villa Sentosa Hills, seperti taman bermain, area jogging track, dan pos keamanan 24 jam kini telah mulai beroperasi dan dapat dinikmati oleh penghuni.</p>',
                'tipe' => 'berita',
            ],

            [
                'judul' => 'Open House Griya Prakarsa Residence',
                'konten' => '<p>PSP mengundang masyarakat umum untuk menghadiri acara Open House di kawasan Griya Prakarsa Residence. Pengunjung dapat melihat langsung unit contoh (show unit) serta berkonsultasi langsung dengan tim marketing.</p><p><strong>Tanggal:</strong> Sabtu &amp; Minggu, pukul 09.00 - 17.00 WIB.</p>',
                'tipe' => 'acara',
            ],
            [
                'judul' => 'Seminar Properti: Tips Investasi Hunian di Jambi',
                'konten' => '<p>PT. Putra Sentosa Prakarsa bekerja sama dengan pakar properti mengadakan seminar bertema investasi hunian yang menguntungkan di wilayah Jambi. Acara ini terbuka untuk umum dan gratis.</p>',
                'tipe' => 'acara',
            ],
            [
                'judul' => 'Groundbreaking Ceremony Prakarsa Convention Hall',
                'konten' => '<p>Acara seremoni peletakan batu pertama (groundbreaking) Prakarsa Convention Hall berlangsung khidmat, dihadiri oleh jajaran direksi PSP dan perwakilan pemerintah daerah setempat.</p>',
                'tipe' => 'acara',
            ],
            [
                'judul' => 'Gathering Konsumen PSP 2026',
                'konten' => '<p>Sebagai bentuk apresiasi kepada seluruh konsumen setia, PT. Putra Sentosa Prakarsa menggelar acara gathering tahunan yang diisi dengan berbagai hiburan, doorprize, dan sesi berbagi pengalaman tinggal di hunian PSP.</p>',
                'tipe' => 'acara',
            ],
            [
                'judul' => 'Bazar UMKM di Kawasan Ruko Sentosa Point',
                'konten' => '<p>PSP mendukung pertumbuhan ekonomi lokal dengan menyelenggarakan bazar UMKM di area Ruko Sentosa Point, menghadirkan puluhan pelaku usaha kecil dan menengah dari sekitar kawasan Sarolangun.</p>',
                'tipe' => 'acara',
            ],
        ];

        foreach ($items as $item) {
            Berita::create($item);
        }
    }
}
