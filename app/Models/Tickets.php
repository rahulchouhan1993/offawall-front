<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tickets extends Model
{
    protected $fillable = ['tracking_id', 'user_id', 'status'];

    protected $appends = ['unread','total_unread'];

    public function chats()
    {
        return $this->hasMany(TicketsChats::class);
        
    }

    public function tracking()
    {
        return $this->belongsTo(Tracking::class);
    }

    public function lastchat()
    {
        return $this->hasOne(TicketsChats::class,'ticket_id')->latest();
    }

    public function getUnreadAttribute(){
        $count = TicketsChats::where('ticket_id',$this->id)->where('is_read_user',0)->where('from','admin')->count();

        return $count;
    }

    public function getTotalUnreadAttribute(){
        $count = TicketsChats::where('is_read_user',0)->where('from','admin')->count();

        return $count;
    }
}

