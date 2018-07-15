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
        DB::table("kullanici")->truncate();
        DB::table("kullanici")->insert(["adsoyad" => "Ümit UZ","email" => "umituz998@gmail.com","sifre" => Hash::make(159538)]);
    }
}
