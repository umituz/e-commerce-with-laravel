<?php

Route::get("/","AnasayfaController@index")->name('anasayfa');

Route::get("/kategori/{kategori_adi}","KategoriController@index")->name('kategori');

Route::get("/urun/{urun_adi}","UrunController@index")->name('urun');

Route::post("/ara","UrunController@ara")->name("ara");
Route::get("/ara","UrunController@ara")->name("ara");

Route::get("/sepet","SepetController@index")->name('sepet');

Route::get("/odeme","OdemeController@index")->name('odeme');

Route::get("/siparis","SiparisController@index")->name('siparis ');
Route::get("/siparis/{id}","SiparisController@detay")->name("siparis_detay");

Route::group(["prefix" => "kullanici"],function(){
    Route::get("/oturumac","KullaniciController@giris_form")->name("kullanici.oturumac");
    Route::get("/kaydol","KullaniciController@kaydol_form")->name("kullanici.kaydol");
});

