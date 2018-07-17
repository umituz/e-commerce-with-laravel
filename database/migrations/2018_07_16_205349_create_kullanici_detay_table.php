<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKullaniciDetayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kullanici_detay', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kullanici_id')->unsigned();
            $table->string('adres');
            $table->string('telefon');

            $table->foreign("kullanici_id")->references("id")->on("kullanici")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kullanici_detay');
    }
}
