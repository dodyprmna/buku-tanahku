<?php

namespace App\Livewire\Peminjaman;

use App\Livewire\PeminjamanBukuTanah;
use App\Models\Holiday;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Peruntukan;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Create extends Component
{
    public $bukuTanah = [];
    public $jenisHak = ['Hak Milik', 'Hak Guna Bangunan', 'Hak Pakai', 'Wakaf'];
    public $nomorHak;
    public $idKelurahan;
    // public $namaKelurahan;
    public $nomorSU;
    public $kecamatans = [];
    public $kelurahans = [];
    public $peruntukans = [];
    public $selectedJenisHak = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;
    public $selectedPeruntukan = null;
    public $editingIndex = null;

    function mount() {
        $this->kecamatans = Kecamatan::all();
        $this->peruntukans = Peruntukan::all();
    }

    function getKelurahan() {
        $this->kelurahans = Kelurahan::where('kecamatan_id', $this->selectedKecamatan)->orderBy('nama_kelurahan')->get();
        // dd($this->kelurahans);
    }

    public function render()
    {
        return view('livewire.peminjaman.create')->title('Buat Peminjaman Buku Tanah');
    }


    public function addItem() {

        $datakelurahan = Kelurahan::with('kecamatan')->find($this->selectedKelurahan);
        $dataperuntukan = Peruntukan::find($this->selectedPeruntukan);
        $this->bukuTanah[] = array(
            'jenis_hak'         => $this->selectedJenisHak,
            'nomor_hak'         => $this->nomorHak,
            'nomor_su'          => $this->nomorSU,
            'id_kecamatan'      => $this->selectedKecamatan,
            'id_kelurahan'      => $this->selectedKelurahan,
            'id_peruntukan'     => $this->selectedPeruntukan,
            'nama_kelurahan'    => $datakelurahan->nama_kelurahan,
            'nama_kecamatan'    => $datakelurahan->kecamatan->nama_kecamatan,
            'nama_peruntukan'   => $dataperuntukan->peruntukan
        );

        $this->reset(['selectedJenisHak', 'nomorHak', 'nomorSU', 'selectedKecamatan','selectedKelurahan','selectedPeruntukan']);
    }

    function editItem($index) {
        if (isset($this->bukuTanah[$index])) {
            $data =  $this->bukuTanah[$index];

            $this->selectedJenisHak = $data['jenis_hak'];
            $this->selectedPeruntukan = $data['id_peruntukan'];
            $this->nomorHak = $data['nomor_hak'];
            $this->nomorSU = $data['nomor_su'];
            $this->selectedKecamatan = $data['id_kecamatan'];
            $this->selectedKelurahan = $data['id_kelurahan'];

            $this->editingIndex = $index;
        }
        // return null;
    }

    public function updateItem() {
        if ($this->editingIndex !== null && isset($this->bukuTanah[$this->editingIndex])) {
            $datakelurahan = Kelurahan::with('kecamatan')->find($this->selectedKelurahan);
            $dataperuntukan = Peruntukan::find($this->selectedPeruntukan);
            $this->bukuTanah[$this->editingIndex] = array(
                'jenis_hak'         => $this->selectedJenisHak,
                'nomor_hak'         => $this->nomorHak,
                'nomor_su'          => $this->nomorSU,
                'id_kecamatan'      => $this->selectedKecamatan,
                'id_kelurahan'      => $this->selectedKelurahan,
                'id_peruntukan'     => $this->selectedPeruntukan,
                'nama_kelurahan'    => $datakelurahan->nama_kelurahan,
                'nama_kecamatan'    => $datakelurahan->kecamatan->nama_kecamatan,
                'nama_peruntukan'   => $dataperuntukan->peruntukan
            );

            $this->reset(['selectedJenisHak', 'nomorHak', 'nomorSU', 'selectedKecamatan','selectedKelurahan','selectedPeruntukan','editingIndex']);
        }
    }

    public function store() {

        $data = array();
        foreach ($this->bukuTanah as $key => $value) {
            $data[] = [
                'peminjam_id'           => Auth::User()->id,
                'kelurahan_id'          => $value['id_kelurahan'],
                'peruntukan_id'         => $value['id_peruntukan'],
                'jenis_hak'             => $value['jenis_hak'],
                'nomor_hak'             => $value['nomor_hak'],
                'nomor_su'              => $value['nomor_su'],
                'status'                => 0,
                'created_at'            => Carbon::now('Asia/Jakarta')
            ];
        }

        $insert = DB::table('peminjaman_buku_tanahs')->insert($data);

        $this->bukuTanah = [];
        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text'  => 'Data berhasil disimpan!',
            'icon'  => 'success',
        ]);

    }
}
