<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{


    public function welcome()
    {
        $produk = Produk::all();
        $newProduk = Produk::orderBy('created_at','desc')->first();
        $kategori = Kategori::all();
        return view('welcome',['produk' => $produk,'kategori'=>$kategori,'newProduk' => $newProduk]);
    }
    public function produk(Request $request)
    {
        $produk = [];
        $type = '';
        if(isset($request->search)){
            $produk = Produk::where('nama_produk','like','%'.$request->search.'%')->get();
            $type = 'Search result : '.$request->search;
        }else if(isset($request->kategori)){
            $produk = Produk::where('kategori_id',$request->kategori)->get();
            $type = Kategori::where('id',$request->kategori)->first()->nama;
        }else{
            $produk = Produk::all();
            $type = 'Semua produk';
        }
        $kategori = Kategori::all();
        return view('produk',['produk'=>$produk,'type' => $type,'kategori' => $kategori]);
    }
    public function showProduk(Produk $produk)
    {
        return view('showProduk', ['produk'=>$produk]);
    }
    public function cart()
    {
        $cart = Cart::where('customer_id',Auth::id())->get();
        return view('cart',['cart' => $cart]);
    }
}
