<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingItem;
use Illuminate\Database\Seeder;

class AddYoutubeMedsosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medsos = Setting::updateOrCreate(['name' => 'Medsos']);

        SettingItem::updateOrCreate(
            ['name' => 'Youtube'],
            [
                'setting_id'  => $medsos->id,
                'name'        => 'Youtube',
                'key'         => 'youtube',
                'type'        => 'url',
                'value'       => 'https://www.youtube-nocookie.com/embed/3imCL4Bk83c',
                'helper_text' => null,
            ]
        );
    }
}
