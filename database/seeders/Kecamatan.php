<?php

namespace Database\Seeders;

use App\Models\Kecamatan as ModelsKecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Kecamatan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKecamatan = [
            ["nama_kecamatan"  => "Barat"],
            ["nama_kecamatan"  => "Bendo"],
            ["nama_kecamatan"  => "Karangrejo"],
            ["nama_kecamatan"  => "Karas"],
            ["nama_kecamatan"  => "Kartoh]arjo"],
            ["nama_kecamatan"  => "Kawedanan"],
            ["nama_kecamatan"  => "Lembeyan"],
            ["nama_kecamatan"  => "Magetan"],
            ["nama_kecamatan"  => "Maospati"],
            ["nama_kecamatan"  => "Ngariboyo"],
            ["nama_kecamatan"  => "Nguntoronadi"],
            ["nama_kecamatan"  => "Panekan"],
            ["nama_kecamatan"  => "Parang"],
            ["nama_kecamatan"  => "Plaosan"],
            ["nama_kecamatan"  => "Poncol"],
            ["nama_kecamatan"  => "Sidorejo"],
            ["nama_kecamatan"  => "Sukomoro"],
            ["nama_kecamatan"  => "Takeran"],
        ];
        foreach ($dataKecamatan as $kecamatan) {
            ModelsKecamatan::create($kecamatan);
        }
    }
}
