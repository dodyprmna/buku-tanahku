<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peruntukan extends Model
{
    function peminjaman() : HasMany {
        return $this->hasMany(PeminjamanBukuTanah::class, 'peruntukan_id');
    }
}
