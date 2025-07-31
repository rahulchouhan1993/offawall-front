

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

    <li onclick="loadConversation({{ $ticket->id }});" class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer"> <img src="/images/user.webp" class="" />
        <div class="chatmsgBx ">
            <div class="chatmsg  ">
                <span class="chatTitle" title="{{ $ticket['tracking']['offer_name']}}">{{ Illuminate\Support\Str::limit($ticket['tracking']['offer_name'], 20) }}</span>
                    <p class="chatDes">{!! strip_tags($ticket['lastchat']['message']) !!}</p>
                <span class="chatTime">{{$formattedTime}}</span>
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