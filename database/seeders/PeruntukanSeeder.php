<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peruntukan;

class PeruntukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peruntukan = [
            ["peruntukan" => "Jual Beli"],
            ["peruntukan" => "Pewarisan"],
            ["peruntukan" => "Tukar Menukar"],
            ["peruntukan" => "Lelang"],
            ["peruntukan" => "Hibah"],
            ["peruntukan" => "Pembagian Hak Bersama"],
            ["peruntukan" => "Pemasukan Kedalam Perusahaan"],
            ["peruntukan" => "Pemecahan"],
            ["peruntukan" => "Pemisahan"],
            ["peruntukan" => "Penggabungan"],
            ["peruntukan" => "Konversi"],
            ["peruntukan" => "Wakaf"],
            ["peruntukan" => "Pemberian Hak Milik Perorangan"],
            ["peruntukan" => "Pemberian Hak Milik Badan Hukum"],
            ["peruntukan" => "Pemberian Hak Guna Usaha Perorangan"],
            ["peruntukan" => "Pemberian Hak Guna Usaha Badan Hukum"],
            ["peruntukan" => "Pemberian Hak Guna Bangunan Perorangan"],
            ["peruntukan" => "Pemberian Hak Guna Bangunan Badan Hukum"],
            ["peruntukan" => "Pemberian Hak Pakai Perorangan WNI"],
            ["peruntukan" => "Pemberian Hak Pakai Perorangan WNA"],
            ["peruntukan" => "Pemberian Hak Pakai Badan Hukum Indonesia"],
            ["peruntukan" => "Pemberian Hak Pakai Badan Hukum Asing"],
            ["peruntukan" => "Pemberian Hak Pakai Instansi Pemerintah"],
            ["peruntukan" => "Pemberian Hak Pakai Pemerintah Asing"],
            ["peruntukan" => "Pemberian Hak Pengelolaan Instansi Pemerintah / BUMN / BUMD"],
            ["peruntukan" => "P3MB/Prk 5"],
            ["peruntukan" => "Pemberian Hak Tanah Wakaf"],
            ["peruntukan" => "Pembaruan Hak Guna Usaha Perorangan"],
            ["peruntukan" => "Pembaruan Hak Guna Usaha Badan Hukum"],
            ["peruntukan" => "Pembaruan Hak Guna Bangunan Perorangan"],
            ["peruntukan" => "Pembaruan Hak Guna Bangunan Badan Hukum"],
            ["peruntukan" => "Pembaruan Hak Pakai Perorangan WNI"],
            ["peruntukan" => "Pembaruan Hak Pakai Perorangan WNA"],
            ["peruntukan" => "Pembaruan Hak Pakai Badan Hukum Indonesia"],
            ["peruntukan" => "Pembaruan Hak Pakai Badan Hukum Asing"],
            ["peruntukan" => "Pembaruan Hak Pakai Instansi Pemerintah"],
            ["peruntukan" => "Pembaruan Hak Pakai Pemerintah Asing"],
            ["peruntukan" => "Perpanjangan Hak Guna Bangunan Dan Hak Pakai"],
            ["peruntukan" => "Perpanjangan Hak Guna Usaha"],
            ["peruntukan" => "Perubahan Hak"],
            ["peruntukan" => "Wakaf Dari Tanah Terdaftar"],
            ["peruntukan" => "Pengukuran Pengembalian Batas"],
            ["peruntukan" => "Pengukuran Untuk Mengetahui Luas"],
            ["peruntukan" => "Penggantian Sertifikat Karena Hilang"],
            ["peruntukan" => "Penggantian Sertifikat Karena Rusak"],
            ["peruntukan" => "Penggantian Sertifikat Karena Blanko Lama"],
            ["peruntukan" => "Pengecekan Sertifikat"],
            ["peruntukan" => "Surat Keterangan Pendaftaran tanah"],
            ["peruntukan" => "Blokir"],
            ["peruntukan" => "Sita"],
            ["peruntukan" => "Pengangkatan Sita"],
            ["peruntukan" => "Pendaftaran Hak Tanggungan"],
            ["peruntukan" => "Roya"],
            ["peruntukan" => "Peralihan Hak Tanggungan"],
            ["peruntukan" => "Perubahan Kreditur"],
            ["peruntukan" => "Pendaftaran Hak Milik Satuan Rumah Susun"],
            ["peruntukan" => "Perpanjangan Hak Milik Satuan Rumah Susun"],
            ["peruntukan" => "Lain - lain"]
        ];

        foreach ($peruntukan as $p) {
            Peruntukan::create($p);
        }
    }
}
