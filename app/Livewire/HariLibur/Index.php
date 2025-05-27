<?php

namespace App\Livewire\HariLibur;

use App\Imports\HariLiburImport;
use App\Models\HariLibur;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithFileUploads;

    public $file;
    public $tahun;

    function mount() {
        $this->tahun = now()->year;
    }

    function search() {
        $this->tahun;
    }

    public function render()
    {
        $data = [
            'hari_libur'    => HariLibur::whereYear('tanggal', $this->tahun)->orderBy('tanggal','asc')->paginate(10),
        ];
        return view('livewire.hari-libur.index', $data)->title('Hari Libur');
    }

    public function import() {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new HariLiburImport, $this->file->getRealPath());
            $this->dispatch('swal', [
                'title' => 'Berhasil!',
                'text'  => 'Data berhasil disimpan!',
                'icon'  => 'success',
            ]);
        } catch (\Exception $e) {
            $this->dispatch('swal', [
                'title' => 'Gagal!',
                'text'  => $e->getMessage(),
                'icon'  => 'error',
            ]);
        }

        $this->dispatch('close-modal');
    }
}
