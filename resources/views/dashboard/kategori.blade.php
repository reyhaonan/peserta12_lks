@extends('adminlte::page')

@section('title','Kategori Dashboard')

@section('content')
@php
$heads = [
    'Nama Kategori',
    'Gambar',
    'Aksi',
];

$config = [
    'order' => [[1, 'asc']],
    'columns' => [null, null, ['orderable' => false]],
];
@endphp

<x-adminlte-button label="Tambah kategori" data-toggle="modal" data-target="#addModal" theme="primary" class="mb-4"/>

<x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach($kategori as $row)
        <tr>
            <td>{{$row->nama}}</td>
            <td><img src="/storage/{{$row->foto}}" style="width: 100px;" alt="" srcset=""></td>
            <td>
                <button class="btn text-dark mx-1 " title="Edit" data-toggle="modal" data-target="#editModal" onclick="editValue('{{$row->id}}','{{$row->nama}}')">
                    <i class="fa fa-pen"></i>
                </button>
                <button class="btn text-danger mx-1 " title="Delete" type="submit" form="del-{{$row->id}}">
                    <i class="fa fa-trash"></i>
                </button>
                <form action="/kategori/{{$row->id}}" method="POST" id="del-{{$row->id}}">@csrf @method('DELETE')</form>
            </td>
        </tr>
    @endforeach
</x-adminlte-datatable>


{{-- add modal --}}
<x-adminlte-modal id="addModal" title="Tambahkan kategori">
    <form action="/kategori" method="POST" enctype="multipart/form-data" id="addForm">
        @csrf
        <x-adminlte-input label="Nama kategori" type="text" name="nama"/>
        <x-adminlte-input-file label="Foto kategori" name="foto"/>
    </form>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" type="submit" label="Tambah" form="addForm"></x-adminlte-button>
        <x-adminlte-button theme="dark" type="submit" label="Batal" data-dismiss="modal" data-target="#addModal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>
{{-- edit modal --}}
<x-adminlte-modal id="editModal" title="Edit kategori">
    <form action="/kategori/" method="POST" enctype="multipart/form-data" id="updateForm">
        @csrf
        @method('PUT')
        <x-adminlte-input label="Nama kategori" type="text" name="nama" id="namaEdit"/>
        <x-adminlte-input-file label="Foto kategori" name="foto" />
    </form>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" type="submit" label="Update" form="updateForm"></x-adminlte-button>
        <x-adminlte-button theme="dark" type="submit" label="Batal" data-dismiss="modal" data-target="#editModal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>
@endsection

@section('js')
<script>
    function editValue(id,nama) {
        document.getElementById('updateForm').action = `/kategori/${id}`
        document.getElementById('namaEdit').value = nama
    }
</script>
@endsection
