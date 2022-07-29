<?php

namespace App\Http\Controllers\Admin;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function BasicSettings(){
      $data['site_name'] = env('SITE_NAME');
      $data['site_description'] = env('SITE_DESCRIPTION');
      $data['site_about'] = env('SITE_ABOUT');
      $data['site_logo'] = env('SITE_LOGO');
      return Inertia::render('admin/settings/basic',['data'=>$data]);
    }
    
    public function CoreSettings(){
      $data['deposit_max'] = env('DEPOSIT_MAX');
      $data['deposit_min'] = env('DEPOSIT_MIN');
      $data['withdrawal_min'] = env('WITHDRAWAL_MIN');
      $data['withdrawal_max'] = env('WITHDRAWAL_MAX');
      $data['investment_max'] = env('INVESTMENT_MAX');
      $data['investment_min'] = env('INVESTMENT_MIN');
      $data['investment_duration'] = env('INVESTMENT_DURATION');
      $data['investment_interest'] = env('INVESTMENT_INTEREST');
      $data['investment_frequency'] = env('INVESTMENT_FREQUENCY');
      return Inertia::render('admin/settings/core',['data'=>$data]);
    }
    
    public function PaymentSettings(){
      $data['api_version'] = env('COINBASE_API_VERSION');
      $data['api_key'] = env('COINBASE_API_KEY');
      $data['webhook_secret'] = env('COINBASE_WEBHOOK_SECRET');
      return Inertia::render('admin/settings/payment',['data'=>$data]);
    }
    
    public function SystemSettings(){
      $data['admin1'] = env('ADMIN1');
      $data['admin2'] = env('ADMIN2');
      $data['admin3'] = env('ADMIN3');
      $data['admin_number'] = env('ADMIN_COUNT');
      $data['db_database'] = env('DB_DATABASE');
      $data['db_host'] = env('DB_HOST');
      $data['db_password'] = env('DB_PASSWORD');
      $data['db_username'] = env('DB_USERNAME');
      return Inertia::render('admin/settings/system',['data'=>$data]);
    }
    
    //store values
    public function BasicSettingsStore(Request $request){
       $this->setEnv('SITE_NAME',$request->name);
       $this->setEnv('SITE_DESCRIPTION',$request->description);
       $this->setEnv('SITE_ABOUT',$request->about);
       $this->setEnv('SITE_LOGO',$request->logo);
       return redirect('admin')->with('success','Basic settings changed!');
    }
    
    public function CoreSettingsStore(Request $request){
       $this->setEnv('DEPOSIT_MIN',$request->deposit_min);
       $this->setEnv('DEPOSIT_MAX',$request->deposit_max);
       $this->setEnv('INVESTMENT_MIN',$request->investment_min);
       $this->setEnv('INVESTMENT_MAX',$request->investment_max);
       $this->setEnv('WITHDRAWAL_MIN',$request->withdrawal_min);
       $this->setEnv('WITHDRAWAL_MAX',$request->withdrawal_max);
       $this->setEnv('INVESTMENT_FREQUENCY',$request->investment_frequency);
       $this->setEnv('INVESTMENT_INTEREST',$request->investment_interest);
       return redirect('admin')->with('success','core settings changed!');
    }
    
    public function PaymentSettingsStore(Request $request){
       $this->setEnv('COINBASE_API_VERSION',$request->api_version);
       $this->setEnv('COINBASE_API_KEY',$request->api_key);
       $this->setEnv('COINBASE_WEBHOOK_SECRET',$request->webhook_secret);
       return redirect('admin')->with('success','Payment settings changed!');
    }
    
    public function SystemSettingsStore(Request $request){
       $this->setEnv('DB_USERNAME',$request->db_username);
       $this->setEnv('DB_PASSWORD',$request->db_password);
       $this->setEnv('DB_HOST',$request->db_host);
       $this->setEnv('DB_DATABASE',$request->db_database);
       $this->setEnv('ADMIN1',$request->admin1);
       $this->setEnv('ADMIN2',$request->admin2);
       $this->setEnv('ADMIN3',$request->admin3);
       $this->setEnv('ADMIN_COUNT',$request->admin_count);
       return redirect('admin')->with('success','System settings changed!');
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
