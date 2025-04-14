<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{

    public $role;
    public $permissionRole;
    public $roleName;
    public $editingId;
    public $deleteId;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function render()
    {
        $this->role = Role::all();
        return view('livewire.role.index');
    }

    function store() {
        $insert = Role::create(['name' => $this->roleName, 'guard_name' => 'web']);

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
    }

    function edit($id) {
        $this->editingId = $id;
        $role = Role::find($this->editingId);

        $this->roleName = $role->name;
    }

    function update() {
        $data = Role::findOrFail($this->editingId);
        $update = $data->update([
            'name' => $this->roleName,
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
    }

    function deleteConfirmation($id) {
        $this->deleteId = $id;
        $this->dispatch('confirm-delete');
    }

    function delete() {
        $delete = Role::findOrFail($this->deleteId)->delete();
        if (!$delete) {
            $this->dispatch('swal', [
                'title' => 'Gagal!',
                'text'  => 'Data gagal dihapus!',
                'icon'  => 'error',
            ]);

            return;
        }

        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text'  => 'Data berhasil dihapus!',
            'icon'  => 'success',
        ]);

        $this->resetForm();
    }
    function resetForm() {
        $this->reset(['editingId', 'roleName','permissionRole', 'deleteId']);
    }
}
