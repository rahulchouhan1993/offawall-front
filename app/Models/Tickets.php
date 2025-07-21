<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable = ['tracking_id', 'user_id', 'status'];

    public function chats()
    {
        return $this->hasMany(TicketsChats::class);
        
    }

    public function tracking()
    {
        return $this->belongsTo(Tracking::class);
    }
}

