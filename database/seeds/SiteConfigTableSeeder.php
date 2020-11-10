<?php

use App\SiteConfig;
use Illuminate\Database\Seeder;

class SiteConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteConfig::firstOrCreate(['id' => 1],[
            'name' => 'Heat Pump',
            'logo' => '\logo.png',
            'language' => 'en',
            'currency' => '&#36;'
        ]);
    }
}
