<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Bagaimana cara memesan unit properti di sini?',
                'answer' => 'Anda dapat menghubungi tim marketing kami melalui nomor telepon atau email yang tertera di halaman Contact Us, atau mengisi form konsultasi untuk dijadwalkan pertemuan lebih lanjut.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah tersedia sistem pembayaran secara kredit (KPR)?',
                'answer' => 'Ya, kami bekerja sama dengan beberapa bank untuk memberikan kemudahan pembayaran melalui KPR. Tim kami akan membantu proses pengajuan hingga selesai.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Berapa lama proses serah terima unit setelah pembayaran lunas?',
                'answer' => 'Proses serah terima unit biasanya memakan waktu 7-14 hari kerja setelah seluruh administrasi dan pembayaran dinyatakan lunas, tergantung ketersediaan unit.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah bisa melakukan survei lokasi sebelum membeli?',
                'answer' => 'Tentu, kami sangat menyarankan calon pembeli untuk melakukan survei langsung ke lokasi. Silakan hubungi tim kami untuk menjadwalkan kunjungan.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah ada garansi renovasi atau perbaikan setelah serah terima?',
                'answer' => 'Kami memberikan masa garansi selama 3 bulan untuk perbaikan struktural dan instalasi dasar setelah unit diserahterimakan kepada pembeli.',
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
