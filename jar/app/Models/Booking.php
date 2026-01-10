<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'price_per_night' => 'decimal:2',
        'security_deposit' => 'decimal:2',
        'total' => 'decimal:2',
        'transfer_submitted_at' => 'datetime',
    ];

    protected $fillable = [
        'user_id',
        'product_id',
        'start_date',
        'end_date',
        'quantity',
        'nights',
        'price_per_night',
        'security_deposit',
        'total',
        'status',
        'notes',
        'transfer_proof_path',
        'transfer_status',
        'transfer_submitted_at',
        'transfer_note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }
}
