<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kode_promo',
        'deskripsi',
        'tipe_diskon',
        'nilai_diskon',
        'maks_diskon',
        'min_transaksi',
        'mulai',
        'berakhir',
        'kuota',
        'digunakan',
        'is_active'
    ];

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
