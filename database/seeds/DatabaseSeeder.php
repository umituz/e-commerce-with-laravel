<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UrunTableSeeder::class);
        $this->call(KategoriTableSeeder::class);
        $this->call(DilTableSeeder::class);
        $this->call(KullaniciTableSeeder::class);
    }
}
