<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            ['name' => 'app_name', 'value' => 'Defualt'],
            ['name' => 'description', 'value' => 'Defualt'],
            ['name' => 'phone', 'value' => 'Defualt'],
            ['name' => 'address', 'value' => 'Defualt'],
            ['name' => 'email', 'value' => 'Defualt@yahoo.com'],
            ['name' => 'facebook', 'value' => 'Defualt@facebook.com'],
            ['name' => 'github', 'value' => 'Defualt@github.com'],
            ['name' => 'linkedin', 'value' => 'Defualt@linkedin.com'],
            ['name' => 'twitter', 'value' => 'Defualt@twitter.com'],
            ['name' => 'about-image', 'value' => null],
            ['name' => 'about-text', 'value' => 'Defualt'],
            ['name' => 'contact-image', 'value' => null],
            ['name' => 'contact-text', 'value' => 'Defualt'],
            ['name' => 'cover-image', 'value' => null],
            ['name' => 'main-title', 'value' => 'Defualt'],
            ['name' => 'logo', 'value' => null],
        ];

        DB::table('settings')->insert($data);
    }
}
