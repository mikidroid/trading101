<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

class InstallScript extends Controller
{
    public function __construct(){
       if(env('SETUP_STATUS') == 1){
          return redirect()->intended('/');
       }
    }
    
    public function Step1(){
       return Inertia::render('install/step1');
    }
    public function Step1Post(){
       
    }
    
    public function Step2(){
       return Inertia::render('install/step2');
    }
    public function Step2Post(){
       
    }
    
    //script for setting env variables
    private function setEnv($key, $value)
    {
	     file_put_contents(app()->environmentFilePath(), str_replace(
	       	$key . '=' . env($value),
	       	$key . '=' . $value,
		       file_get_contents(app()->environmentFilePath())
	      ));
    }
}
