<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'rental_price_daily',
        'rental_price_weekly',
        'rental_price_monthly',
        'rental_price_hourly',
        'rental_type',
        'security_deposit',
        'city',
        'sku',
        'stock_quantity',
        'min_stock_level',
        'is_active',
        'is_featured',
        'is_rentable',
        'rating',
        'reviews_count',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'rental_price_daily' => 'decimal:2',
        'rental_price_weekly' => 'decimal:2',
        'rental_price_monthly' => 'decimal:2',
        'rental_price_hourly' => 'decimal:2',
        'security_deposit' => 'decimal:2',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_rentable' => 'boolean',
        'rating' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    // Users who favorited this product
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function isInStock(): bool
    {
        return $this->stock_quantity > $this->min_stock_level;
    }

    public function getPrimaryImageAttribute()
    {
        // Return the related ProductImage model (so views can access ->image_path)
        return $this->primaryImage()->first();
    }

    /**
     * Convenience attribute for getting the primary image path directly.
     */
    public function getPrimaryImagePathAttribute()
    {
        return $this->primaryImage()?->image_path ?? $this->primaryImage()->first()?->image_path;
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 2);
    }

    public function getFormattedRentalPriceDailyAttribute(): string
    {
        return $this->rental_price_daily ? number_format($this->rental_price_daily, 2) : '0.00';
    }

    public function getFormattedRentalPriceWeeklyAttribute(): string
    {
        return $this->rental_price_weekly ? number_format($this->rental_price_weekly, 2) : '0.00';
    }

    public function getFormattedRentalPriceMonthlyAttribute(): string
    {
        return $this->rental_price_monthly ? number_format($this->rental_price_monthly, 2) : '0.00';
    }

    public function getFormattedRatingAttribute(): string
    {
        return $this->rating > 0 ? number_format($this->rating, 1) : '0.0';
    }

    public function hasReviews(): bool
    {
        return $this->reviews_count > 0;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeRentable($query)
    {
        return $query->where('is_rentable', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    public function scopeLowStock($query)
    {
        return $query->whereRaw('stock_quantity <= min_stock_level');
    }

    public function isAvailable(): bool
    {
        return $this->is_active && $this->isInStock();
    }

    public function getAvailabilityStatusAttribute(): string
    {
        if (!$this->is_active) return 'Inactive';
        if ($this->stock_quantity <= $this->min_stock_level) return 'Low Stock';
        if ($this->stock_quantity == 0) return 'Out of Stock';
        return 'Available';
    }

    // Comments relation
    public function comments()
    {
        return $this->hasMany(Comment::class)->where('is_visible', true)->latest();
    }

    // Bookings relation
    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class);
    }
}
