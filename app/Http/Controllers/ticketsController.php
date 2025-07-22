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

    public function getChatConversation(Request $request, $ticketId)
    {
        $ticket = Tickets::with(['tracking:id,offer_name', 'lastchat'])
            ->where('id', $ticketId)
            ->first();

        $messages = TicketsChats::where('ticket_id', $ticketId)
            ->orderBy('created_at', 'ASC')
            ->get();

        TicketsChats::where('ticket_id', $ticketId)
            ->update(['is_read_user' => 1]);

        return response()->json([
            'ticket' => $ticket,
            'messages' => $messages
        ]);
    }
    
}
