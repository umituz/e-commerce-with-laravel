<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/merhaba",function (){
    return "merhaba ciğerim";
});

Route::get("/api/v1/merhaba",function (){
    return ["mesaj" => "Merhaba Ciğerim"];
});

Route::get("/urun/{urunAdi}/{id?}",function($urunAdi,$id=0){
    return $urunAdi." ".$id;
})->name("urun_detay");

Route::get("/kampanya",function(){
    return redirect()->route("urun_detay",["urunAdi" => "Samsun-Galaxy-J3","id" => 5]);
});
