<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\SupportTicket;
use App\Models\Slider;
use App\Models\StaticContent;
use App\Models\Admin;
use App\Models\Role;
use App\Policies\UserPolicy;
use App\Policies\ProductPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
        Product::class => ProductPolicy::class,
        Category::class => CategoryPolicy::class,
        Order::class => OrderPolicy::class,
        SupportTicket::class => SupportTicketPolicy::class,
        Slider::class => SliderPolicy::class,
        StaticContent::class => StaticContentPolicy::class,
        Admin::class => AdminPolicy::class,
        Role::class => RolePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "Super Admin" all permissions
        Gate::before(function (Admin $admin, $ability) {
            return $admin->hasRole('Super Admin') ? true : null;
        });
    }
}
