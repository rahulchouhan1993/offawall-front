<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="Googlebot-News" content="noindex, nofollow">
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
      
      <!-- Twitter Card -->
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="{{ $offerSettings->meta_title }}">
      <meta name="twitter:description" content="{{ $offerSettings->meta_description }}">
      <meta name="twitter:image" content="/images/favicon.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css?dfgdg">
      <style>
         html{height:100%;}
         body{height:100%;margin:0;padding:0;    background: #eef0f8;}
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
         .modal-content{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);background-color:{{ $offerWallTemplate->offerBg }};padding:1rem 1rem;width:94%; max-width: 430px;border-radius:0.5rem;}
         .close-button{text-align: center; cursor: pointer; width: 35px; height: 35px; background: #dc4848; display: flex ; position: absolute; right: -10px; top: -10px; font-size: 25px; align-items: center; justify-content: center; border-radius: 60px; color: #fff; border: 1px solid #dc4848;}
         .close-button svg {width: 17px;}
         .close-button:hover{background-color:#fff; color:#000}
         .show-modal{opacity:1;visibility:visible;transform:scale(1.0);transition:visibility 0s linear 0s,opacity 0.25s 0s,transform 0.25s;}
         .trigger { cursor: pointer;}
         .arrow-icon {width: 20px;height: 20px;fill: {{ $offerWallTemplate->offerButtonText }};animation:moveArrow 1s infinite alternate ease-in-out;}
         .is-special-offer { overflow: hidden; position: relative; } .is-special-offer:before { content: 'Featured'; position: absolute; top: 0; left: 0; width: 115px; background: #9b2a2a; background: linear-gradient(90deg,rgba(155, 42, 42, 1) 0%, rgba(0, 0, 0, 1) 69%); text-align: center; color: #fff; padding-top: 25px; font-weight: bold; font-size: 12px; line-height: 28px; transform: rotate(-45deg) translate(-22px, -33px); text-shadow: 0 0 15px #fff; }
         @keyframes moveArrow {
            0% {
            transform: translateX(0);
            }
            100% {
            transform: translateX(6px);
            }
         }

        @keyframes glowing-border {
         0%, 100% {
            border-color: transparent;
            box-shadow: none;
         }
         50% {
            border-color: {{ $offerWallTemplate->offerButtonBg }};
            box-shadow: 0 0 10px 2px {{ $offerWallTemplate->offerButtonBg }},
                        0 0 20px 4px {{ $offerWallTemplate->offerButtonBg }};
         }
      }

      .is-special-offer {
         padding: 20px;
         border: 2px solid transparent;
         border-radius: 10px;
         animation: glowing-border 2s infinite ease-in-out;
         transition: all 0.3s ease-in-out;
      }

         
         /* responsive */
         @media(max-width:767px){/* .boxList{flex-direction:column;}
         .cntbxsize{width:100%!important;}
         */
         .cntbxsize{flex-direction:column;justify-content:flex-start !important;align-items:flex-start !important;}
         .cntbxsize > div{width:100% !important;}
         .cntbx{font-size:11px !important;line-height:18px;}
         .menu li a{padding:0 10px !important;}
         .cntbxsize button{margin:10px 0 0; max-width: 120px!important;}
         .cntbxsize h2 { margin: 0 0 2px!important; font-size: 16px!important; }
         .cntbxsize p { font-size: 11px!important; line-height: 13px!important; }
         .boxList { padding: 10px !important;         gap: 9px !important;}
         .btnsm {margin-top: 5px; max-width: 160px; font-size: 12px !important; padding: 5px 5px !important;}
         .cntmainbx { padding:20px!important;    padding-bottom: 80px!important;}
         .menuNav { gap:5px!important;}
         }
         @media(max-width:480px){
         .modalbx {/*flex-wrap:wrap!important;*/    align-items: flex-start!important;    gap: 6px!important;}    
         .logo img { max-width:100px!important;}
         }
      </style>
   </head>
   @php
      use App\Models\Tracking;
      $skipDuplicate = [];
   @endphp
   <body>
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
                     <a href="{{ route('completedOffers', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) }}" 
                        style="display: block; padding: 14px 10px; font-size: 15px; color: {{ $offerWallTemplate->headerNonActiveTextColor }}; border-bottom: 1px solid transparent; text-decoration: none;font-family: Open Sans;">
                     My Rewards
                     </a>
                  </li>

               </ul>

               <div class="dropdown headDropdown">
                   <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>
                   </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li>
                     <a href="{{ route('login', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) }}" 
                        style="display: block; padding: 14px 10px; font-size: 15px; color: {{ $offerWallTemplate->headerNonActiveTextColor }}; border-bottom: 1px solid transparent; text-decoration: none;font-family: Open Sans;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z"></path></svg> Login
                     </a>
                  </li>

                  <li>
                     <a class="active" href="{{ route('register', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) }}" 
                        style="display: block; padding: 14px 10px; font-size: 15px; border-bottom: 1px solid transparent; text-decoration: none;font-family: Open Sans; background: {{ $offerWallTemplate->headerActiveBg }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M10 11V8L15 12L10 16V13H1V11H10ZM2.4578 15H4.58152C5.76829 17.9318 8.64262 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C8.64262 4 5.76829 6.06817 4.58152 9H2.4578C3.73207 4.94289 7.52236 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C7.52236 22 3.73207 19.0571 2.4578 15Z"></path></svg> Register
                     </a>
                  </li>    

                  <li>
                     <a href="{{ route('tickets', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) }}" 
                        style="display: block; padding: 14px 10px; font-size: 15px; color: {{ $offerWallTemplate->headerNonActiveTextColor }}; border-bottom: 1px solid transparent; text-decoration: none;font-family: Open Sans;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M2.00488 9.49979V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V9.49979C20.6242 9.49979 19.5049 10.6191 19.5049 11.9998C19.5049 13.3805 20.6242 14.4998 22.0049 14.4998V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V14.4998C3.38559 14.4998 4.50488 13.3805 4.50488 11.9998C4.50488 10.6191 3.38559 9.49979 2.00488 9.49979ZM4.00488 7.96755C5.4866 8.7039 6.50488 10.2329 6.50488 11.9998C6.50488 13.7666 5.4866 15.2957 4.00488 16.032V18.9998H20.0049V16.032C18.5232 15.2957 17.5049 13.7666 17.5049 11.9998C17.5049 10.2329 18.5232 8.7039 20.0049 7.96755V4.99979H4.00488V7.96755ZM9.00488 8.99979H15.0049V10.9998H9.00488V8.99979ZM9.00488 12.9998H15.0049V14.9998H9.00488V12.9998Z"></path></svg> Tickets
                     </a>
                  </li>
               </ul>
               </div>
            </div>
         </div>



         <div style="display: flex ; height: 100%;  padding-bottom: 60px; align-items: start; width: 100%; flex-direction: column; font-family: Open Sans; background-color:{{ $offerWallTemplate->bodyBg }}">
            <!-- Chat Bot -->
                <div class="mainChatBx ">

                    <!-- Sidebar -->
                    <aside class="">
                        <div class="sidebarHeade">
                            <div class="sidebarChatHeading ">
                                <h2>Chats</h2>
                                <div class="sidebarDropdown">
                                    <button onclick="toggleDropdown2(event)"
                                        class="w-[35px] h-[35px] text-black hover:text-black focus:outline-none px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z">
                                            </path>
                                        </svg>
                                    </button>

                                    <!-- Dropdown Menu (initially hidden) -->
                                    <div
                                        class="dropdownNav absolute top-[24px] right-0 mt-2 w-32 bg-white border rounded shadow-lg hidden z-10">
                                        <ul class="text-sm text-gray-700">
                                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Mute</li>
                                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Archive</li>
                                            <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-red-500">Delete</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="chatSearch">
                                <div class="relative w-[100%]">
                                <input type="text" placeholder="Search or start new chat"
                                    class="w-full pl-[40px] pr-[15px] py-[9px] border rounded-[60px] text-sm bg-[#f5f5f5] focus:outline-none" />
                                <button class="searchbtn">
                                    <svg class="w-[20px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                                        </path>
                                    </svg>
                                </button>
                                </div>
                                <div class="mobileList">
                                <button onclick="toggleDiv()" class=" md:hidden p-[0] w-[35px] h-[35px] flex items-center justify-center text-black rounded-[40px] bg-[#f2f2f2] focus:outline-none " > <svg xmlns="http://www.w3.org/2000/svg" class="w-[15px] h-[15px]" viewBox="0 0 24 24" fill="currentColor"><path d="M3 4H21V6H3V4ZM9 11H21V13H9V11ZM3 18H21V20H3V18Z"></path></svg> </button>
                                </div>
                            </div>

                        </div>
                        <div id="myDiv" class=" overflow-y-auto  max-h-[115px] md:max-h-[100vh] flex-grow">
                            <ul class="m-[0]">
                                <li class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer"> <img src="/images/user.webp" class="" />
                                    <div class="chatmsgBx ">
                                        <div class="chatmsg  ">
                                            <span class="chatTitle ">Ipsum
                                                Lorem Lorem Lorem Lorem</span>
                                                <p class="chatDes">Hey, how’s it going going going going going going going going?</p>
                                            <span class="chatTime">14:56</span>
                                        </div>
                                    </div>
                                    <span class="chatCount">12</span>
                                    <div class="chatmsgDrop hidden">
                                        <button onclick="toggleDropdown(event)" class="">⋮</button>
                                    
                                    </div>
                                </li>

                                <li class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer"> <img src="/images/user.webp" class="" />
                                    <div class="chatmsgBx ">
                                        <div class="chatmsg  ">
                                            <span class="chatTitle ">Ipsum
                                                Lorem Lorem Lorem Lorem</span>
                                                <p class="chatDes">Hey, how’s it going going going going going going going going?</p>
                                            <span class="chatTime">14:56</span>
                                        </div>
                                    </div>
                                    <span class="chatCount">12</span>
                                    <div class="chatmsgDrop hidden">
                                        <button onclick="toggleDropdown(event)" class="">⋮</button>
                                    
                                    </div>
                                </li>


                                <li class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer"> <img src="/images/user.webp" class="" />
                                    <div class="chatmsgBx ">
                                        <div class="chatmsg  ">
                                            <span class="chatTitle ">Ipsum
                                                Lorem Lorem Lorem Lorem</span>
                                                <p class="chatDes">Hey, how’s it going going going going going going going going?</p>
                                            <span class="chatTime">14:56</span>
                                        </div>
                                    </div>
                                    <span class="chatCount">12</span>
                                    <div class="chatmsgDrop hidden">
                                        <button onclick="toggleDropdown(event)" class="">⋮</button>
                                    
                                    </div>
                                </li>


                                <li class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer"> <img src="/images/user.webp" class="" />
                                    <div class="chatmsgBx ">
                                        <div class="chatmsg  ">
                                            <span class="chatTitle ">Ipsum
                                                Lorem Lorem Lorem Lorem</span>
                                                <p class="chatDes">Hey, how’s it going going going going going going going going?</p>
                                            <span class="chatTime">14:56</span>
                                        </div>
                                    </div>
                                    <span class="chatCount">12</span>
                                    <div class="chatmsgDrop hidden">
                                        <button onclick="toggleDropdown(event)" class="">⋮</button>
                                    
                                    </div>
                                </li>


                                <li class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer"> <img src="/images/user.webp" class="" />
                                    <div class="chatmsgBx ">
                                        <div class="chatmsg  ">
                                            <span class="chatTitle ">Ipsum
                                                Lorem Lorem Lorem Lorem</span>
                                                <p class="chatDes">Hey, how’s it going going going going going going going going?</p>
                                            <span class="chatTime">14:56</span>
                                        </div>
                                    </div>
                                    <span class="chatCount">12</span>
                                    <div class="chatmsgDrop hidden">
                                        <button onclick="toggleDropdown(event)" class="">⋮</button>
                                    
                                    </div>
                                </li>


                                <li class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer"> <img src="/images/user.webp" class="" />
                                    <div class="chatmsgBx ">
                                        <div class="chatmsg  ">
                                            <span class="chatTitle ">Ipsum
                                                Lorem Lorem Lorem Lorem</span>
                                                <p class="chatDes">Hey, how’s it going going going going going going going going?</p>
                                            <span class="chatTime">14:56</span>
                                        </div>
                                    </div>
                                    <span class="chatCount">12</span>
                                    <div class="chatmsgDrop hidden">
                                        <button onclick="toggleDropdown(event)" class="">⋮</button>
                                    
                                    </div>
                                </li>


                                <li class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer"> <img src="/images/user.webp" class="" />
                                    <div class="chatmsgBx ">
                                        <div class="chatmsg  ">
                                            <span class="chatTitle ">Ipsum
                                                Lorem Lorem Lorem Lorem</span>
                                                <p class="chatDes">Hey, how’s it going going going going going going going going?</p>
                                            <span class="chatTime">14:56</span>
                                        </div>
                                    </div>
                                    <span class="chatCount">12</span>
                                    <div class="chatmsgDrop hidden">
                                        <button onclick="toggleDropdown(event)" class="">⋮</button>
                                    
                                    </div>
                                </li>

                                <li class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer"> <img src="/images/user.webp" class="" />
                                    <div class="chatmsgBx ">
                                        <div class="chatmsg  ">
                                            <span class="chatTitle ">Ipsum
                                                Lorem Lorem Lorem Lorem</span>
                                                <p class="chatDes">Hey, how’s it going going going going going going going going?</p>
                                            <span class="chatTime">14:56</span>
                                        </div>
                                    </div>
                                    <span class="chatCount">12</span>
                                    <div class="chatmsgDrop hidden">
                                        <button onclick="toggleDropdown(event)" class="">⋮</button>
                                    
                                    </div>
                                </li>


                                <li class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer"> <img src="/images/user.webp" class="" />
                                    <div class="chatmsgBx ">
                                        <div class="chatmsg  ">
                                            <span class="chatTitle ">Ipsum
                                                Lorem Lorem Lorem Lorem</span>
                                                <p class="chatDes">Hey, how’s it going going going going going going going going?</p>
                                            <span class="chatTime">14:56</span>
                                        </div>
                                    </div>
                                    <span class="chatCount">12</span>
                                    <div class="chatmsgDrop hidden">
                                        <button onclick="toggleDropdown(event)" class="">⋮</button>
                                    
                                    </div>
                                </li>


                                <li class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer"> <img src="/images/user.webp" class="" />
                                    <div class="chatmsgBx ">
                                        <div class="chatmsg  ">
                                            <span class="chatTitle ">Ipsum
                                                Lorem Lorem Lorem Lorem</span>
                                                <p class="chatDes">Hey, how’s it going going going going going going going going?</p>
                                            <span class="chatTime">14:56</span>
                                        </div>
                                    </div>
                                    <span class="chatCount">12</span>
                                    <div class="chatmsgDrop hidden">
                                        <button onclick="toggleDropdown(event)" class="">⋮</button>
                                    
                                    </div>
                                </li>


                                <li class="group relative py-[10px] hover:bg-gray-100 border-b border-b-[#f2f2f2] flex items-center gap-[5px] md:gap-[8px] cursor-pointer"> <img src="/images/user.webp" class="" />
                                    <div class="chatmsgBx ">
                                        <div class="chatmsg  ">
                                            <span class="chatTitle ">Ipsum
                                                Lorem Lorem Lorem Lorem</span>
                                                <p class="chatDes">Hey, how’s it going going going going going going going going?</p>
                                            <span class="chatTime">14:56</span>
                                        </div>
                                    </div>
                                    <span class="chatCount">12</span>
                                    <div class="chatmsgDrop hidden">
                                        <button onclick="toggleDropdown(event)" class="">⋮</button>
                                    
                                    </div>
                                </li>



                                
                            </ul>
                        </div>
                    </aside>

                    <!-- Global dropdown left Sidebar -->
                        <div id="globalDropdown" class="custom-dropdown hidden bg-white border rounded shadow-lg z-10">
                            <ul class="text-sm text-gray-700">
                                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Mute</li>
                                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Archive</li>
                                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-red-500">Delete</li>
                            </ul>
                        </div>


                        <div id="globalDropdown2" class="custom-dropdown hidden bg-white border rounded shadow-lg z-10">
                            <ul class="text-sm text-gray-700">
                                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Mute</li>
                                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Archive</li>
                                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-red-500">Delete</li>
                            </ul>
                        </div>


                        <div id="globalDropdown3" class="custom-dropdown hidden bg-white border rounded shadow-lg z-10">
                            <ul class="text-sm text-gray-700">
                                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Mute</li>
                                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Archive</li>
                                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-red-500">Delete</li>
                            </ul>
                        </div>

                    <!-- Chat Window -->
                    <main class="chatwindowMain">
                        <div
                            class="chatwindowLogo">
                            <img src="/images/logo.png" alt="img">
                        </div>
                        <!-- Header -->
                        <div class="chatwindowHeader px-[10px] py-[10px] border-b flex items-center justify-between gap-3 bg-white z-10">
                            <div class="chatwindowUser flex items-center gap-[5px]">
                                <img src="/images/user.webp" class="" />
                                <div>
                                    <p>Alice Whitman</p>
                                </div>
                            </div>

                            <div class="chatwindowDrop relative flex items-center">
                                <button  onclick="toggleDropdown3(event)"
                                    class="p-[0] w-[35px] h-[35px] flex items-center justify-center text-black rounded-[40px] bg-[#f2f2f2] focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[15px] h-[15px]" viewBox="0 0 24 24" fill="currentColor"><path d="M3 4H21V6H3V4ZM9 11H21V13H9V11ZM3 18H21V20H3V18Z"></path></svg>
                                </button>

                                <!-- Dropdown Menu (initially hidden) -->
                                <div
                                    class="dropdownNav absolute right-0 top-[30px] mt-2 w-32 bg-white border rounded shadow-lg hidden z-[99]">
                                    <ul class="text-sm text-gray-700">
                                        <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Mute</li>
                                        <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Archive</li>
                                        <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-red-500">Delete</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <!-- Messages Area with Scroll Fix -->
                        <div id="chatMessages"
                            class="relative h-[35vh] md:h-[70vh] overflow-y-auto pt-[40px] px-[10px] py-[10px] md:px-[20px] md:py-[20px] xl:px-[30px] xl:py-[30px] space-y-4 z-[1]">

                            <div
                                class="groupAdded  absolute top-[8px] w-auto left-[0] right-[0] m-auto text-[13px] font-[600] text-[#49fb53]  text-center z-[9]">
                                <div class="w-auto inline-flex shadow-md bg-white px-[10px] py-[5px]  rounded-[4px]">
                                Mukesh Added At This Group
                                </div>
                                </div>
                            <div class="text-left">
                                <div
                                    class="chatwindowMsg relative inline-flex flex-col bg-gray-100 p-[12px] lg:text-[15px]  text-sm  shadow-md rounded-[10px] rounded-tl-[0]">
                                    <div class="absolute top-2 left-[-15px] w-0 h-0 border-t-[15px] border-t-transparent border-b-[15px] border-b-transparent border-r-[15px] border-r-gray-100">
                                    </div>

                                    <p class="text-[12px] xl:text-[13px]">
                                        Here are all the files. Let me know once you’ve had a look. Here are all the files. Let me know
                                        once you’ve had a look. Here are all the files. Let me know once you’ve had a look. Here are all
                                        the files. Let me know once you’ve had a look. Here are all the files. Let me know once you’ve
                                        had a look.
                                    </p>

                                    <div class="chatWindowDate ">
                                        11/July/2025 <div class="chatWindowTime text-[12px] text-black font-[600]">10:40 PM</div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-left">
                                <div
                                    class="chatwindowMsg relative inline-block bg-gray-100 p-[12px] lg:text-[15px]  text-sm  shadow-md rounded-[10px] rounded-tl-[0]">
                                    <div
                                        class="absolute  top-2 left-[-15px] w-0 h-0 border-t-[15px] border-t-transparent border-b-[15px] border-b-transparent border-r-[15px] border-r-gray-100">
                                    </div>
                                    <p class="text-[12px] xl:text-[13px]">
                                        Here are all the files. Let me know once you’ve had a look. once you’ve had a look. once you’ve
                                        had a look.
                                    </p>

                                    <div class="chatWindowDate">
                                        11/July/2025 <div class="text-[12px] text-black font-[600]">10:40 PM</div>
                                    </div>
                                </div>
                            </div>




                            <div class="text-right">
                                <div
                                    class="chatwindowMsg relative inline-block bg-green-100 text-green-800 text-sm p-[12px] lg:text-[15px] rounded-[10px] rounded-tl-[0] shadow-md">
                                    <div
                                        class="absolute top-2 right-[-15px] w-0 h-0 border-t-[15px] border-t-transparent border-b-[15px] border-b-transparent border-l-[15px] border-l-green-100">
                                    </div>
                                    <p class="text-[12px] xl:text-[13px]">
                                        Here are all the files. Let me know once you’ve had a look. Here are all the files.
                                    </p>

                                    <div class="chatWindowDate">
                                        11/July/2025 <div class="text-[12px] text-black font-[600]">10:40 PM</div>
                                    </div>
                                </div>
                            </div>


                            <div class="text-right">
                                <div
                                    class="chatwindowMsg relative inline-block bg-green-100 text-green-800 text-sm p-[18px] rounded-[10px] rounded-tl-[0] shadow-md">
                                    <div
                                        class="  absolute top-2 right-[-15px] w-0 h-0 border-t-[15px] border-t-transparent border-b-[15px] border-b-transparent border-l-[15px] border-l-green-100">
                                    </div>
                                    <p class="text-[12px] xl:text-[13px]">Here are all the files.</p>

                                    <div class="chatWindowDate">
                                        11/July/2025 <div class="text-[12px] text-black font-[600]">10:40 PM</div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <!-- Input Box (Fixed on Mobile) -->
                        <div
                            class="chatwindowAreaBx flex gap-[6px] md:gap-[10px] p-[10px] md:p-[13px] border-t  mobile-fixed md:relative z-[999] w-full">
                            <div class="chatwindowAttachement relative flex items-center">
                                <label for="fileInput" class="cursor-pointer flex items-center gap-1 text-black hover:text-[#49FB53]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.172 7l-6.586 6.586a2 2 0 002.828 2.828l6.586-6.586A4 4 0 1012 3.172l-6.586 6.586" />
                                    </svg>
                                    <span class="text-[0] md:text-[15px]">Attach</span>
                                </label>
                                <input id="fileInput" type="file" class="hidden" />
                            </div>

                            <form onsubmit="event.preventDefault(); addMessage();" class="w-full flex items-center gap-2">
                                <textarea id="msgInput" placeholder="Type a message..."
                                    class="w-full flex-1 py-[15px] px-[30px] border-none bg-[#f2f2f2] rounded-[80px] text-[11px] md:text-[15px] text-black focus:outline-none"></textarea>
                                <button type="submit"
                                    class="w-[35px] h-[35px] min-h-[auto] flex items-center justify-center bg-[#49FB53] text-black p-[0] rounded-[100px] hover:bg-green-600"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="w-[15px] h-[15px]" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M1.94607 9.31543C1.42353 9.14125 1.4194 8.86022 1.95682 8.68108L21.043 2.31901C21.5715 2.14285 21.8746 2.43866 21.7265 2.95694L16.2733 22.0432C16.1223 22.5716 15.8177 22.59 15.5944 22.0876L11.9999 14L17.9999 6.00005L9.99992 12L1.94607 9.31543Z">
                                        </path>
                                    </svg></button>
                            </form>
                        </div>
                    </main>

                </div>
            <!-- end -->


            <div style="padding: 20px 15px; display: flex ; justify-content: space-between; align-items: center; width: 100%; position: fixed; bottom: 0; z-index:999; background-color: {{ $offerWallTemplate->footerBg }}">
               <h2 style="margin: 0; font-size: 11px; font-weight: 600;"><img style="max-width: 150px;" src="/images/logo.png" /></h2>
               @if ($offerSettings->privacy_policy==1)
               <a href="" class="footerText-colordy" style="margin: 0px; font-size: 14px; color: {{ $offerWallTemplate->footerText }};">Privacy policy</a>
               @endif
               
            </div>
         </div>
      </div>
      


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      
    <!--  -->
    
<!-- chat js -->
<script>
    let activeButton = null;
    function toggleDropdown(e) {
      e.stopPropagation();
      const button = e.currentTarget;
      const dropdown = document.getElementById("globalDropdown");
      if (activeButton === button && !dropdown.classList.contains("hidden")) {
        dropdown.classList.add("hidden");
        activeButton = null;
        return;
      }
      activeButton = button;
      const rect = button.getBoundingClientRect();
      dropdown.style.top = rect.bottom + window.scrollY + "px";
      dropdown.style.left = rect.right - 140 + "px";
      dropdown.classList.remove("hidden");
    }
    document.addEventListener("click", () => {
      document.getElementById("globalDropdown").classList.add("hidden");
      activeButton = null;
    });
  </script>



<script>
    let activeButton2 = null;
    function toggleDropdown2(e) {
      e.stopPropagation();
      const button = e.currentTarget;
      const dropdown = document.getElementById("globalDropdown2");
      if (activeButton2 === button && !dropdown.classList.contains("hidden")) {
        dropdown.classList.add("hidden");
        activeButton2 = null;
        return;
      }
      activeButton2 = button;
      const rect = button.getBoundingClientRect();
      dropdown.style.top = rect.bottom + window.scrollY + "px";
      dropdown.style.left = rect.right - 140 + "px";
      dropdown.classList.remove("hidden");
    }
    document.addEventListener("click", () => {
      document.getElementById("globalDropdown2").classList.add("hidden");
      activeButton2 = null;
    });
  </script>



<script>
    let activeButton3 = null;
    function toggleDropdown3(e) {
      e.stopPropagation();
      const button = e.currentTarget;
      const dropdown = document.getElementById("globalDropdown3");
      if (activeButton3 === button && !dropdown.classList.contains("hidden")) {
        dropdown.classList.add("hidden");
        activeButton3 = null;
        return;
      }
      activeButton3 = button;
      const rect = button.getBoundingClientRect();
      dropdown.style.top = rect.bottom + window.scrollY + "px";
      dropdown.style.left = rect.right - 140 + "px";
      dropdown.classList.remove("hidden");
    }
    document.addEventListener("click", () => {
      document.getElementById("globalDropdown3").classList.add("hidden");
      activeButton3 = null;
    });
  </script>


<script>
    function toggleDiv() {
      const div = document.getElementById("myDiv");
      div.classList.toggle("hidden");
    }
  </script>


   </body>
</html>