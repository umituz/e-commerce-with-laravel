<?php

Route::group(["prefix" => "yonetim","namespace" => "Yonetim"],function(){
    Route::redirect("/","/yonetim/oturumac");
    Route::match(["get","post"],"/oturumac","KullaniciController@oturumac")->name("yonetim.oturumac");

    Route::group(["middleware" => "yonetim"],function(){

        Route::get("/anasayfa","AnasayfaController@index")->name("yonetim.anasayfa");
        Route::get("/otumukapat","KullaniciController@oturumukapat")->name("yonetim.oturumukapat");

        Route::group(["prefix" => "kullanici"],function(){
            Route::match(["get","post"],"/","KullaniciController@index")->name("yonetim.kullanici.index");
            Route::get("/yeni","KullaniciController@form")->name("yonetim.kullanici.yeni");
            Route::get("/duzenle/{id}","KullaniciController@form")->name("yonetim.kullanici.duzenle");
            Route::post("/kaydet/{id?}","KullaniciController@kaydet")->name("yonetim.kullanici.kaydet");
            Route::get("/sil/{id}","KullaniciController@sil")->name("yonetim.kullanici.sil");
        });

        Route::group(["prefix" => "kategori"],function(){
            Route::match(["get","post"],"/","KategoriController@index")->name("yonetim.kategori");
            Route::get("/yeni","KategoriController@form")->name("yonetim.kategori.yeni");
            Route::get("/duzenle/{id}","KategoriController@form")->name("yonetim.kategori.duzenle");
            Route::post("/kaydet/{id?}","KategoriController@kaydet")->name("yonetim.kategori.kaydet");
            Route::get("/sil/{id}","KategoriController@sil")->name("yonetim.kategori.sil");
        });

    });

    


});

Route::get("/","AnasayfaController@index")->name('anasayfa');

Route::get("/kategori/{kategori_adi}","KategoriController@index")->name('kategori');

Route::get("/urun/{urun_adi}","UrunController@index")->name('urun');

Route::post("/ara","UrunController@ara")->name("ara");
Route::get("/ara","UrunController@ara")->name("ara");

Route::group(["prefix" => "sepet"],function(){
    Route::get("/","SepetController@index")->name('sepet');
    Route::post("/ekle","SepetController@ekle")->name("sepet.ekle");
    Route::delete("/kaldir/{rowId}","SepetController@kaldir")->name("sepet.kaldir");
    Route::delete("/bosalt","SepetController@bosalt")->name("sepet.bosalt");
    Route::patch("/guncelle/{rowId}","SepetController@guncelle")->name("sepet.guncelle");
});

Route::get("/odeme","OdemeController@index")->name('odeme');
Route::post("/odemeyap","OdemeController@odemeyap")->name('odemeyap');

Route::group(["middleware" => "auth"], function(){
    Route::get("/siparis","SiparisController@index")->name('siparis');
    Route::get("/siparis/{id}","SiparisController@detay")->name("siparis.detay");
});

Route::group(["prefix" => "kullanici"],function(){
    Route::get("/oturumac","KullaniciController@giris_form")->name("kullanici.oturumac");
    Route::post("/oturumac","KullaniciController@giris")->name("kullanici.oturumac");
    Route::get("/kaydol","KullaniciController@kaydol_form")->name("kullanici.kaydol");
    Route::post("/kaydol","KullaniciController@kaydol")->name("kullanici.kaydol");
    Route::get("/aktiflestir/{anahtar}","KullaniciController@aktiflestir")->name("aktiflestir");
    Route::get("/oturumukapat","KullaniciController@oturumukapat")->name("kullanici.oturumukapat");
});

//Route::get("test/email",function(){
//    $kullanici = \App\Models\Kullanici::find(1);
//    return new App\Mail\KullaniciKayit($kullanici);
//});

