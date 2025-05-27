<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;

    public $editingId;
    public $name;
    public $username;
    public $role;
    public $roles = [];
    public $search = '';

    public function mount() {
        $this->roles = Role::all();
    }

    public function render()
    {
        $data = [
            'users' => User::with('roles')->paginate(10)
        ];
        return view('livewire.user.index', $data)->title('Master User');
    }

    public function store() {

        $user = User::create([
            'name'          => $this->name,
            'username'      => $this->username,
            'password'      => Hash::make($this->username)
        ]);

        $user->assignRole($this->role);

        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text'  => 'Data berhasil ditambahkan!',
            'icon'  => 'success',
        ]);
    }

    public function update() {

        // dd($this->role);
        $user = User::find($this->editingId);
        $user->update([
            'name'          => $this->name,
            'username'      => $this->username,
        ]);

        $user->syncRoles($this->role);

        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text'  => 'Data berhasil diperbarui!',
            'icon'  => 'success',
        ]);
    }

    public function edit($id) {
        $this->editingId = $id;
        $user = User::find($this->editingId);

        $this->role = $user->getRoleNames()->first();
        $this->username = $user->username;
        $this->name = $user->name;
    }

    public function resetForm() {
        $this->reset(['editingId', 'name', 'username', 'role']);
    }
}
