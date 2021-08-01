<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create_role(User $user)
    {
        if ($user->can('admin')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param User $user
     * @param Role $role
     * @return bool
     */
    public function delete(User $user)
    {
        if (Auth::user()->can('admin')) {

                return true;

        } else {
            return false;
        }
    }
    public function update(User $user)
    {
        if (Auth::user()->can('admin'))
        {
            return true;
        }
        else {
            return false;
        }
    }

    public function delete_role(User $user)
    {
        if ($user->can('admin')) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_country(User $user): bool
    {
        if ($user->can('admin')) {

            return true;
        }
        if ($user->can('management')) {
            return true;
        } else {
            return false;
        }
    }
}
