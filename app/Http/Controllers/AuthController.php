<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 1
        ]);

        // event(new Registered($user));

        return redirect()->route('login', [
            'apiKey' => $request->apiKey,
            'wallId' => $request->wallId,
            'userId' => $request->userId,
            'sub4' => $request->sub4,
            'sub5' => $request->sub5,
            'sub6' => $request->sub6
        ])->with('success','Registration Successfull. Please check your mail inbox and verify your email.');

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

        if (Auth::attempt($credentials)) {
           
            if (Auth::user()->role !== 'user') {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'You are not allowed to login.'])->withInput($request->all());;
            }

            if(empty(Auth::user()->email_verified_at)){
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Please first verify your email from your mail inbox.'])->withInput($request->all());;
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

}
