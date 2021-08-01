<?php

namespace App\Http\Controllers\Backend\Admin\RoleAndPermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function getroles()
    {
        return Role::All();
    }
    public function dash_roles()
    {
        return  view('backend.dashboard.management.rolesandpermission.roles');

    }
}
