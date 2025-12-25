<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->hasPermissionTo('manage-users');
    }

    public function view(Admin $admin, User $user)
    {
        return $admin->hasPermissionTo('manage-users');
    }

    public function create(Admin $admin)
    {
        return $admin->hasPermissionTo('manage-users');
    }

    public function update(Admin $admin, User $user)
    {
        return $admin->hasPermissionTo('manage-users');
    }

    public function delete(Admin $admin, User $user)
    {
        return $admin->hasPermissionTo('manage-users');
    }

    public function restore(Admin $admin, User $user)
    {
        return $admin->hasPermissionTo('manage-users');
    }

    public function forceDelete(Admin $admin, User $user)
    {
        return $admin->hasPermissionTo('manage-users');
    }

    public function activate(Admin $admin, User $user)
    {
        return $admin->hasPermissionTo('manage-users');
    }

    public function deactivate(Admin $admin, User $user)
    {
        return $admin->hasPermissionTo('manage-users');
    }
}
