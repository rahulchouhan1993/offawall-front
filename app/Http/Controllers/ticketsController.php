<?php

namespace App\Http\Controllers;

use App\Helpers\HtmlCleaner;
use App\Models\Tickets;
use App\Models\TicketsChats;
use Carbon\Carbon;
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


    public function sendMessage(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'message'   => 'nullable|string',
            'media'     => 'nullable|file|max:10240', // Max 10 MB
        ]);

        $chat = new TicketsChats();
        $chat->ticket_id = $request->ticket_id;
        $chat->from = 'user';

        if ($request->hasFile('media')) {
            $path = $request->file('media')->store('chat_media', 'public');
            $url = asset('storage/' . $path);
            $ext = $request->file('media')->getClientOriginalExtension();

            // Use appropriate icon based on file type (optional: extend as needed)
            $icon = '📎'; // default
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) $icon = '🖼️';
            else if (in_array($ext, ['pdf'])) $icon = '📄';

            $chat->message = '<a href="' . $url . '" download>' . $icon . ' Attachment</a>';
        } else {
            $cleanMessage = HtmlCleaner::clean($request->input('message'));

            $chat->message = $cleanMessage;
        }

        $chat->save();

        Tickets::where('id',$request->ticket_id)->update(['updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);

        return response()->json(['success' => true, 'message' => 'Message sent']);
    }
    
}
