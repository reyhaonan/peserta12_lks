@extends('adminlte::page')

@section('title','Produk Dashboard')

@section('content')
@php
$heads = [
    'Nama Produk',
    'Gambar',
    'Kategori',
    'Harga',
    'Deskripsi',
    'Aksi',
];

$config = [
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, null, null, ['orderable' => false]],
];
@endphp

<x-adminlte-button label="Tambah produk" data-toggle="modal" data-target="#addModal" class="mb-4" theme="primary"/>

<x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach($produk as $row)
        <tr>
            <td>{{$row->nama_produk}}</td>
            <td><img src="/storage/{{$row->foto_produk}}" style="width: 100px"></td>
            <td>{{$row->kategori->nama}}</td>
            <td>{{$row->harga}}</td>
            <td>{{$row->deskripsi}}</td>
            <td>
                <a href="/produk/{{$row->id}}" class="btn text-dark mx-1 " title="Details">
                    <i class="fa fa-eye"></i>
                </a>
                <button class="btn text-dark mx-1 " title="Edit" data-toggle="modal" data-target="#editModal" onclick="editValue('{{$row->id}}','{{$row->nama_produk}}','{{$row->harga}}','{{$row->kategori_id}}','{{$row->deskripsi}}')">
                    <i class="fa fa-pen"></i>
                </button>
                <button class="btn text-danger mx-1 " title="Delete" type="submit" form="del-{{$row->id}}">
                    <i class="fa fa-trash"></i>
                </button>
                <form action="/produk/{{$row->id}}" method="POST" id="del-{{$row->id}}">@csrf @method('DELETE')</form>
            </td>
        </tr>
    @endforeach
</x-adminlte-datatable>


{{-- add modal --}}
<x-adminlte-modal id="addModal" title="Tambahkan produk">
    <form action="/produk" method="POST" enctype="multipart/form-data" id="addForm">
        @csrf
        <x-adminlte-input label="Nama Produk" type="text" name="nama_produk"/>
        <x-adminlte-input-file label="Foto Produk" name="foto_produk"/>
        <x-adminlte-input label="Harga Produk" type="number" name="harga"/>
        <x-adminlte-select label="Foto Produk" name="kategori_id">
            @foreach ($kategori as $row)
            <option value="{{$row->id}}">{{$row->nama}}</option>
            @endforeach
        </x-adminlte-select>
        <x-adminlte-textarea label="Deskripsi" name="deskripsi"></x-adminlte-textarea>
    </form>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" type="submit" label="Tambah" form="addForm"></x-adminlte-button>
        <x-adminlte-button theme="dark" type="submit" label="Batal" data-dismiss="modal" data-target="#addModal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>
{{-- edit modal --}}
<x-adminlte-modal id="editModal" title="Tambahkan produk">
    <form action="/produk/" method="POST" enctype="multipart/form-data" id="updateForm">
        @csrf
        @method('PUT')
        <x-adminlte-input label="Nama Produk" type="text" name="nama_produk" id="nama_produkEdit"/>
        <x-adminlte-input-file label="Foto Produk" name="foto_produk" id="foto_produkEdit"/>
        <x-adminlte-input label="Harga Produk" type="number" name="harga" id="hargaEdit"/>
        <x-adminlte-select label="Kategori" name="kategori_id" id="kategori_idEdit">
            @foreach ($kategori as $row)
            <option value="{{$row->id}}">{{$row->nama}}</option>
            @endforeach
        </x-adminlte-select>
        <x-adminlte-textarea label="Deskripsi" name="deskripsi" id="deskripsiEdit"></x-adminlte-textarea>
    </form>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" type="submit" label="Update" form="updateForm"></x-adminlte-button>
        <x-adminlte-button theme="dark" type="submit" label="Batal" data-dismiss="modal" data-target="#editModal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>
@endsection

@section('js')
<script>
    function editValue(id,nama_produk,harga,kategori_id,deskripsi) {
        document.getElementById('updateForm').action = `/produk/${id}`
        document.getElementById('nama_produkEdit').value = nama_produk
        document.getElementById('hargaEdit').value = harga
        document.getElementById('kategori_idEdit').value = kategori_id
        document.getElementById('deskripsiEdit').value = deskripsi
    }
</script>
@endsection
