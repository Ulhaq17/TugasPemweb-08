<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanFinansial extends Model
{
    use HasFactory;

    protected $table = 'catatanfinansial';

    protected $fillable = [
        'tanggal_transaksi',
        'tipe_transaksi',
        'kategori_transaksi',
        'nominal_transaksi',
        'deskripsi_transaksi',
        'file_path',
    ];

    public function posts() {
        return $this->hasMany('App\Post');
    }
}

