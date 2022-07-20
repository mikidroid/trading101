<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MyTransaction;
use App\Models\User;
use Coinremitter\Coinremitter;
use Inertia\Inertia;
use Auth;
use App\Notifications\User\Deposit;
use App\Notifications\User\DepositComplete;
use App\Notifications\User\Withdrawal;
use App\Notifications\User\WithdrawalComplete;
use App\Notifications\User\WithdrawalReject;
use App\Notifications\Admin\WithdrawalAdmin;
use Notification;

class Transactions extends Controller
{
 

    public function index(Request $request)
    {
        //
        $user = User::find($request->user()->id);
        $data = $user->myTransaction;
        return Inertia::render('user/transactions',['data'=>$data]);
    }


    public function deposit(Request $request)
    {
        //
       // $request->session()->flash('success','done');
        return Inertia::render('user/deposit');
    }
    
    public function DepositStore(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'amount' => 'min:'.env('DEPOSIT_MIN').'|max:'.env('DEPOSIT_MAX').'|required|integer',
            'coin' => 'string|required'
          ]);
        $random = Str::random(5).substr(time(), 6,8).Str::random(5);
        $details = [
          'user_id'=>$user->id,
          'type'=>'deposit',
          'coin'=>$request->coin,
          'amount'=>$request->amount,
          'ref'=> $random,
          'name'=>$user->name,
          'email'=>$user->email,
         ];
        //$user->depositFloat($request->amount);
        $Trans = new MyTransaction($details);
        $Trans->save(); 
        //coin functions
        $coin = new Coinremitter($request->coin);
        //$notify_url=env('SITE_URL')."/notify_url.php?ref=".$Trans->ref."&coin=".$Trans->coin;
        $notify_url=env('SITE_URL')."/deposit/callback?ref=".$Trans->ref."&coin=".$Trans->coin;
        $fail_url=env('SITE_URL')."/deposit/fail";
        $success_url=env('SITE_URL')."/deposit/success";
        $data = [
           'amount'=> $request->amount,
           'custom_data1'=> $Trans->ref,
           'notify_url'=>$notify_url,
           'currency'=>'USD',
           'fail_url'=>$fail_url,
           'success_url'=>$success_url
        ];
        $coin2 = $coin->create_invoice($data);
        $coin2 = json_decode(json_encode($coin2)); 
        if(isset($coin2->data->url)){
          Notification::send($user, new Deposit($Trans));
        }
        //$coin2 = $coin2->data; 
       //this echo command helps me see the redirecting output on local server if not, it shows a blank page
         //echo("new redirect");
        //dd($coin2);
         return redirect()->away($coin2->data->url);
        //return redirect()->away($coin2->url);
    }
    
    public function DepositCallback(Request $request)
    {
       /*
       //Get request bcus of params added to url
        $ref = $_GET['ref'];
        //$secret = $_GET['secret'];
        //other post request
        $address = $_GET['address'];
        $coin_value = $_GET['coin_value'];
        $usd_value = $_GET['usd_value'];
        $status_code = $_GET['status_code'];
        $confirmations = $_GET['confirmations'];
        //$trx_hash = $_GET['transaction_hash'];
        */
        
        $ref = $_GET['ref'];
        $coin = $_GET['coin'];
        //other post request
        $address = $_POST['address'];
        $paid_amount = $_POST['paid_amount'];
        $coin_value = $paid_amount[$coin];
        $usd_value = $paid_amount['USD'];
        $url = $_POST['url'];
        $status_code = $_POST['status_code'];
        $invoice_id = $_POST['invoice_id'];
        $payment_history = $_POST['payment_history'];
        $confirmations = $payment_history['confirmation'];
        $data = MyTransaction::whereRef($ref)->first();

        if($data->status == 0){
          if ($confirmations>=2){
             $data->coin_value = $coin_value;
             $data->coin_address = $address;
             $data->status = 1;
             $data->save();
             $user = User::findOrFail($data->user_id);
             $user->depositFloat($data->amount);
             $user->save();
             //send mail here
             Notification::send($user, new DepositComplete($Trans));
             //send admin mail
             $admin = User::whereIs_admin(true)->get();
             Notification::send($admin,new DepositAdmin($Trans));
          }
        }
    }
    
    public function success_url(Request $request)
    {
        return redirect('/home')->with('success','Deposit success! Awaiting confirmation.');
    }
    
   public function fail_url(Request $request)
    {
        return redirect('/home')->with('error','Deposit failed! Try again!');
    }

    public function withdrawal(Request $request)
    {
       return Inertia::render('user/withdrawal');
    }

     
    public function WithdrawalStore(Request $request)
    {
      $user = $request->user();
      $bal = $user->balanceFloat;
      $request->validate([
            'amount' => 'min:'.env('WITHDRAWAL_MIN').'|max:'.env('WITHDRAWAL_MAX').'|required|integer',
            'coin' => 'string|required'
          ]);
      if($request->amount > $bal){
         return redirect('/home')->with('error','Insufficient balance!');
      }
      $random = Str::random(5).substr(time(), 6,8).Str::random(5);
        //$coin_value = file_get_contents('');
      $details = [
          'user_id'=>$user->id,
          'type'=>'withdrawal',
          'coin'=>$request->coin,
          'coin_address'=>$request->coin_address,
         // 'coin_value'=>$coin_value,
          'amount'=>$request->amount,
          'ref'=> $random,
          'name'=>$user->name,
          'email'=>$user->email,
         ];
      $user->withdrawFloat($request->amount);
      $Trans = new MyTransaction($details);
      $Trans->save(); 
      //send admin mail
      $admin = User::whereIs_admin(true)->get();
      Notification::send($admin,new WithdrawalAdmin($Trans));
      //send user mail
      Notification::send($user,new Withdrawal($Trans));
      return redirect('/home')->with('success','Withdrawal in progress..');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

     
    public function TransactionConfirm($id)
    {
       $trans =MyTransaction::find($id);
       $user = User::find($trans->user_id);
       //if deposit
       if($trans->type == 'deposit'){
        $user->depositFloat($trans->amount);
        $trans->status = 1;
        $user->save();
        $trans->save();
        //send deposit email here
        Notification::send($user,new DepositComplete($Trans));
        return back()->with('success','Deposit confirmed!');
       }
       //if withdrawal
       if($trans->type == 'withdrawal'){
        $trans->status = 1;
        $trans->save();
        //send email here
        Notification::send($user,new WithdrawalComplete($Trans));
        return back()->with('success','Withdrawal confirmed!');
       }
    }
    
    public function WithdrawalRejected($id)
    {
       $trans =MyTransaction::find($id);
       $user = User::find($trans->user_id);
       $user->depositFloat($trans->amount);
       $trans->delete();
       //send mail
       Notification::send($user,new WithdrawalReject($Trans));
       return back()->with('success','Withdrawal rejected');
    }
    
    public function destroy($id)
    {
       $trans =MyTransaction::find($id);
       $trans->delete();
       return back()->with('success','Transaction deleted');
    }
}
