@extends("yonetim.layouts.master")

@section("title","ETICARET PROJESİ")

@section("content")
    <h1 class="page-header">Ürünler Yönetimi</h1>

    <h3  class="sub-header"> Ürün Listesi </h3>
    <div class="well">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-primary">Yazdır</button>
            <button type="button" class="btn btn-info">Dışarı Aktar</button>
            <a href="{{ route('yonetim.urun.yeni') }}" class="btn btn-success">Yeni Ekle</a>
        </div>
        <form class="form-inline" action="{{ route("yonetim.urun") }}" method="post">
            @csrf
            <div class="form-group">
                <label for="aranan">Ara</label>
                <input type="text" value="{{ old("aranan") }}" name="aranan" class="form-control form-control-sm" id="aranan">
            </div>
            <button class="btn btn-primary" type="submit">Ara</button>
            <a href="{{ route("yonetim.urun") }}" class="btn btn-info">Temizle</a>
        </form>
    </div>

    @include("layouts.messages.session_alerts")

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Slug</th>
                <th>Ürün Adı</th>
                <th>Fiyat</th>
                <th>Kayıt Tarihi</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @if(count($urunler) == 0)
                <tr>
                    <td align="center" colspan="7">
                        <b>KAYIT BULUNAMADI</b>
                    </td>
                </tr>
            @endif
            @foreach($urunler as $urun)
            <tr>
                <td>{{$urun->id}}</td>
                <td>{{$urun->slug}}</td>
                <td>{{$urun->urun_ad}}</td>
                <td>{{$urun->fiyat}}</td>
                <td>{{$urun->olusturulma_tarihi}}</td>
                <td style="width: 100px">
                    <a href="{{route("yonetim.urun.duzenle",$urun->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="DÜZENLE">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route("yonetim.urun.sil",$urun->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="SİL" onclick="return confirm('Emin Misiniz?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{ $urunler->links() }}

    </div>

@endsection