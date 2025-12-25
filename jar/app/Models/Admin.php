<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'last_login_at',
        'last_login_ip',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
        'password' => 'hashed',
    ];

    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }

    public function createdSliders()
    {
        return $this->hasMany(Slider::class, 'created_by');
    }

    public function updatedSliders()
    {
        return $this->hasMany(Slider::class, 'updated_by');
    }

    public function createdContents()
    {
        return $this->hasMany(StaticContent::class, 'created_by');
    }

    public function updatedContents()
    {
        return $this->hasMany(StaticContent::class, 'updated_by');
    }

    public function approvedApplications()
    {
        return $this->hasMany(LenderApplication::class, 'approved_by');
    }

    public function rejectedApplications()
    {
        return $this->hasMany(LenderApplication::class, 'rejected_by');
    }

    public function assignedTickets()
    {
        return $this->hasMany(SupportTicket::class, 'assigned_to');
    }

    public function canLogin(): bool
    {
        return $this->isActive();
    }
}
