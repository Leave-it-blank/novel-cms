<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Page  $page
     * @return mixed
     */
    public function view(User $user, Page $page)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('admin')) {
            return true;
        }
        elseif ($user->can('edit series'))
        {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Page  $page
     * @return mixed
     */
    public function update(User $user, Page $page)
    {
        if ($user->can('admin')) {
            return true;
        }
        elseif ($user->can('edit series'))
        {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Page  $page
     * @return mixed
     */
    public function delete(User $user, Page $page)
    {
        if ($user->can('admin')) {
            return true;
        }
        elseif ($user->can('edit series'))
        {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Page  $page
     * @return mixed
     */
    public function restore(User $user, Page $page)
    {
        if ($user->can('admin')) {
            return true;
        }
        elseif ($user->can('delete series'))
        {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Page  $page
     * @return mixed
     */
    public function forceDelete(User $user, Page $page)
    {
        if ($user->can('admin')) {
            return true;
        }
        else{
            return false;
        }
    }
    public function search(User $user){

        if($user->can('edit series')){
            return true;
        }
    }
}
