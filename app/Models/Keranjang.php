<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; 

class Keranjang extends Model
{   
     protected $table = 'keranjangs';
     protected $fillable = [
        'barang_id',  // tambahkan ini
        'jumlah_produk',
        'nama',       // kalau kamu juga simpan nama
        'user_id', 
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
