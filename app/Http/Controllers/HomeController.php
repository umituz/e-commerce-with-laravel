<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $isim = "Ümit";
        $soyisim = "UZ";
        $users = ["a","b","c","d","e","f","g","h","j"];
        $letters = [
            ["id" => 5,"name" => "aslan"]
        ];
        return view("home",compact("letters"));
    }

    public function with()
    {
        $isim = "Ümit";
        $soyisim = "UZ";
        return view("home")->with(["isim" => $isim,"soyisim" => $soyisim    ]);
    }
}
