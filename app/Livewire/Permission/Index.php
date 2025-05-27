<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{

    public $permission;

    public $editingId;
    public $permissionName;

    public function render()
    {
        $this->permission = Permission::all();
        return view('livewire.permission.index', $this->permission);
    }

    function store() {
        $insert = Permission::create(['name' => $this->permissionName, 'guard_name' => 'web']);

        if (!$insert) {
            $this->dispatch('swal', [
                'title' => 'Gagal!',
                'text'  => 'Data gagal ditambahkan!',
                'icon'  => 'error',
            ]);

            return;
        }

        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text'  => 'Data berhasil ditambahkan!',
            'icon'  => 'success',
        ]);

        $this->resetForm();

        return;
    }

    function edit($id) {
        $this->editingId = $id;
        $data = Permission::find($this->editingId);
        $this->permissionName = $data->name;
    }

    function update() {
        $data = Permission::findOrFail($this->editingId);
        $update = $data->update([
            'name' => $this->permissionName,
        ]);

        if (!$update) {
            $this->dispatch('swal', [
                'title' => 'Gagal!',
                'text'  => 'Data gagal diperbarui!',
                'icon'  => 'error',
            ]);

            return;
        }

        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text'  => 'Data berhasil diperbarui!',
            'icon'  => 'success',
        ]);

        $this->resetForm();

        return;
    }

    function resetForm() {
        $this->reset(['editingId', 'permissionName']);
    }
}
