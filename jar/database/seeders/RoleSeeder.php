<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create Super Admin Role
        $superAdminRole = Role::create(['name' => 'Super Admin']);
        $superAdminRole->givePermissionTo(Permission::all());

        // Create Admin Role
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo([
            'view-dashboard',
            'manage-users',
            'view-users',
            'suspend-users',
            'activate-users',
            'manage-applications',
            'view-applications',
            'approve-applications',
            'reject-applications',
            'manage-products',
            'view-products',
            'suspend-products',
            'activate-products',
            'delete-products',
            'manage-categories',
            'view-categories',
            'create-categories',
            'edit-categories',
            'delete-categories',
            'enable-categories',
            'disable-categories',
            'manage-orders',
            'view-orders',
            'update-order-status',
            'manage-tickets',
            'view-tickets',
            'assign-tickets',
            'update-ticket-status',
            'respond-tickets',
            'manage-content',
            'view-content',
            'create-content',
            'edit-content',
            'delete-content',
            'publish-content',
            'unpublish-content',
            'manage-sliders',
            'view-sliders',
            'create-sliders',
            'edit-sliders',
            'delete-sliders',
            'activate-sliders',
            'deactivate-sliders',
            'view-reports',
            'export-reports',
            'view-audit-logs',
        ]);

        // Create Support Role
        $supportRole = Role::create(['name' => 'Support']);
        $supportRole->givePermissionTo([
            'view-dashboard',
            'manage-tickets',
            'view-tickets',
            'assign-tickets',
            'update-ticket-status',
            'respond-tickets',
            'manage-applications',
            'view-applications',
            'approve-applications',
            'reject-applications',
            'view-reports',
        ]);

        // Assign roles to admins
        $superAdmin = Admin::where('email', 'superadmin@jart.com')->first();
        if ($superAdmin) {
            $superAdmin->assignRole('Super Admin');
        }

        $admin = Admin::where('email', 'admin@jart.com')->first();
        if ($admin) {
            $admin->assignRole('Admin');
        }

        $support = Admin::where('email', 'support@jart.com')->first();
        if ($support) {
            $support->assignRole('Support');
        }
    }
}
