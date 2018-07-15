<?php

Route::get("/","AnasayfaController@index")->name('anasayfa');

Route::get("/kategori/{kategori_adi}","KategoriController@index")->name('kategori');

Route::get("/urun/{urun_adi}","UrunController@index")->name('urun');

Route::post("/ara","UrunController@ara")->name("ara");
Route::get("/ara","UrunController@ara")->name("ara");

Route::get("/sepet","SepetController@index")->name('sepet');

Route::group(["middleware" => "auth"], function(){
    Route::get("/odeme","OdemeController@index")->name('odeme');
    Route::get("/siparis","SiparisController@index")->name('siparis ');
    Route::get("/siparis/{id}","SiparisController@detay")->name("siparis_detay");
});

Route::group(["prefix" => "kullanici"],function(){
    Route::get("/oturumac","KullaniciController@giris_form")->name("kullanici.oturumac");
    Route::post("/oturumac","KullaniciController@giris")->name("kullanici.oturumac");
    Route::get("/kaydol","KullaniciController@kaydol_form")->name("kullanici.kaydol");
    Route::post("/kaydol","KullaniciController@kaydol")->name("kullanici.kaydol");
    Route::get("/aktiflestir/{anahtar}","KullaniciController@aktiflestir")->name("aktiflestir");
    Route::get("/oturumukapat","KullaniciController@oturumukapat")->name("kullanici.oturumukapat");
});

Route::get("test/email",function(){
    $kullanici = \App\Models\Kullanici::find(1);
    return new App\Mail\KullaniciKayit($kullanici);
});

