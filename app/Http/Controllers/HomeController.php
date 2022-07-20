<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{

    public function index()
    {
        return Inertia::render('home/home');
    }
    
    public function VerifyAccount($email)
    {
       /* if($user = User::whereEmail($email)->first()){
          $user->email_verified = true;
          return redirect('/home')->with('success','Account verified!');
        }else{
          return redirect('/home')->with('error','Unable to verify!');
        }   */
    }   
}
