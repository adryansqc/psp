<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingItem;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'siteConfig' => Setting::updateOrCreate(['name' => 'Site Config']),
            'contact'    => Setting::updateOrCreate(['name' => 'Contact']),
            'medsos'    => Setting::updateOrCreate(['name' => 'Medsos']),
            'footer'    => Setting::updateOrCreate(['name' => 'Footer']),
        ];

        $settingItems = [
            [
                'setting_id'  => $settings['siteConfig']->id,
                'name'        => 'Site Name',
                'key'         => 'site_name',
                'type'        => 'text',
                'value'       => 'Putra Sentosa Perkasa',
                'helper_text' => null,
            ],
            [
                'setting_id'  => $settings['siteConfig']->id,
                'name'        => 'Website URL',
                'key'         => 'website_url',
                'type'        => 'url',
                'value'       => 'http://127.0.0.1:8000/',
                'helper_text' => null,
            ],
            [
                'setting_id'  => $settings['siteConfig']->id,
                'name'        => 'Logo',
                'key'         => 'logo',
                'type'        => 'file',
                'value'       => null,
                'helper_text' => null,
            ],
            [
                'setting_id'  => $settings['siteConfig']->id,
                'name'        => 'Favicon',
                'key'         => 'favicon',
                'type'        => 'file',
                'value'       => null,
                'helper_text' => null,
            ],
            [
                'setting_id' => $settings['siteConfig']->id,
                'name'       => 'Meta',
                'key'        => 'meta',
                'type'       => 'textarea',
                'value'      => '<meta name="description" content="" />
    <meta property = "og:title" content       = "SITE NAME" />
    <meta property = "og:description" content = "" />
    <meta property = "og:type" content        = "website" />
    <meta property = "og:url" content         = "https://example.com" />
    <meta property = "og:image" content       = "" />',
                'helper_text' => null,
            ],
            [
                'setting_id'  => $settings['contact']->id,
                'name'        => 'Address',
                'key'         => 'address',
                'type'        => 'text',
                'value'       => 'Kompleks Puri Mayang, Jl. Serma Ishak Ahmad, Mayang Mangurai, Kec. Kota Baru, Kota Jambi, Jambi 36361',
                'helper_text' => null,
            ],
            [
                'setting_id'  => $settings['contact']->id,
                'name'        => 'Email',
                'key'         => 'email',
                'type'        => 'email',
                'value'       => 'pspgroupjambi@gmail.com',
                'helper_text' => null,
            ],
            [
                'setting_id'  => $settings['contact']->id,
                'name'        => 'Phone Number',
                'key'         => 'phone_number',
                'type'        => 'number',
                'value'       => '081285008501',
                'helper_text' => null,
            ],
            [
                'setting_id'  => $settings['contact']->id,
                'name'        => 'G Maps',
                'key'         => 'gmaps',
                'type'        => 'text',
                'value'       => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.17608810834!2d103.5778107!3d-1.6439675999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2587c60edd0c1d%3A0xae7a9989ad67837a!2sRumah%20Kito%20Resort%20Hotel%20Jambi%20by%20Waringin%20Hospitality!5e0!3m2!1sen!2sid!4v1773036829889!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'helper_text' => null,
            ],
            [
                'setting_id'  => $settings['medsos']->id,
                'name'        => 'Instagram',
                'key'         => 'instagram',
                'type'        => 'url',
                'value'       => 'https://www.instagram.com/pspgroup_jambi?igsh=emNrNXpwbTg3Yjk4',
                'helper_text' => null,
            ],
            [
                'setting_id'  => $settings['medsos']->id,
                'name'        => 'X',
                'key'         => 'x',
                'type'        => 'url',
                'value'       => 'https://x.com/minthu',
                'helper_text' => null,
            ],
            [
                'setting_id'  => $settings['medsos']->id,
                'name'        => 'Facebook',
                'key'         => 'facebook',
                'type'        => 'url',
                'value'       => 'https://www.facebook.com/share/1BrpCYCU8s/?mibextid=wwXIfr',
                'helper_text' => null,
            ],
            [
                'setting_id'  => $settings['medsos']->id,
                'name'        => 'Tiktok',
                'key'         => 'tiktok',
                'type'        => 'url',
                'value'       => 'https://www.tiktok.com/@pspgroupjambi?_r=1&_t=ZS-98GcLocLnVM',
                'helper_text' => null,
            ],
            [
                'setting_id'  => $settings['footer']->id,
                'name'        => 'Pasal Sanggah',
                'key'         => 'pasal',
                'type'        => 'text',
                'value'       => 'Seluruh informasi, gambar, dan visualisasi pada situs ini bersifat ilustratif dan dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya. PT. Putra Sentosa Prakarsa tidak bertanggung jawab atas kerugian yang timbul akibat penggunaan informasi pada situs ini.',
                'helper_text' => null,
            ],
        ];
        foreach ($settingItems as $settingItem) {
            SettingItem::updateOrCreate(['name' => $settingItem['name']], $settingItem);
        }
    }
}
