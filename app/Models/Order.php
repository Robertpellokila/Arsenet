<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'paket_id',
        'user_id',
        'nama_pelanggan',
        'email_pelanggan',
        'telepon_pelanggan',
        'alamat_pelanggan',
        'status',
        'is_paid',
        'total_harga'
    ];

    public function paket()
    {
        return $this->belongsTo(related: Paket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Promo()
    {
        return $this->belongsTo(Promo::class);
    }


    public function scopeByUserEmail($query, $email)
    {
        return $query->whereHas('user', function ($query) use ($email) {
            $query->where('email', $email);
        });
    }
}