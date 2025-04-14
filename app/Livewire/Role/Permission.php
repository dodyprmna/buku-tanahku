<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class Permission extends Component
{

    public $groupedPermissions = [], $rolePermission = [];
    public $selectedPermission = [];
    public $selectedRole;

    function mount($id) {
        $this->selectedRole = $id;
        $role = Role::find($this->selectedRole);
        $this->selectedPermission = $role->permissions->pluck('name')->toArray();
    }

    public function render()
    {
        $permissions = ModelsPermission::all();

        foreach ($permissions as $permission) {
            $part = explode(" ", $permission->name);
            $this->groupedPermissions[$part[1]][] = $permission->name;
        };

        return view('livewire.role.permission');
    }

    function store() {

        $role = Role::find($this->selectedRole);
        $role->givePermissionTo($this->selectedPermission);

        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text'  => 'Hak akses berhasil ditambahkan!',
            'icon'  => 'success',
        ]);

        $this->reset(['groupedPermissions', 'rolePermission', 'selectedPermission', 'selectedRole']);
    }

    function update() {

        $role = Role::find($this->selectedRole);
        $role->syncPermissions($this->selectedPermission);

        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text'  => 'Hak akses berhasil diperbarui!',
            'icon'  => 'success',
        ]);

        $this->reset(['groupedPermissions', 'rolePermission', 'selectedPermission', 'selectedRole']);
    }
}
