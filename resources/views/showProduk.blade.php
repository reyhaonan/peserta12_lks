@extends('layouts.app')
@section('content')
<div class="container d-flex flex-column">
    <div class="text-center fs-2 fw-bold mt-4">{{$produk->nama_produk}}</div>
    <img src="/storage/{{$produk->foto_produk}}" class="mx-auto" alt="" srcset="">
    <p class="mx-auto text-center" style="width: 50%">{{$produk->deskripsi}}</p>
    <span class="mx-auto text-center lead">Rp.{{$produk->harga}}</span>
    @guest
    <a href="/login" type="submit" class="btn btn-dark rounded-0 mt-2 mx-auto">Login untuk membeli</a>
    @endguest
    @auth
    <div class="numInput mx-auto">
        <input type="number" name="jumlah" class="form-control" form="addCartForm" style="width: 100px" min="1" required id="jml">
    </div>
        <button type="submit" class="btn buy rounded-0 mt-2 mx-auto text-light" form="addCartForm">Tambah ke keranjang</button>
    <form action="/cart" method="POST" id="addCartForm">@csrf
        <input type="hidden" name="produk_id" value="{{$produk->id}}">
    </form>
    @endauth
</div>
@endsection

@section('css')
    <style>
        .buy{
            background: #000 !important
        }
    </style>
@endsection

@section('js')
<script>
    jmlInput = document.getElementById('jml');

    function addJml() {
        jmlInput.value++;
    }
    function minJml() {
        if(jmlInput.value <= 1)jmlInput.value == 1
        else jmlInput.value--;
    }
</script>
@endsection
