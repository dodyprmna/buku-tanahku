<?php

namespace App\Livewire\Peminjaman;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\PeminjamanBukuTanah;
use App\Models\Peruntukan;
use Carbon\Carbon;
use Livewire\Component;

class Edit extends Component
{

    public $kelurahans,$peruntukans, $kecamatans, $jenisHak = ['Hak Milik', 'Hak Guna Bangunan', 'Hak Pakai', 'Wakaf'];
    public $idPeminjaman, $selectedJenisHak, $selectedPeruntukan, $nomorHak, $nomorSU, $selectedKecamatan, $selectedKelurahan;

    public function mount($id) {

        $peminjaman = PeminjamanBukuTanah::with('kelurahan.kecamatan')->findOrFail($id);

        $this->idPeminjaman = $peminjaman->id;
        $this->selectedJenisHak = $peminjaman->jenis_hak;
        $this->selectedPeruntukan = $peminjaman->peruntukan_id;
        $this->nomorHak = $peminjaman->nomor_hak;
        $this->nomorSU = $peminjaman->nomor_su;
        $this->selectedKecamatan = $peminjaman->kelurahan->kecamatan_id;
        $this->selectedKelurahan = $peminjaman->kelurahan_id;
        $this->kecamatans = Kecamatan::all();
        $this->kelurahans = Kelurahan::all();
        $this->peruntukans = Peruntukan::all();
    }
    public function render()
    {
        return view('livewire.peminjaman.edit')->title('Edit Peminjaman Buku Tanah');
    }

    function update() {
        $peminjaman = PeminjamanBukuTanah::findOrFail($this->idPeminjaman);
        $update = $peminjaman->update([
            'kelurahan_id'          => $this->selectedKelurahan,
            'peruntukan_id'         => $this->selectedPeruntukan,
            'jenis_hak'             => $this->selectedJenisHak,
            'nomor_hak'             => $this->nomorHak,
            'nomor_su'              => $this->nomorSU,
            'updated_at'            => Carbon::now('Asia/Jakarta')
        ]);

        if ($update) {
            $this->dispatch('swal', [
                'title' => 'Berhasil!',
                'text'  => 'Data berhasil disimpan!',
                'icon'  => 'success',
            ]);
        }
    }
}
