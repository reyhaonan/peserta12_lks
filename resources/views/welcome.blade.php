@extends('layouts.app')

@section('content')
<div class="banner mx-lg-4 d-flex">
    <span class="fs-2 m-auto text-center fw-bold text-light">Mulai Berbelanja<br>produk Apple pilihanmu</span>
</div>
<div class="container">
    <div class="row gx-5 img-overlap">
        @foreach ($kategori as $row)
            <a href="/produk?kategori={{$row->id}}" class="col-lg-2 col-4">
                <div class="card shadow-none rounded-0 d-flex flex-column pt-4">
                    <img src="/storage/{{$row->foto}}" style="width: 100px" class="mx-auto" alt="">
                    <span class="lead mx-auto mb-4">{{$row->nama}}</span>
                </div>
            </a>
        @endforeach
    </div>
    <div class="row">
        <div class="fs-2 text-dark fw-bold text-center my-4">Produk terbaru</div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-12">
            <div class="d-flex flex-column">
                <img src="/storage/{{$newProduk->foto_produk}}" style="width: 100%" class="mx-auto" alt="">
            </div>
        </div>
        <div class="col-lg-7 col-12 d-flex flex-column">
            <i class="fab fa-apple mb-0 mx-auto mt-auto" style="font-size: 100px"></i>
            <span class="fs-1 fw-bold mx-auto">{{$newProduk->nama_produk}}</span>
            <a href="/produk/{{$newProduk->id}}" class="lead mx-auto mb-auto">Detail produk</a>
        </div>
    </div>
    <div class="row">
        <div class="fs-2 text-dark fw-bold text-center my-5">Mengapa berbelanja di Techku?</div>
    </div>
    <div class="row align-center mt-2">
        <div class="col-lg-4 col-12 d-flex flex-column">
            <i class="fa fa-shipping-fast mx-auto"  style="font-size: 100px;color:#ACACAC"></i>
            <p class="lead mx-auto text-center mt-2">
                Pengiriman cepat dan<br> tepat waktu
            </p>
        </div>
        <div class="col-lg-4 col-12 d-flex flex-column">
            <i class="fab fa-apple mx-auto"  style="font-size: 100px;color:#ACACAC"></i>
            <p class="lead mx-auto text-center mt-2">
                Produk dijamin <br>original
            </p>
        </div>
        <div class="col-lg-4 col-12 d-flex flex-column">
            <i class="fab fa-paypal mx-auto" style="font-size: 100px;color:#ACACAC"></i>
            <p class="mx-auto lead text-center mt-2">
                Tersedia berbagai <br>metode pembayaran
            </p>
        </div>
    </div>
</div>
@endsection
@section('css')
<style>
.banner{
    background-size: cover;
    background-position: center;
    background-image: url('/assets/banner.png');
    text-shadow: 0px 2px 4px rgb(88, 88, 88);
    height: 400px;
}
.img-overlap{
    margin-top: -5rem !important
}
</style>
@endsection
