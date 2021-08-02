@extends('layouts.app')
@section('content')
<div class="container">
    <div class="text-center fs-2 fw-bold my-5">{{$type}}</div>
    <div class="row">
        @foreach ($produk as $row)
            <div class="col-lg-3 col-6">
                <a class="card shadow-none rounded-0 d-flex flex-column pt-4" href="/produk/{{$row->id}}">
                    <img src="/assets/iphone 11.png" style="width: 100%" class="mx-auto" alt="">
                    <span class="mx-auto mb-1 fs-4 fw-bold text-dark">{{$row->nama_produk}}</span>
                    <span class="lead mx-auto fs-6 mb-4 text-dark">Rp.{{$row->harga}}</span>
                </a>
            </div>
        @endforeach
    </div>
    <div class="text-center fs-2 fw-bold my-5">Berdasarkan Kategori</div>
    <div class="row">
        @foreach ($kategori as $row)
            <div class="col-lg-2 col-4">
                <div class="card shadow-none rounded-0 d-flex flex-column">
                    <img src="/storage/{{$row->foto}}" style="width: 100%" class="mx-auto" alt="">
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
