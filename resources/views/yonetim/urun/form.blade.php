@extends("yonetim.layouts.master")

@section("title","ETICARET PROJESİ")

@section("content")
    <h1 class="page-header">Ürünler Yönetimi</h1>

    <form method="post"
          action="{{ route("yonetim.urun.kaydet",@$urun->id) }}">
          @csrf
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{@$urun->id > 0 ? 'GÜNCELLE' : 'KAYDET'}}
            </button>
        </div>
        <h2 class="sub-header">
            ÜRÜN {{ @$urun->id > 0 ? 'DÜZENLE' : 'EKLE'}}
        </h2>

        @include("layouts.messages.validation_errors")
        @include("layouts.messages.session_alerts")

        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="urun_ad">
                        ÜRÜN ADI
                    </label>
                    <input name="urun_ad"
                           type="text"
                           value="{{ old("urun_ad", @$urun->urun_ad) }}"
                           class="form-control"
                           id="urun_ad"
                           placeholder="ÜRÜN ADI">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="slug">
                        SLUG
                    </label>
                    <input name="original_slug"
                           type="hidden"
                           value="{{ old("slug",@$urun->slug) }}">
                    <input name="slug"
                           type="text"
                           class="form-control"
                           id="slug"
                           value="{{ old("slug",@$urun->slug) }}"
                           placeholder="SLUG">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="fiyat">
                        ÜRÜN FİYATI
                    </label>
                    <input name="fiyat"
                           type="text"
                           value="{{ old("urun_ad", @$urun->fiyat) }}"
                           class="form-control"
                           id="fiyat"
                           placeholder="ÜRÜN FİYATI">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="aciklama">
                        AÇIKLAMA
                    </label>
                    <textarea class="form-control" name="aciklama" id="aciklama">{{ $urun->aciklama }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="checkbox">
                    <label>
                        <input type="hidden" name="goster_slider" value="0">
                        <input name="goster_slider"
                               type="checkbox"
                               {{ old("goster_slider",@$urun->detay->goster_slider) ? 'checked' : null }}
                               value="1"> Slider Alanında Göster
                    </label>
                    <label>
                        <input type="hidden" name="goster_gunun_firsati" value="0">
                        <input name="goster_gunun_firsati"
                               type="checkbox"
                               {{ old("goster_gunun_firsati",@$urun->detay->goster_gunun_firsati) ? 'checked' : null }}
                               value="1"> Günün Fırsatı Alanında Göster
                    </label>
                    <label>
                        <input type="hidden" name="goster_one_cikan" value="0">
                        <input name="goster_one_cikan"
                               type="checkbox"
                               {{ old("goster_one_cikan",@$urun->detay->goster_one_cikan) ? 'checked' : null }}
                               value="1"> Öne Çıkan Alanında Göster
                    </label>
                    <label>
                        <input type="hidden" name="goster_cok_satan" value="0">
                        <input name="goster_cok_satan"
                               type="checkbox"
                               {{ old("goster_cok_satan",@$urun->detay->goster_cok_satan) ? 'checked' : null }}
                               value="1"> Çok Satanlar Alanında Göster
                    </label>
                    <label>
                        <input type="hidden" name="goster_indirimli" value="0">
                        <input name="goster_indirimli"
                               type="checkbox"
                               {{ old("goster_indirimli",@$urun->detay->goster_indirimli) ? 'checked' : null }}
                               value="1"> İndirimli Alanında Göster
                    </label>
                </div>
            </div>
        </div>
    </form>
@endsection