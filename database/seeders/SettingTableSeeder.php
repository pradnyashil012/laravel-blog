<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Setting::create([
            'name' => 'Example.com',
            'copyright' => 'Copyright © 2021 All rights reserved',

        ]);
    }
}
