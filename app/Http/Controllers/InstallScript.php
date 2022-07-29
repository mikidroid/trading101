<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

class InstallScript extends Controller
{
    
    public function Step1(){
       if(env('SETUP_STATUS') == 1){
          return redirect()->intended('/');
       }
      $data['db_database'] = env('DB_DATABASE');
      $data['db_host'] = env('DB_HOST');
      $data['db_password'] = env('DB_PASSWORD');
      $data['db_username'] = env('DB_USERNAME');
       return Inertia::render('install/step1',['data'=>$data]);
    }
    public function Step1Store(Request $request){
       $request->validate([
         'db_username'=>'required',
         'db_password'=>'required',
         'db_database'=>'required',
         'db_host'=>'required',
       ]);
     //  $this->setEnv('DB_HOST',$request->db_host);
    //   $this->setEnv('DB_DATABASE',$request->db_database);
   //    $this->setEnv('DB_USERNAME',$request->db_username);
       $this->setEnv('DB_PASSWORD',$request->db_password);
       return redirect('step2')->with('success','Settings saved! Continue to step 2!');
    }
    
    public function Step2(){
       if(env('SETUP_STATUS') == 1){
          return redirect()->intended('/');
       }
       return Inertia::render('install/step2');
    }
    public function Step2Store(){
       $this->setEnv('ADMIN1',$request->admin1);
       $this->setEnv('ADMIN2',$request->admin2);
       $this->setEnv('ADMIN3',$request->admin3);
       $this->setEnv('ADMIN_COUNT',$request->admin_count);
       return redirect('/register')->with('success','System settings changed! Now Register Admin Account!');
    }
    
    //script for setting env variables
    private function setEnv($key, $value)
    {
	     file_put_contents(app()->environmentFilePath(), str_replace(
	       	$key . '=' . env($key),
	       	$key . '=' . $value,
		       file_get_contents(app()->environmentFilePath())
	      ));
	      
    }
}
