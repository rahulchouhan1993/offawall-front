<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\TicketsChats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ticketsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tracking_id' => 'required|integer',
            'message'     => 'required|string|max:1000',
        ]);

        // Create ticket
        $ticket = Tickets::create([
            'tracking_id' => $request->tracking_id,
            'user_id'     => Auth::id(),
            'status'      => 0,
        ]);

        // Add initial chat
        TicketsChats::create([
            'ticket_id' => $ticket->id,
            'from'      => 'user',
            'message'   => $request->message,
        ]);

        return response()->json([
            'message' => 'Ticket created successfully.',
            'ticket_id' => $ticket->id
        ]);
    }
    
}
