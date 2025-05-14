<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trouble extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'user_id', 'status','alamat', 'deskripsi', 'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

    public function scopeByUserEmail($query, $email)
    {
        return $query->whereHas('user', function ($query) use ($email) {
            $query->where('email', $email);
        });
    }
}