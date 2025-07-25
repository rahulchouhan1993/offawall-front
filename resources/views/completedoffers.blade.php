<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="Googlebot-News" content="noindex, nnofollow">
	<meta name="googlebot" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <title>{{ $offerSettings->meta_title }}</title>
    <meta name="description" content="{{ $offerSettings->meta_description }}">
    {{-- <meta name="author" content="{{ $offerSettings->meta_title }}"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Open Graph for Social Media -->
    <meta property="og:title" content="{{ $offerSettings->meta_title }}">
    <meta property="og:description" content="{{ $offerSettings->meta_description }}">
    <meta property="og:image" content="images/favicon.png">
    <meta property="og:url" content="{{ url()->current() }}">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $offerSettings->meta_title }}">
    <meta name="twitter:description" content="{{ $offerSettings->meta_description }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <meta name="twitter:image" content="/images/favicon.png">
     <link rel="stylesheet" href="css/style.css?dfgdg">
    <style>
        html{height:100%;}
        body{height:100%;margin:0;padding:0;}
        *{box-sizing:border-box;}
        .menu li.active a{border-bottom-color:#000;color:bisque;}
        .menuNav li a.active{color:{{ $offerWallTemplate->headerActiveTextColor }} !important;}
        .cntbx{max-height:240px;overflow-y:auto;padding-right:15px;margin-bottom: 20px;}
        .cntbx::-webkit-scrollbar{width:6px; height: 6px;}
        .cntbx::-webkit-scrollbar-track{background:#f1f1f1;}
        .cntbx::-webkit-scrollbar-thumb{background:#888;}
        .cntbx::-webkit-scrollbar-thumb:hover{background:#555;}

        /* mdal */
        .modal{position:fixed;left:0;top:0;width:100%;height:100%;background-color:rgba(0,0,0,0.5);opacity:0;visibility:hidden;transform:scale(1.1);transition:visibility 0s linear 0.25s,opacity 0.25s 0s,transform 0.25s;}
        .modal-content{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);background-color:{{ $offerWallTemplate->offerBg }};padding:1rem 1.5rem;width:90%; max-width: 45rem;border-radius:0.5rem;}
        .close-button{text-align: center; cursor: pointer; width: 35px; height: 35px; background: #dc4848; display: flex ; position: absolute; right: -10px; top: -10px; font-size: 25px; align-items: center; justify-content: center; border-radius: 60px; color: #fff; border: 1px solid #dc4848;}
        .close-button:hover{background-color:#fff; color:#000}
        .show-modal{opacity:1;visibility:visible;transform:scale(1.0);transition:visibility 0s linear 0s,opacity 0.25s 0s,transform 0.25s;}
        .trigger { cursor: pointer;}
        .pending{background: #ff420f2b;    color: #f76815;}
        .awarded{background: #1399482b;    color: #438908;}
        .declined{background: #ff05052b;    color: #ff0101;}

        /* responsive */
        @media(max-width:767px){/* .boxList{flex-direction:column;}
        .cntbxsize{width:100%!important;}
        */
        .cntbxsize{flex-direction:column;justify-content:flex-start !important;align-items:flex-start !important;}
        .cntbxsize div{width:100% !important;}
        .cntbx{font-size:11px !important;line-height:18px;}
        .menu li a{padding:0 10px !important;}
        .cntbxsize button{margin:10px 0 0; max-width: 120px!important;}
        .cntbxsize h2 { margin: 0 0 2px!important; font-size: 12px!important; }
        .cntbxsize p { font-size: 11px!important; line-height: 13px!important; }
        .boxList { padding: 10px !important;gap: 9px !important; border-radius:5px!important;}
        .btnsm { margin-top:10px; max-width: 140px;padding: 7px 10px !important;}
        .cntmainbx { padding:20px!important;    padding-bottom: 80px!important;}
        }

        @media(max-width:480px){
        .modalbx {flex-wrap:wrap!important;}    
        }
    </style>
</head>
@php
    use App\Models\Tracking;
@endphp
<body>
    <!-- Static page -->
    <div style=" width: 100%;height: 100%;">
        <div style="display: flex ; flex-wrap: wrap; align-items: center; width: 100%; background: {{ $offerWallTemplate->headerBg }}; padding: 15px 15px; justify-content: space-between;">
            <a href="#" class="logo" style="margin: 0; font-size: 11px; font-weight: 600;">
               <img style="max-width: 150px;" src="/images/logo.png" />
            </a>
            <div style="display: flex ; align-items: center; justify-content: space-between; padding: 3px 5px; background:{{ $offerWallTemplate->headerMenuBg }}">
               <ul class="menuNav" style="display: flex; align-items: center; justify-content: start; gap: 10px; padding: 0; margin: 0; list-style: none;">
                  <li>
                     <a  href="{{ route('offerwall', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) }}" 
                        style="display: block; padding: 14px 10px; font-size: 15px; color: {{ $offerWallTemplate->headerNonActiveTextColor }}; border-bottom: 1px solid transparent; text-decoration: none;font-family: Open Sans;">
                     Offers
                     </a>
                  </li>
                  <li>
                     <a class="active" href="{{ route('completedOffers', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) }}" 
                        style="display: block; padding: 14px 10px; font-size: 15px; border-bottom: 1px solid transparent; text-decoration: none;font-family: Open Sans; background: {{ $offerWallTemplate->headerNonActiveTextColor }}">
                     My Rewards
                     </a>
                  </li>

               </ul>

               <div class="dropdown headDropdown">
                   <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>
                  <span class="countBxHead">
                        @if($unreadTickets != 0)
                           {{$unreadTickets}}
                        @else
                            {{''}}
                        @endif
                    </span>
                   </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  @guest
                  <li>
                     <a class="active" href="{{ route('login', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) }}" 
                        style="display: block; padding: 14px 10px; font-size: 15px; border-bottom: 1px solid transparent; text-decoration: none;font-family: Open Sans; background: {{ $offerWallTemplate->headerActiveBg }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z"></path></svg> Login
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('register', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) }}" 
                        style="display: block; padding: 14px 10px; font-size: 15px; color: {{ $offerWallTemplate->headerNonActiveTextColor }}; border-bottom: 1px solid transparent; text-decoration: none;font-family: Open Sans;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10 11V8L15 12L10 16V13H1V11H10ZM2.4578 15H4.58152C5.76829 17.9318 8.64262 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C8.64262 4 5.76829 6.06817 4.58152 9H2.4578C3.73207 4.94289 7.52236 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C7.52236 22 3.73207 19.0571 2.4578 15Z"></path></svg> Register
                     </a>
                  </li>
                  @endguest  

                  <li>
                    <a href="{{ route('tickets', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) }}" 
                    onclick="handleTicketClick(event)"
                    id="ticketLink"
                    style="display: block; padding: 14px 10px; font-size: 15px; color: {{ $offerWallTemplate->headerNonActiveTextColor }}; border-bottom: 1px solid transparent; text-decoration: none;font-family: Open Sans;">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M2.00488 9.49979V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V9.49979C20.6242 9.49979 19.5049 10.6191 19.5049 11.9998C19.5049 13.3805 20.6242 14.4998 22.0049 14.4998V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V14.4998C3.38559 14.4998 4.50488 13.3805 4.50488 11.9998C4.50488 10.6191 3.38559 9.49979 2.00488 9.49979ZM4.00488 7.96755C5.4866 8.7039 6.50488 10.2329 6.50488 11.9998C6.50488 13.7666 5.4866 15.2957 4.00488 16.032V18.9998H20.0049V16.032C18.5232 15.2957 17.5049 13.7666 17.5049 11.9998C17.5049 10.2329 18.5232 8.7039 20.0049 7.96755V4.99979H4.00488V7.96755ZM9.00488 8.99979H15.0049V10.9998H9.00488V8.99979ZM9.00488 12.9998H15.0049V14.9998H9.00488V12.9998Z"></path></svg> Tickets
                    </a>
                </li>

                @auth
                  <li>
                     <a href="{{ route('logout', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) }}" 
                        style="display: block; padding: 14px 10px; font-size: 15px; color: {{ $offerWallTemplate->headerNonActiveTextColor }}; border-bottom: 1px solid transparent; text-decoration: none;font-family: Open Sans;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M2.00488 9.49979V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V9.49979C20.6242 9.49979 19.5049 10.6191 19.5049 11.9998C19.5049 13.3805 20.6242 14.4998 22.0049 14.4998V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V14.4998C3.38559 14.4998 4.50488 13.3805 4.50488 11.9998C4.50488 10.6191 3.38559 9.49979 2.00488 9.49979ZM4.00488 7.96755C5.4866 8.7039 6.50488 10.2329 6.50488 11.9998C6.50488 13.7666 5.4866 15.2957 4.00488 16.032V18.9998H20.0049V16.032C18.5232 15.2957 17.5049 13.7666 17.5049 11.9998C17.5049 10.2329 18.5232 8.7039 20.0049 7.96755V4.99979H4.00488V7.96755ZM9.00488 8.99979H15.0049V10.9998H9.00488V8.99979ZM9.00488 12.9998H15.0049V14.9998H9.00488V12.9998Z"></path></svg> Logout
                     </a>
                  </li>
                  @endauth
               </ul>
               </div>
            </div>
         </div>
        <div style="display: flex ; height: 100%;  padding-bottom: 60px; align-items: start; width: 100%; flex-direction: column; font-family: Open Sans; background-color:{{ $offerWallTemplate->bodyBg }}">
            <div  class="cntmainbx" style="width:100%; display: flex; flex-direction: column; align-items: flex-start; gap: 15px;padding: 60px;padding-bottom: 80px; background: {{ $offerWallTemplate->bodyBg }};">
            @if($allOffers['offers'])
                @foreach ($allOffers['offers'] as $trackId => $offer)
                    @php
                    $trackingDetails = Tracking::find($trackId);
                        $totalPayoutGiven = $trackingDetails->reward;
                    @endphp
                    <div class="boxList" style="display: flex; align-items: center; flex-wrap:wrap; gap: 20px; padding: 20px;     box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2); border-radius:15px; background: {{ $offerWallTemplate->offerBg }}; border: 1px solid {{ $offerWallTemplate->offerBg }}; width: 100%;">

                    {{-- Top-right ticket icon --}}
                    @if(!empty($offer['ticket_id']))
                    <div style="position: relative; top: 0px; right: 0px;" title="Ticket created for this reward.">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#4CAF50" viewBox="0 0 24 24">
                            <path d="M12 0C5.37109 0 0 5.37109 0 12C0 18.6289 5.37109 24 12 24C18.6289 24 24 18.6289 24 12C24 5.37109 18.6289 0 12 0ZM10.2422 17.3203L4.92188 12L6.33594 10.5859L10.2422 14.4922L17.6641 7.07031L19.0781 8.48438L10.2422 17.3203Z" />
                        </svg>
                    </div>
                    @endif

                        <div style="width: 100%; display: flex ; align-items: center; gap:10px;">

                        <div style="width: 107px;">
                            <img src="{{ $offer['logo'] }}" alt="img" style="width: 100px; max-width: 100%; object-fit: cover;" />
                        </div>
                        @php $descriptionOffer = html_entity_decode(strip_tags($offer['description_lang'])); @endphp
                        @if(empty($descriptionOffer))
                            @php $descriptionOffer = $offerSettings->default_description; @endphp
                        @endif
                        <div class="cntbxsize" style="width: calc(100% - 107px); display: flex; align-items: center; justify-content: space-between;">
                            <div style="width: calc(100% - 200px);">
                                <h2 style="margin: 0 0 10px; font-weight: 600; font-size: 18px; color: {{ $offerWallTemplate->offerText }};">{{ $trackingDetails->offer_name }}</h2>
                            </div>
                            <div style="min-width: 150px;">
                                <a class="btnsm" 
                                    href="javascript:void(0);"
                                    style="
                                    display: flex;
                                    align-items: center;
                                    gap: 10px;
                                    padding: 8px 15px 8px 15px;
                                    background: {{ $offerWallTemplate->offerButtonBg }};
                                    font-family: Open Sans;
                                    font-size: 15px;
                                    width: 100%;
                                    text-align: center;
                                    justify-content: center;
                                    border: none;
                                    text-decoration:none;
                                    color:{{ $offerWallTemplate->offerButtonText }};
                                    "
                                    > + 
                                        {{ $totalPayoutGiven }}
                                    </a>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex ; flex-wrap: wrap; justify-content: space-between; align-items: center; width: 100%; background-color: {{ $offerWallTemplate->offerText }}; padding: 9px 15px; border-radius: 6px; gap:10px">
                        <div style="display: flex ; justify-content: space-between; align-items: center; gap: 4px;">
                            <svg style="width: 18px; height: 18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ $offerWallTemplate->offerBg }}">
                                <path d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z"></path>
                            </svg>
                            <h2 style="font-size: 13px; color: {{ $offerWallTemplate->offerBg }}; margin: 0; font-weight: 600;">{{ ($trackingDetails->click_time) ? date('d M Y',strtotime($trackingDetails->click_time)) : date('d M Y',strtotime($trackingDetails->created_at)) }}</h2>
                        </div>
                        <div style="display: flex ; justify-content: space-between; align-items: center; gap: 4px;">
                        
                        <svg style="width: 18px; height: 18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="{{ $offerWallTemplate->offerBg }}"><path d="M17.6177 5.9681L19.0711 4.51472L20.4853 5.92893L19.0319 7.38231C20.2635 8.92199 21 10.875 21 13C21 17.9706 16.9706 22 12 22C7.02944 22 3 17.9706 3 13C3 8.02944 7.02944 4 12 4C14.125 4 16.078 4.73647 17.6177 5.9681ZM12 20C15.866 20 19 16.866 19 13C19 9.13401 15.866 6 12 6C8.13401 6 5 9.13401 5 13C5 16.866 8.13401 20 12 20ZM11 8H13V14H11V8ZM8 1H16V3H8V1Z"></path></svg>
                            <h2 style="font-size: 13px; color: {{ $offerWallTemplate->offerBg }}; margin: 0; font-weight: 600;">{{ ($trackingDetails->status) ? 'Completed' : 'Pending'; }}</h2>
                        </div>
                        
                        </div>
                        @if(empty($offer['ticket_id']))
                        <div onclick="openPopup(this,{{$trackingDetails->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#555" viewBox="0 0 24 24">
                                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02
                                0-1.41l-2.34-2.34a.9959.9959 0 0 0-1.41 0L15.13 4.9l3.75 3.75 1.83-1.61z"/>
                            </svg>
                        </div>
                        @endif
                    </div>


                    <div id="descriptionModal_{{$trackingDetails->id}}" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5); justify-content:center; align-items:center; z-index:1000;">
                        <div style="background:#fff; padding:20px; border-radius:10px; width: 800px; max-width: 90%;">
                            <h3 style="margin-bottom: 20px;">Describe your case, so that it helps us to investigate this further.</h3>
                            <label for="offer_name_id_{{$trackingDetails->id}}" style="margin-right:20px;margin-bottom:20px">Offer Name</label>
                            <input type="text" id="offer_name_id_{{$trackingDetails->id}}" value="{{ $trackingDetails->offer_name }}" size="50" disabled> <br>
                            <label for="offer_name_id_{{$trackingDetails->id}}" style="margin-right:20px;margin-bottom:20px">Description</label>
                            <textarea id="popupDescription_{{$trackingDetails->id}}" class="w-full flex-1 py-[15px] px-[30px] border-none bg-[#f2f2f2] rounded-[80px] text-[11px] md:text-[15px] text-black focus:outline-none"></textarea> <br>
                            <input type="hidden" id="offer_id_{{$trackingDetails->id}}" value="{{ $trackingDetails->id }}">
                            <div style="text-align: right;">
                                <button onclick="submitDescription({{$trackingDetails->id}})" style="padding: 6px 12px; background: #28a745; color: #fff; border: none; border-radius: 4px;">Submit</button>
                                <button onclick="closePopup({{$trackingDetails->id}})" style="padding: 6px 12px; background: #dc3545; color: #fff; border: none; border-radius: 4px;">Cancel</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
            <div style="padding: 20px 15px; display: flex ; justify-content: space-between; align-items: center; width: 100%; position: fixed; bottom: 0; background-color: {{ $offerWallTemplate->footerBg }}">
                <h2 style="margin: 0; font-size: 11px; font-weight: 600;"><img style="max-width: 150px;" src="/images/logo.png" /></h2>
                @if ($offerSettings->privacy_policy==1)
                <a href="" class="footerText-colordy" style="margin: 0px; font-size: 14px; color: {{ $offerWallTemplate->footerText }};">Privacy policy</a>
                @endif
             </div>
        </div>
    </div>

    
  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
</body>
<script>
    let currentBox = null;

    function openPopup(triggerIcon,id) {
        $('#popupDescription_'+id).summernote({
            height: 50,
            placeholder: 'Write your query here...',
            toolbar: [],
        });

        var userLoggedIn = "{{ $userLoggedIn }}";
        var route = `{!! route('login', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) !!}`;

        if (!userLoggedIn) {
            location.href = route;
        }
        else{
            
            currentBox = triggerIcon.closest('.boxList');
            document.getElementById('descriptionModal_'+id).style.display = 'flex';
        }

    }

    function handleTicketClick(event) {
        event.preventDefault(); // stop default link navigation

        var userLoggedIn = "{{ $userLoggedIn }}";
        var loginRoute = `{!! route('login', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) !!}`;
        var ticketRoute = document.getElementById('ticketLink').href;

        if (!userLoggedIn || userLoggedIn === "false") {
            window.location.href = loginRoute;
        } else {
            window.location.href = ticketRoute;
        }
    }

    function closePopup(id) {
        $('#descriptionModal_'+id).hide();
        $('#popupDescription_'+id).val('');
    }

    function submitDescription(id) {
        const description = $('#popupDescription_'+id).val().trim();
        const offerId = $('#offer_id_'+id).val();

        if (description === '') {
            toastr.warning('Please enter a description.');
            return;
        }

        $.ajax({
            url: '{{ route("createTicket") }}', // Define this route in web.php
            type: 'POST',
            data: {_token: '{{ csrf_token() }}',
                    message: description,
                    tracking_id: offerId
                    },
            success: function(response) {
                
                toastr.success(response.message || 'Description saved!');
                closePopup(id);
                setTimeout(function () {
                    window.location.href = `{!! route("tickets", ["apiKey" => $requestedParams["apiKey"], "wallId" => $requestedParams["wallId"], "userId" => $requestedParams["userId"], "sub4" => $requestedParams["sub4"], "sub5" => $requestedParams["sub5"], "sub6" => $requestedParams["sub6"]]) !!}`;
                }, 1000);
            },
            error: function(xhr) {
                let errorMessage = 'Something went wrong.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                toastr.error(errorMessage);
            }
        });
    }
</script>
</html>