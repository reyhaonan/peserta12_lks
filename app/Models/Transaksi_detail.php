<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_detail extends Model
{
    protected $table = 'transaksi_detail';
    protected $guarded = [];
    use HasFactory;

    public function produk()
    {
        return $this->hasOne(Produk::class,'id','produk_id');
    }
    public function customer()
    {
        return $this->hasOne(User::class,'customer_id','id');
    }
}
