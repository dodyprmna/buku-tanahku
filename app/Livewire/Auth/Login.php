<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.auth')]

class Login extends Component
{

    public $username ='';
    public $password ='';

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function authentication() {
        $credentials = $this->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect()->intended('/'); // atau route index kamu
        }

        $this->addError('email', 'Email atau password salah.');
    }
}
