<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $guarded = [];
    use HasFactory;
    public function produk()
    {
        return $this->belongsTo(Produk::class,'produk_id','id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }
}
