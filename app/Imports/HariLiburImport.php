<?php

namespace App\Imports;

use App\Models\HariLibur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HariLiburImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        // dd($row);
        return new HariLibur([
            'tanggal'       => \Carbon\Carbon::parse($row['tanggal']),
            'keterangan'    => $row['keterangan'],
            'created_at'    => \Carbon\Carbon::parse(now()),
            'updated_at'    => \Carbon\Carbon::parse(now())
        ]);

        // return array([
        //     'tanggal'       => $row[0],
        //     'keterangan'    => $row[1]
        // ]);
    }
}
