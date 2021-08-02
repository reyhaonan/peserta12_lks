@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center fs-2 fw-bold my-5">Terimakasih telah berbelanja di Techku</div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card rounded-0 p-3 shadow-none rounded-0">
                <div class="info-belanja mx-auto row">
                    <div class="col-6 item">
                        <div class="text-dark my-1">Iphone 11</div>
                        <div class="text-dark my-1">Iphone 12</div>
                    </div>
                    <div class="col-6 harga">
                        <div class="text-right text-dark my-1">Rp.34234</div>
                        <div class="text-right text-dark my-1">Rp.324234</div>
                    </div>
                    <div class="separator"></div>
                    <div class="col total text-right fs-3 text-dark my-2">
                        Rp.{{$transaksi->total_harga}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
    <style>
        .separator{
            height: 1px;
            width: 100%;
            background: #000;
        }
    </style>
@endsection
