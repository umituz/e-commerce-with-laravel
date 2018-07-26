<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Urun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UrunController extends Controller
{
    public function index()
    {
        if(request()->filled("aranan"))
        {
            request()->flash();
            $aranan = request("aranan");
            $urunler = Urun::where("urun_ad","like","%$aranan%")
                ->orWhere("aciklama","like","%$aranan%")
                ->orderByDesc("id")
                ->paginate(10)
                ->appends("aranan",$aranan);
        }
        else
        {
            request()->flush();
            $urunler = Urun::orderByDesc("id")->paginate(10);
        }
        return view("yonetim.urun.index",compact("urunler"));
    }

    public function form($id = 0)
    {
        $urun = new Urun;
        if($id > 0)
        {
            $urun = Urun::find($id);
        }

        return view("yonetim.urun.form",compact("urun"));
    }

    public function kaydet($id = 0)
    {
        $data = request()->only("urun_ad","slug","fiyat","aciklama");

        if(!request()->filled("slug"))
        {
            $data["slug"] = str_slug(request("urun_ad"));
            request()->merge(['slug' => $data['slug']]);
        }

        $this->validate(request(),[
            "urun_ad"   => "required",
            "fiyat"     => "required",
            "slug"          => (request("original_slug") != request("slug")) ? 'unique:urun,slug' : '',
        ]);

        $data_detay = request()->only("goster_slider","goster_gunun_firsati",
            "goster_one_cikan","goster_cok_satan","goster_indirimli");

        if($id > 0)
        {
            $urun = Urun::where("id",$id)->firstOrFail();
            $urun->update($data);
            $urun->save();

            $urun->detay()->update($data_detay);
        }
        else
        {
            $urun = Urun::create($data);
            $urun->save();
            $urun->detay()->create($data_detay);
        }

        return redirect()
            ->route("yonetim.urun.duzenle",$urun->id)
            ->with("mesaj", $id > 0 ? 'GÜNCELLENDİ' : 'KAYDEDİLDİ')
            ->with("mesaj_tur", "success");
    }

    public function sil($id)
    {
        $urun = Urun::find($id);
        $urun->kategoriler()->detach();
//        $urun->detay()->delete();
        $urun->delete();
        return redirect()
            ->route("yonetim.urun")
            ->with("mesaj", "Silindi")
            ->with("mesaj_tur", "success");

    }
}
