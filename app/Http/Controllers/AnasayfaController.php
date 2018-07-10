<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class AnasayfaController extends Controller
{
    public function index()
    {
        $kategoriler = Kategori::whereRaw("ust_kategori_id is null")->take(5)->get();
        return view("anasayfa",compact("kategoriler"));
    }

}
