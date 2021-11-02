<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use  App\User;
use Auth;

use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    //
    public function redirecttoGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGooglecallback()
    {
       #print_r($googleuser);
       #die();
       $googleuser= Socialite::driver('google')->user();       
       $googleUserid= User::where("google_id",$googleuser->id)->first();
       if(!empty($googleUserid))
       {
        if (!$googleUserid->status) 
        {
          Auth::logout();
          notify()->info(''.$googleuser->name.' Your Account Are InActive By Admin ', 'Sign Up');
          return redirect('/');
          //return redirect('/')->withError('Please activate your account before logging in.');
        }else
        {
           Auth::login($googleUserid);
           notify()->success('Welcome Back '.$googleuser->name.' :)', 'Sign Up');
           return redirect('/user_dashboard');
        }
       }else{
        $user=User::create([
            'name' => $googleuser->name,
            'email' => $googleuser->email,
            'role' => 'user',
            'status' => '1',
            'google_id' => $googleuser->id,
            'password' => Hash::make($string = rand()),
        ]);
        Auth::login($user);
        notify()->success('Welcome '.$googleuser->name.' ', 'Sign Up');
        return redirect('/user_dashboard');
       }
    }
}
