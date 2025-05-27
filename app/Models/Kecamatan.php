<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kecamatan extends Model
{

    protected $fillable = [
        'id',
        'nama_kecamatan'
    ];

    function kelurahan() : hasMany {
        return $this->hasMany(Kelurahan::class);
    }
}
