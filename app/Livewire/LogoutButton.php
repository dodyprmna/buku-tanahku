<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutButton extends Component
{
    public function render()
    {
        return view('livewire.logout-button');
    }

    function logout() {
        Auth::logout();
        Session::flush();

        return redirect()->route('login');
    }
}
