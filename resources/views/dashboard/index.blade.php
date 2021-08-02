@extends('adminlte::page')

@section('title','Dashboard')
@section('content')
<span class="fs-2 fw-bold">Transaksi terbaru</span>
<div class="row">
    @foreach ($transaksi as $row)
    <x-adminlte-card class="col">
        <span>Customer : {{$row->customer->name}}</span>
        <br>
        <span>Total : {{$row->total_harga}}</span>

    </x-adminlte-card>
    @endforeach
</div>
@endsection

