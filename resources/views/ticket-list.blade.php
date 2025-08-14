

<ul class="m-[0]">
@if(!empty($tickets))
@foreach($tickets as $ticket)
        @php

            $updatedAt = \Carbon\Carbon::parse($ticket['lastchat']['created_at']);

            if ($updatedAt->isToday()) {
                $formattedTime = 'Today ' . $updatedAt->format('h:i A');
            }else {
                $formattedTime = $updatedAt->format('D h:i A');
            }
        @endphp

    <li id="ticket-{{ $ticket->id }}" 
    data-id="{{ $ticket->id }}" 
    onclick="loadConversation({{ $ticket->id }}, this);"  
    class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer">

        <img src="/images/user.webp" class="" />

        <div class="chatmsgBx flex justify-between w-full">
            <div class="chatmsg">
                <span class="chatTitle" title="{{ $ticket['tracking']['offer_name']}}">
                    {{ Illuminate\Support\Str::limit($ticket['tracking']['offer_name'], 17) }}
                </span>
                <p class="chatDes">{!! strip_tags($ticket['lastchat']['message']) !!}</p>
            </div>

            <div class="chatMeta flex flex-col items-end">
                <span class="chatTime">{{$formattedTime}}</span>
                @if($ticket->status == 2)
                    <span style="background-color:#dc2626; color:#fff; padding:2px 6px; border-radius:4px; font-size:11px; display:inline-block; margin-top:3px;">
                        Closed
                    </span>
                @endif
            </div>
        </div>

        @if($ticket['unread'] != 0)
            <span class="chatCount">{{$ticket['unread']}}</span>
        @endif
    </li>
@endforeach
@else
        

@endif
</ul>