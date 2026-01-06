<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'type',
        'is_active',
        'is_verified',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'rating',
        'reviews_count',
        'last_login_at',
        'last_login_ip',
        'business_name',
        'business_description',
        'hand_photo',
        'avatar',
        'bank_account_name',
        'bank_iban',
        'bank_account_number',
        'lender_status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
        'is_verified' => 'boolean',
        'rating' => 'decimal:2',
        'reviews_count' => 'integer',
        'password' => 'hashed',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Favorites (wishlist)
    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function lenderApplications()
    {
        return $this->hasMany(LenderApplication::class);
    }

    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class);
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function isLender(): bool
    {
        return $this->type === 'lender';
    }

    public function isRenter(): bool
    {
        return $this->type === 'renter';
    }

    public function getFormattedRatingAttribute(): string
    {
        return $this->rating > 0 ? number_format($this->rating, 1) : '0.0';
    }

    public function hasRatedProducts(): bool
    {
        return $this->reviews_count > 0;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    public function scopeRenters($query)
    {
        return $query->where('type', 'renter');
    }

    public function scopeLenders($query)
    {
        return $query->where('type', 'lender');
    }

    public function canLogin(): bool
    {
        return $this->is_active && !$this->trashed();
    }

    public function updateLastLogin($ip = null)
    {
        $this->update([
            'last_login_at' => now(),
            'last_login_ip' => $ip ?? request()->ip(),
        ]);
    }
}
