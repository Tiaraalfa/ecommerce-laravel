<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
     protected $table = 'stok';

    protected $fillable = [
        'barang_id', 'jumlah', 'resi'
    ];

     public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
