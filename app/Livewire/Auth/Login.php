<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

#[Layout('components.layouts.auth')]

class Login extends Component
{

    public $username;
    public $password;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function authentication() {
        $credentials = $this->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('username', $this->username)->first();
        if (!$user) {
            $this->dispatch('swal', [
                'title' => 'Gagal!',
                'text'  => 'Username tidak ditemukan',
                'icon'  => 'error',
            ]);
            return;
        };

        if (!Auth::attempt($credentials)) {
            $this->dispatch('swal', [
                'title' => 'Gagal!',
                'text'  => 'Password yang anda masukkan salah',
                'icon'  => 'error',
            ]);
            return;
        }


        session()->regenerate();
        return redirect()->intended('/'); // atau route index kamu


    }
}
