<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Mail\UserRegisteredMail;
use App\Models\App;
use App\Models\Setting;
use App\Models\Template;
use App\Models\Tracking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                         ->withErrors($validator)
                         ->withInput($request->all());
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 1
        ]);

        Mail::to($user->email)->send(new UserRegisteredMail($user, $request->apiKey, $request->wallId, $request->userId, $request->sub4, $request->sub5, $request->sub6));

        return redirect()->route('login', [
            'apiKey' => $request->apiKey,
            'wallId' => $request->wallId,
            'userId' => $request->userId,
            'sub4' => $request->sub4,
            'sub5' => $request->sub5,
            'sub6' => $request->sub6
        ])->with('success','Registration Successful. Please check your inbox and verify your email.');

    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput($request->all());
        }

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
           
            if (Auth::user()->role !== 'user') {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'You are not allowed to login.'])->withInput($request->all());;
            }

            if(empty(Auth::user()->email_verified_at)){
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Please first verify your email from your mail inbox.'])->withInput($request->all());;
            }

            $cookie = $_COOKIE['userCookie'];

            if(!empty($cookie)){
                Tracking::where('visitor_id',$cookie)->update(['visitor_user_id' => Auth::user()->id]);
            }

            return redirect()->route('offerwall', [
                'apiKey' => $request->apiKey,
                'wallId' => $request->wallId,
                'userId' => $request->userId,
                'sub4'   => $request->sub4,
                'sub5'   => $request->sub5,
                'sub6'   => $request->sub6,
            ])->with('success','Logged In Successfully.');
        }

        return redirect()->back()
                        ->withErrors(['email' => 'Invalid credentials'])
                        ->withInput();
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); 

        return redirect()->route('login', [
            'apiKey' => $request->apiKey,
            'wallId' => $request->wallId,
            'userId' => $request->userId,
            'sub4' => $request->sub4,
            'sub5' => $request->sub5,
            'sub6' => $request->sub6
        ])->with('success','Logged Out.');
    }

    public function emailVerify(Request $request){
        $user = User::where('id',$request->user_id)->first();

        if(empty($user)){
            return redirect()->back()->withErrors(['email' => 'User not found.'])->withInput($request->all());;
        }

        if(!empty($user->email_verified_at)){
            return redirect()->route('login', [
                'apiKey' => $request->apiKey,
                'wallId' => $request->wallId,
                'userId' => $request->userId,
                'sub4' => $request->sub4,
                'sub5' => $request->sub5,
                'sub6' => $request->sub6
            ])->with('success','Email Already Verified.');
            // return redirect()->back()
            //             ->withErrors(['user_id' => 'User not found.'])
            //             ->withInput($request->all());
        }

        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->update();

        return redirect()->route('login', [
            'apiKey' => $request->apiKey,
            'wallId' => $request->wallId,
            'userId' => $request->userId,
            'sub4' => $request->sub4,
            'sub5' => $request->sub5,
            'sub6' => $request->sub6
        ])->with('success','Email Verified.');
    }

    public function sendForgotPasswordMail(Request $request){
        $validator = Validator::make($request->all(), [
            'email'    => ['required', 'email']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput($request->all());
        }

        $user = User::where('email',$request->email)->whereNotNull('email_verified_at')->first();

        if(empty($user)){
            return redirect()->back()
                ->withErrors(['email' => "Either user is not verified or not exist."])
                ->withInput($request->all());
        }

        $newPassword = Str::random(14);
        $user->password = Hash::make($newPassword);
        $user->update();

        Mail::to($user->email)->send(new ForgotPasswordMail($user, $request->apiKey, $request->wallId, $request->userId, $request->sub4, $request->sub5, $request->sub6,$newPassword));


        return redirect()->back()->with('success','We have sent a new password to your registered email.');
    }


    public function myaccount(Request $request){
        $offerSettings = Setting::find(1);
        $advertiserDetails = Setting::find(1);
        

        $appDetails = App::where('appId',$request->wallId)->where('status',1)->first();
        $offerWallTemplate = Template::where('app_id',$appDetails->id)->first();
        if(empty($offerWallTemplate)){
            $offerWallTemplate = Template::find(1);
        }
        $requestedParams = $request->all();
        if(!isset($requestedParams['userId'])){
            $requestedParams['userId'] = 0;
        }
        if(!isset($requestedParams['sub4'])){
            $requestedParams['sub4'] = NULL;
        }
        if(!isset($requestedParams['sub5'])){
            $requestedParams['sub5'] = NULL;
        }
        if(!isset($requestedParams['sub6'])){
            $requestedParams['sub6'] = NULL;
        }

        if(!Auth::check()){
            return view('login',compact('offerWallTemplate','appDetails','requestedParams','offerSettings'));
        }

        $user = User::where('id',Auth::id())->first();
        $name = explode(" ", $user->name);
        $user->firstName = $name[0] ?? NULL;
        $user->lastName = $name[1] ?? NULL;
        return view('myaccount',compact('offerWallTemplate','appDetails','requestedParams','offerSettings','user'));
    }


    public function storeMyAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'     => ['required', 'string', 'max:255'],
            'last_name'    => ['nullable', 'string'],
            'gender' => ['nullable', 'string'],
            'age' => ['nullable','numeric']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                         ->withErrors($validator)
                         ->withInput($request->all());
        }

        if(!empty($request->last_name)){
            $name = $request->first_name . ' ' . $request->last_name;
        }
        else{
            $name = $request->first_name;
        }
        $data = [
            'name' => $name,
            'gender' => $request->gender ?? null,
            'age' => $request->age
        ];
        
        if(Auth::check()){
            User::where("id",Auth::id())->update($data);

            return redirect()->route('myAccount', [
                'apiKey' => $request->apiKey,
                'wallId' => $request->wallId,
                'userId' => $request->userId,
                'sub4' => $request->sub4,
                'sub5' => $request->sub5,
                'sub6' => $request->sub6
            ])->with('success','Account Information Updated.');
        }
        else{
            return redirect()->route('login', [
                'apiKey' => $request->apiKey,
                'wallId' => $request->wallId,
                'userId' => $request->userId,
                'sub4' => $request->sub4,
                'sub5' => $request->sub5,
                'sub6' => $request->sub6
            ]);
        }


    }
}
