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
       $this->setEnv('DB_HOST',$request->db_host);
       $this->setEnv('DB_DATABASE',$request->db_database);
       $this->setEnv('DB_USERNAME',$request->db_username);
       $this->setEnv('DB_PASSWORD',$request->db_password);
       return redirect('step2')->with('success','Settings saved! Continue to step 2!');
    }
    
    public function Step2(){
       if(env('SETUP_STATUS') == 1){
          return redirect()->intended('/');
       }
      $data['host'] = env('MAIL_HOST');
      $data['port'] = env('MAIL_PORT');
      $data['username'] = env('MAIL_USERNAME');
      $data['password'] = env('MAIL_PASSWORD');
      $data['admin1'] = env('ADMIN1');
      $data['admin2'] = env('ADMIN2');
      $data['admin_number'] = env('ADMIN_COUNT');
       return Inertia::render('install/step2',['data'=>$data]);
    }
    public function Step2Store(Request $request){
       $this->setEnv('MAIL_HOST',$request->host);
       $this->setEnv('MAIL_PORT',$request->port);
       $this->setEnv('MAIL_USERNAME',$request->username);
       $this->setEnv('MAIL_PASSWORD',$request->password);
       $this->setEnv('ADMIN1',$request->admin1);
       $this->setEnv('ADMIN2',$request->admin2);
       $this->setEnv('ADMIN_COUNT',$request->admin_number);
       return redirect('/step3')->with('success','Mail settings changed!');
    }
    
    public function Step3(){
       if(env('SETUP_STATUS') == 1){
          return redirect()->intended('/');
       }
      $data['deposit_max'] = env('DEPOSIT_MAX');
      $data['deposit_min'] = env('DEPOSIT_MIN');
      $data['withdrawal_max'] = env('WITHDRAWAL_MAX');
      $data['withdrawal_min'] = env('WITHDRAWAL_MIN');
      $data['investment_max'] = env('INVESTMENT_MAX');
      $data['investment_min'] = env('INVESTMENT_MIN');
      $data['investment_duration'] = env('INVESTMENT_DURATION');
      $data['investment_interest'] = env('INTEREST_PERCENT');
      $data['investment_frequency'] = env('INVESTMENT_FREQUENCY');
       return Inertia::render('install/step3',['data'=>$data]);
    }
    public function Step3Store(Request $request){
       $this->setEnv('DEPOSIT_MAX',$request->deposit_max);
       $this->setEnv('DEPOSIT_MIN',$request->deposit_min);
       $this->setEnv('WITHDRAWAL_MAX',$request->withdrawal_max);
       $this->setEnv('WITHDRAWAL_MIN',$request->withdrawal_min);
       $this->setEnv('INVESTMENT_MAX',$request->investment_max);
       $this->setEnv('INVESTMENT_MIN',$request->investment_min);
       $this->setEnv('INVESTMENT_FREQUENCY',$request->investment_frequency);
       $this->setEnv('INTEREST_PERCENT',$request->investment_interest);
       $this->setEnv('INVESTMENT_DURATION',$request->investment_duration);
       return redirect('/step4')->with('success','Core settings changed!');
    }
    
    public function Step4(){
       if(env('SETUP_STATUS') == 1){
          return redirect()->intended('/');
       }
      $data['payment_gateway'] = env('PAYMENT_GATEWAY');
      $data['api_key'] = env('COINBASE_API_KEY');
      $data['api_version'] = env('COINBASE_API_VERSION');
      $data['webhook_secret'] = env('COINBASE_WEBHOOK_SECRET');
       return Inertia::render('install/step4',['data'=>$data]);
    }
    public function Step4Store(Request $request){
       $this->setEnv('PAYMENT_GATEWAY',$request->payment_gateway);
       $this->setEnv('COINBASE_API_VERSION',$request->api_version);
       $this->setEnv('COINBASE_API_KEY',$request->api_key);
       $this->setEnv('COINBASE_WEBHOOK_SECRET',$request->webhook_secret);
       $this->setEnv('SETUP_STATUS',1);
       return redirect('/register')->with('success','Setup Complete! Now Register Admin Account!');
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
