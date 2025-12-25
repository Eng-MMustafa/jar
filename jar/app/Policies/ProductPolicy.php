<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->hasPermissionTo('manage-products');
    }

    public function view(Admin $admin, Product $product)
    {
        return $admin->hasPermissionTo('manage-products');
    }

    public function create(Admin $admin)
    {
        return $admin->hasPermissionTo('manage-products');
    }

    public function update(Admin $admin, Product $product)
    {
        return $admin->hasPermissionTo('manage-products');
    }

    public function delete(Admin $admin, Product $product)
    {
        return $admin->hasPermissionTo('manage-products');
    }

    public function restore(Admin $admin, Product $product)
    {
        return $admin->hasPermissionTo('manage-products');
    }

    public function forceDelete(Admin $admin, Product $product)
    {
        return $admin->hasPermissionTo('manage-products');
    }

    public function activate(Admin $admin, Product $product)
    {
        return $admin->hasPermissionTo('manage-products');
    }

    public function deactivate(Admin $admin, Product $product)
    {
        return $admin->hasPermissionTo('manage-products');
    }

    public function feature(Admin $admin, Product $product)
    {
        return $admin->hasPermissionTo('manage-products');
    }

    public function unfeature(Admin $admin, Product $product)
    {
        return $admin->hasPermissionTo('manage-products');
    }
}
