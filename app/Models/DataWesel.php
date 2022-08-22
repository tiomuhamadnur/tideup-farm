<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWesel extends Model
{
    use HasFactory;
    protected $table = 'data_wesel';
    protected $guarded = [];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}