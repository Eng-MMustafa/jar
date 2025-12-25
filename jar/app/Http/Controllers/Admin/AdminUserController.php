<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserController extends Controller
{
    public function index()
    {
                
        $admins = Admin::with('roles')
            ->latest()
            ->paginate(10);
            
        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
                
        $roles = Role::all();
        
        return view('admin.admins.create', compact('roles'));
    }

    public function store(Request $request)
    {
                
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => true,
        ]);

        if ($request->has('roles')) {
            $admin->roles()->sync($request->roles);
        }

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin user created successfully.');
    }

    public function show(Admin $admin)
    {
                
        $admin->load('roles', 'permissions', 'auditLogs');
        
        return view('admin.admins.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
                
        $roles = Role::all();
        $admin->load('roles');
        
        return view('admin.admins.edit', compact('admin', 'roles'));
    }

    public function update(Request $request, Admin $admin)
    {
                
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
            'is_active' => 'boolean',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->boolean('is_active', $admin->is_active),
        ]);

        if ($request->filled('password')) {
            $admin->update(['password' => Hash::make($request->password)]);
        }

        if ($request->has('roles')) {
            $admin->roles()->sync($request->roles);
        }

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin user updated successfully.');
    }

    public function destroy(Admin $admin)
    {
                
        if ($admin->id === auth()->guard('admin')->id()) {
            return redirect()
                ->route('admin.admins.index')
                ->with('error', 'You cannot delete your own account.');
        }

        $admin->delete();

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin user deleted successfully.');
    }
}
