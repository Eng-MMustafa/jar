<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'message',
        'sender_type',
        'sender_id',
    ];

    public function ticket()
    {
        return $this->belongsTo(SupportTicket::class);
    }

    public function sender()
    {
        if ($this->sender_type === 'user') {
            return $this->belongsTo(User::class, 'sender_id');
        }
        return $this->belongsTo(Admin::class, 'sender_id');
    }
}
