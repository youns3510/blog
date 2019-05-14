<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name'=>"Laravel's Blog",
            'contact_number'=>"+20 123 456 7899",
            'contact_email'=>"blog@gmail.com",
            'address'=>"Egypt Sohag Tahta"
        ]);
    }
}
