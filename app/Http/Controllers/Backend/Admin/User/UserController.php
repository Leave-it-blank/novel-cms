<?php

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    use AuthorizesRequests;
     public function dash_users(){

         return view('backend.dashboard.management.user.index');
     }

    public function dash_user_edit( User $user){

        $roles = Role::all();

        return view('backend.dashboard.management.user.edit')->with([

            'user' => $user,
            'roles' => $roles,

        ]);
     }

    public function dash_user_update(Request $request ,  User $user){
        $this->authorize('update',  $user, User::class);
        $user->roles()->sync($request->roles);
        $user->name = $request->name;
        $user->email = $request->email;
    //    $user->country = $request->country;
        if ($user->save()) {
           // Livewire::emit('Success_alert',   'User Updated');
            return view('backend.dashboard.management.user.index');
        }

        return abort(403);
    }
}
