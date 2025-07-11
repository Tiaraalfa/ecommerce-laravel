<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasi';
    protected $fillable = [
        'id_stok', 'harga_satuan', 'qty', 'status', 'resi'
    ];
    }


