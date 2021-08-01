<?php

namespace App\Http\Livewire\Backend\Management\Roles;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class Index extends Component
{   use AuthorizesRequests;
    use WithPagination;
    public $roles;
    protected $listeners = ['refreshroles' => 'get_roles'];
    public function get_roles(){

        return Role::with('permissions')->paginate(5);
    }

    public function delete_role(Role  $role)
    {
        $this->authorize('delete_role',  User::class);
        $role->delete();
        $this->emit('Success_alert',  'Role has been Deleted!');
    }
    public function render()
    {
        return view('livewire.backend.management.roles.index');

    }
}
