<?php

namespace App\Http\Controllers;

use App\Helpers\HtmlCleaner;
use App\Models\Tickets;
use App\Models\TicketsChats;
use Carbon\Carbon;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ticketsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tracking_id' => 'required|integer',
            'message'     => 'required|string|max:2000',
        ]);

        // Create ticket
        $ticket = Tickets::create([
            'tracking_id' => $request->tracking_id,
            'user_id'     => Auth::id(),
            'status'      => 0,
        ]);

        $cleanMessage = HtmlCleaner::clean($request->message);

        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Suppress HTML5 warnings

        $dom->loadHTML(mb_convert_encoding($cleanMessage, 'HTML-ENTITIES', 'UTF-8'));

        $anchors = $dom->getElementsByTagName('a');
        foreach ($anchors as $a) {
            if (!$a->hasAttribute('target')) {
                $a->setAttribute('target', '_blank');
            }
        }

        // Extract only the inner HTML from <body> to avoid <html><body> wrapper
        $body = $dom->getElementsByTagName('body')->item(0);
        $finalHtml = '';
        foreach ($body->childNodes as $child) {
            $finalHtml .= $dom->saveHTML($child);
        }
        // Add initial chat
        TicketsChats::create([
            'ticket_id' => $ticket->id,
            'from'      => 'user',
            'message'   => $finalHtml,
        ]);

        return response()->json([
            'message' => 'Ticket created successfully.',
            'ticket_id' => $ticket->id
        ]);
    }

    public function getChatConversation(Request $request, $ticketId)
    {
        $ticket = Tickets::with(['tracking:id,offer_name,offer_id,click_id,click_time', 'lastchat'])
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
            // 'media'     => 'nullable|file|max:10240', // Max 10 MB
        ]);

        $chat = new TicketsChats();
        $chat->ticket_id = $request->ticket_id;
        $chat->from = 'user';

        $cleanMessage = HtmlCleaner::clean($request->input('message'));

        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Suppress HTML5 warnings

        $dom->loadHTML(mb_convert_encoding($cleanMessage, 'HTML-ENTITIES', 'UTF-8'));

        $anchors = $dom->getElementsByTagName('a');
        foreach ($anchors as $a) {
            if (!$a->hasAttribute('target')) {
                $a->setAttribute('target', '_blank');
            }
        }

        // Extract only the inner HTML from <body> to avoid <html><body> wrapper
        $body = $dom->getElementsByTagName('body')->item(0);
        $finalHtml = '';
        foreach ($body->childNodes as $child) {
            $finalHtml .= $dom->saveHTML($child);
        }

        $chat->message = $finalHtml;
        $chat->save();

        Tickets::where('id',$request->ticket_id)->update(['updated_at'=>Carbon::now()->format('Y-m-d H:i:s')]);

        return response()->json(['success' => true, 'message' => 'Message sent']);
    }

    public function refreshTickets()
    {
        $tickets = Tickets::with(['lastchat', 'tracking'])->where('user_id',Auth::id())->orderByRaw('CASE WHEN status = 2 THEN 1 ELSE 0 END ASC')
        ->orderBy('updated_at', 'DESC') // adjust relationships
                        ->get(); // Apply necessary conditions

        return view('ticket-list', compact('tickets'));
    }

    public function uploadAttachment(Request $request)
    {

        $request->validate([
            'attachment'     => 'required|file|max:10240'
        ]);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('chat_media', $filename, 'public'); // stored in storage/app/public/attachments

            $url = asset('storage/' . $path);

            return response()->json([
                'success' => true,
                'url' => $url
            ]);
        }

        return response()->json(['success' => false], 400);
    }

    public function markUnread($id){
        $lastChat = \App\Models\TicketsChats::where('ticket_id', $id)
        ->orderBy('id', 'desc')->where('from','admin')
        ->first();

        if ($lastChat) {
            $lastChat->is_read_user = 0;
            $lastChat->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
    
}
