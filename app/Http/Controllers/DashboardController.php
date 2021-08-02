<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaksi = Transaksi::orderBy('created_at','desc')->where('status','!=','selesai')->get();
        return view('dashboard.index',['transaksi' => $transaksi]);
    }
    public function produk()
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        return view('dashboard.produk',['produk' => $produk,'kategori'=>$kategori]);
    }
    public function kategori()
    {
        $kategori = Kategori::all();
        return view('dashboard.kategori',['kategori'=>$kategori]);
    }
    public function transaksi()
    {
        $transaksi = Transaksi::all();
        return view('dashboard.transaksi', ['transaksi' => $transaksi]);
    }
    public function admin()
    {
        return view('dashboard.admin');
    }
    public function customer()
    {
        return view('dashboard.customer');
    }
}
