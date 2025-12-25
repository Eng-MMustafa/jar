<?php

namespace Database\Seeders;

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Admin Management
            'manage-admins',
            'view-admins',
            'create-admins',
            'edit-admins',
            'delete-admins',
            'suspend-admins',
            'activate-admins',
            'reset-admin-password',

            // Roles & Permissions
            'manage-roles',
            'view-roles',
            'create-roles',
            'edit-roles',
            'delete-roles',
            'activate-roles',
            'deactivate-roles',
            'sync-permissions',

            // Users Management
            'manage-users',
            'view-users',
            'suspend-users',
            'activate-users',

            // Lender Applications (KYC)
            'manage-applications',
            'view-applications',
            'approve-applications',
            'reject-applications',

            // Products Management
            'manage-products',
            'view-products',
            'suspend-products',
            'activate-products',
            'delete-products',

            // Categories Management
            'manage-categories',
            'view-categories',
            'create-categories',
            'edit-categories',
            'delete-categories',
            'enable-categories',
            'disable-categories',

            // Orders Management
            'manage-orders',
            'view-orders',
            'update-order-status',

            // Support Tickets
            'manage-tickets',
            'view-tickets',
            'assign-tickets',
            'update-ticket-status',
            'respond-tickets',

            // Static Content
            'manage-content',
            'view-content',
            'create-content',
            'edit-content',
            'delete-content',
            'publish-content',
            'unpublish-content',

            // Sliders
            'manage-sliders',
            'view-sliders',
            'create-sliders',
            'edit-sliders',
            'delete-sliders',
            'activate-sliders',
            'deactivate-sliders',

            // Reports & Analytics
            'view-reports',
            'export-reports',

            // Audit Logs
            'view-audit-logs',

            // Dashboard
            'view-dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
