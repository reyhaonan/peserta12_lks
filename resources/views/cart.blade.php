@extends('layouts.app')
@section('content')
<div class="container">
    <div class="text-center fs-2 fw-bold my-5">Keranjang belanja</div>
    <div class="row">
        @foreach ($cart as $row)
            <div class="col-lg-3 col-6">
                <div class="card shadow-none rounded-0 d-flex flex-column">
                    <img src="/storage/{{$row->produk->foto_produk}}" style="width: 100%" class="mx-auto" alt="">
                    <span class="mx-auto mb-1 fs-4 fw-bold">{{$row->produk->nama_produk}}</span>
                    <span class="lead mx-auto fs-6 mb-4">Rp.{{$row->produk->harga}}</span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="bg-theme checkout-card p-2 d-flex flex-column">
        <div class="info-belanja mx-auto row">
            <div class="col-6 item">
                @foreach ($cart as $row)
                    <div class="text-light my-1">{{$row->produk->nama_produk}}</div>
                    <input type="hidden" name="produk[]" form="transaksiForm" value="{{$row->produk_id}}">
                    <input type="hidden" name="jumlah[]" form="transaksiForm" value="{{$row->jumlah}}">
                @endforeach
            </div>
            <div class="col-6 harga">
                @foreach ($cart as $row)
                <div class="text-right text-light my-1">Rp.{{$row->produk->harga * $row->jumlah}}</div>
                @endforeach
            </div>
            <div class="separator"></div>
            <div class="col total text-right fs-3 text-light my-2">
                @php
                    $totalHarga = 0;
                    foreach($cart as $row){
                        $totalHarga = $totalHarga + ($row->produk->harga * $row->jumlah);
                    }
                @endphp
                Rp.{{$totalHarga}}
                <input type="hidden" name="total_harga" value="{{$totalHarga}}" form="transaksiForm">
            </div>
        </div>
            <button class="btn bg-light rounded-0" style="width: 100%" form="transaksiForm" type="submit">Checkout</button>
            <form action="/transaksi" method="POST" id="transaksiForm">@csrf</form>
    </div>
</div>
@endsection
@section('css')
    <style>
        .separator{
            height: 1px;
            width: 100%;
            background: #B1B1B1;
        }
    </style>
@endsection
