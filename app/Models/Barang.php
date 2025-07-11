<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Barang extends Model
{
    protected $fillable = [
        'nama_produk',
        'foto_produk',
        'harga',
        'qty',
        'idkategori',
        'deskripsi',
    ];

 public function kategori()
    {
    return $this->belongsTo(Kategori::class, 'idkategori');
}
public function keranjang()
{
    return $this->hasMany(Keranjang::class);
}
public function stok()
{
    return $this->hasMany(Stok::class);
}

}


