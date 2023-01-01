<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kambing extends Model
{
    use HasFactory;

    protected $table = 'kambing';
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