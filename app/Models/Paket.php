<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'gambar',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}