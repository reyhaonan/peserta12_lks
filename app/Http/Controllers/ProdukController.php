<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = $request->file('foto_produk')->store('gambar','public');
        Produk::create([
            'nama_produk'=>$request->nama_produk,
            'foto_produk'=>$url,
            'kategori_id'=>$request->kategori_id,
            'harga'=>$request->harga,
            'deskripsi'=>$request->deskripsi,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        if($request->hasFile('foto_produk')){
            Storage::delete(['/public/'.$request->foto_produk]);
            $url = $request->file('foto_produk')->store('gambar','public');
            $produk->update([
                'nama_produk'=>$request->nama_produk,
                'foto_produk'=>$url,
                'kategori_id'=>$request->kategori_id,
                'harga'=>$request->harga,
                'deskripsi'=>$request->deskripsi,
            ]);
        }else{
            $produk->update([
                'nama_produk'=>$request->nama_produk,
                'kategori_id'=>$request->kategori_id,
                'harga'=>$request->harga,
                'deskripsi'=>$request->deskripsi,
            ]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        Storage::delete(['/public/'.$produk->foto_produk]);
        $produk->delete();
        return redirect()->back();
    }
}
