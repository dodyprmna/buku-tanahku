<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
class PeminjamanBukuTanah extends Model
{

    protected $fillable = [
        'peminjam_id',
        'kelurahan_id',
        'peruntukan_id',
        'jenis_hak',
        'nomor_hak',
        'nomor_su',
        'status',
        'tanggal_pinjam',
        'due_date_pengembalian',
        'created_at',
        'updated_at'
    ];


    function kelurahan() : BelongsTo {
        return $this->belongsTo(Kelurahan::class,'kelurahan_id');
    }

    function peminjam() : BelongsTo {
        return $this->belongsTo(User::class, 'peminjam_id');
    }

    function pengembalian() : HasOne {
        return $this->hasOne(PengembalianBukuTanah::class);
    }

    function peruntukan() : BelongsTo {
        return $this->belongsTo(Peruntukan::class);
    }
}
