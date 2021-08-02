<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $guarded = [];
    use HasFactory;

    public function detail()
    {
        return $this->hasMany(Transaksi_detail::class,'transaksi_id','id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }
}
