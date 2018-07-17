<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KullaniciTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table("kullanici")->truncate();
        DB::table("kullanici")->insert(["adsoyad" => "Ümit UZ","email" => "umituz998@gmail.com","sifre" => Hash::make(159538)]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
