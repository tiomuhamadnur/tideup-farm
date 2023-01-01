<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investasi extends Model
{
    use HasFactory;

    protected $table = 'transaksi_investasi';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }
}