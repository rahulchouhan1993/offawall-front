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
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
  
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
                  @guest
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
            
          <div class="signupModal ">
            @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
            @endif
               <form id="registerForm" action="{{route('store.user')}}" method="post">
                  @csrf
                  <div class="logoLogin">
                     <img src="images/logo.png" alt="img">
                  </div>
                  <input type="hidden" name="apiKey" value="{{ old('apiKey', $requestedParams['apiKey'] ?? '') }}">
                  <input type="hidden" name="wallId" value="{{ old('wallId', $requestedParams['wallId'] ?? '') }}">
                  <input type="hidden" name="userId" value="{{ old('userId', $requestedParams['userId'] ?? '') }}">
                  <input type="hidden" name="sub4" value="{{ old('sub4', $requestedParams['sub4'] ?? '') }}">
                  <input type="hidden" name="sub5" value="{{ old('sub5', $requestedParams['sub5'] ?? '') }}">
                  <input type="hidden" name="sub6" value="{{ old('sub6', $requestedParams['sub6'] ?? '') }}">

                  
                  <div class="login-box">
                  <h2>Create Account to get started!</h2>

                     <div class="input-group">
                  <i class="fas fa-user"></i>
                  <input type="text" name="name" placeholder="Full Name" value="{{ old('name')}}" required>
                  </div>

                  <div class="input-group">
                  <i class="fas fa-envelope"></i>
                  <input type="email" name="email" placeholder="Email" value="{{ old('email')}}" required>
                  </div>


                  <div class="input-group">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Password" value="{{ old('password')}}" required>
                  </div>

                  <div class="input-group">
                     <i class="fas fa-lock"></i>
                     <input type="password" name="password_confirmation" value="{{ old('password_confirmation')}}" placeholder="Confirm Password" required>
                  </div>
                     <label class="checkbox-group agreebx">
                        <input type="checkbox" name="terms"> I agree to the Terms &amp; Conditions
                     </label>
                  <button type="submit" class="login-btn">SIGN UP</button>
               </div>
               </form>
            </div>


            <div style="padding: 20px 15px; display: flex ; justify-content: space-between; align-items: center; width: 100%; position: fixed; bottom: 0; background-color: {{ $offerWallTemplate->footerBg }}">
               <h2 style="margin: 0; font-size: 11px; font-weight: 600;"><img style="max-width: 150px;" src="/images/logo.png" /></h2>
               @if ($offerSettings->privacy_policy==1)
               <a href="" class="footerText-colordy" style="margin: 0px; font-size: 14px; color: {{ $offerWallTemplate->footerText }};">Privacy policy</a>
               @endif
               
            </div>
         </div>
      </div>
      


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      
   </body>
   <script>
      function handleTicketClick(event) {
         event.preventDefault(); // stop default link navigation

         var userLoggedIn = "{{ auth()->check() ? 'true' : '' }}";

         var loginRoute = `{!! route('login', ['apiKey' => $requestedParams['apiKey'], 'wallId' => $requestedParams['wallId'], 'userId' => $requestedParams['userId'], 'sub4' => $requestedParams['sub4'], 'sub5' => $requestedParams['sub5'], 'sub6' => $requestedParams['sub6']]) !!}`;
         var ticketRoute = document.getElementById('ticketLink').href;

         if (!userLoggedIn || userLoggedIn === "false") {
               window.location.href = loginRoute;
         } else {
               window.location.href = ticketRoute;
         }
      }
   </script>
</html>