<?php

namespace App\Http\Controllers\Backend\Admin\RoleAndPermission;
use Illuminate\Contracts\Routing\ResponseFactor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function getusers()
    {
        return Permission::All();
    }
    public function dash_permission()
    {
       return  view('backend.dashboard.management.rolesandpermission.permission')
               ->with( 'permissions' ,$this->getusers());
    }

}
