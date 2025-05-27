<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class PeminjamanBukuTanah extends Component
{
    public function render()
    {

        if (Auth::User()->role == "admin") {
            $data = PeminjamanBukuTanah::with('users')->with('kecamatans')->with('kelurahans')->all();
        }else{
            $data = PeminjamanBukuTanah::where('peminjam_id',Auth::User()->id)->get();
        }

        return view('livewire.peminjaman-buku-tanah', $data);
    }
}
