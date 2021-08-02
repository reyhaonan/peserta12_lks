@extends('adminlte::page')

@section('title','Transaksi Dashboard')

@section('content')
@php
$heads = [
    'Nama Pembeli',
    'Kode Transaksi',
    'Item',
    'Harga Total',
    'Status',
    'Aksi',
];

$config = [
    'order' => [[2, 'asc']],
    'columns' => [null, null, null, null, ['orderable' => false]],
];
@endphp

<x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
    @foreach($transaksi as $row)
        <tr>
            <td>{{$row->customer->name}}</td>
            <td>{{$row->kode_transaksi}}</td>
            <td>
                @foreach ($row->detail as $i)
                    <li>{{$i->produk->nama_produk}}</li>
                @endforeach
            </td>
            <td>{{$row->total_harga}}</td>
            <td>{{$row->status}}</td>
            <td>
                <button class="btn text-dark mx-1 " title="Edit" data-toggle="modal" data-target="#editModal" onclick="editValue('{{$row->id}}','{{$row->nama_produk}}','{{$row->kategori_id}}','{{$row->deskripsi}}')">
                    <i class="fa fa-pen"></i>
                </button>
                <button class="btn text-danger mx-1 " title="Delete" type="submit" form="del-{{$row->id}}">
                    <i class="fa fa-trash"></i>
                </button>
                <form action="/transaksi/{{$row->id}}" method="POST" id="del-{{$row->id}}">@csrf @method('DELETE')</form>
            </td>
        </tr>
    @endforeach
</x-adminlte-datatable>

{{-- edit modal --}}
<x-adminlte-modal id="editModal" title="Edit produk">
    <form action="/transaksi/" method="POST" enctype="multipart/form-data" id="updateForm">
        @csrf
        @method('PUT')
        <x-adminlte-select name="status">
            <option value="menunggu_konfirmasi">Menunggu konfirmasi</option>
            <option value="proses">Proses</option>
            <option value="dikirim">Dikirim</option>
            <option value="selesai">Selesai</option>
        </x-adminlte-select>
    </form>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" type="submit" label="Update" form="updateForm"></x-adminlte-button>
        <x-adminlte-button theme="dark" type="submit" label="Batal" data-dismiss="modal" data-target="#editModal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>
@endsection

@section('js')
<script>
    function editValue(id,status) {
        document.getElementById('updateForm').action = `/transaksi/${id}`
        document.getElementById('nama_produkEdit').value = nama_produk
        document.getElementById('hargaEdit').value = harga
        document.getElementById('kategori_idEdit').value = kategori_id
        document.getElementById('deskripsiEdit').value = deskripsi
    }
</script>
@endsection
