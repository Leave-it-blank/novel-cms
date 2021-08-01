<?php

namespace App\Http\Livewire\Backend\Management\Roles;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends Component
{   use AuthorizesRequests;
    public $name, $permission = [];
    public $permissions;
    protected $rules = [
        'name' => 'required|min:3|string',
        'permission' => 'nullable|array',

    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    private function get_permissions(){

        return Permission::all();
    }

    public function CreateRole()
    {
        $this->authorize('create_role', User::class);
       $role = Role::create([
            'name' => $this->name,
        ]);
       if($this->permission != null) {
       $role->givePermissionTo($this->permission);}
        $this->emit('Success_alert',   'Role Created!');
        $this->dispatchBrowserEvent('created-role');
        $this->emit('refreshroles');
        $this->reset();
    }
    public function render()
    {
        $this->permissions = $this->get_permissions();
        return view('livewire.backend.management.roles.create');
    }
}
