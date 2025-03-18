<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelurahan extends Model
{
    function peminjaman() : HasMany {
        return $this->hasMany(PeminjamanBukuTanah::class);
    }

    function kecamatan() : BelongsTo {
        return $this->belongsTo(Kecamatan::class);
    }
}
