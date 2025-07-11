<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
   use HasFactory;

    protected $fillable = [
        'user_id',
        'keranjang_id',
        'tanggal',
        'status',
        'no_resi',
        'metode_pembayaran',
        'bukti_pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }
}
