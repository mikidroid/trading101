<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MyTransaction;
use App\Models\User; 
use App\Models\Investment;
use App\Models\Lottery;

class Dashboard extends Controller
{
    //index page
    public function index(Request $request){
     $data = null;
     $data['users'] = User::all()->count();
     $data['lottery'] = Lottery::whereStatus(1)->first();
     $data['deposits'] = MyTransaction::whereType('deposit')->get()->count();
     $data['withdrawals'] = MyTransaction::whereType('withdrawal')->get()->count();
     $data['investments'] = Investment::all()->count();
     $data['total_deposit'] = $this->total_deposit();
     $data['total_withdrawal'] = $this->total_withdrawal();
     return Inertia::render('admin/dashboard',['data'=>$data]);
    }
    //get total deposit
    public function total_deposit(){
     $total = 0;
     $deps = MyTransaction::whereType('deposit')->whereStatus(1)->get();
     foreach($deps as $dep){
       $total += $dep->amount;
     }
     return $total;
    }
    //get total withdrawal
    public function total_withdrawal(){
     $total = 0;
     $withs = MyTransaction::whereType('withdrawal')->whereStatus(1)->get();
     foreach($withs as $wit){
       $total += $wit->amount;
     }
     return $total;
    }
    
    
    //Other admin pages
    //users page
    public function users(){
      $users = User::all();
      foreach($users as $user){
       $user['balance'] = $user->balanceFloat;
      }
      return Inertia::render('admin/users',['data'=>$users]);
    }
    
    //deposit page
    public function deposits(){
      $deposits = MyTransaction::whereType('deposit')->get();
      return Inertia::render('admin/deposits',['data'=>$deposits]);
    }
    
    //withdraw page
    public function withdrawals(){
      $withdrawals = MyTransaction::whereType('withdrawal')->get();
      return Inertia::render('admin/withdrawals',['data'=>$withdrawals]);
    }
    
    //investment page
    public function investments(){
      $investments = Investment::all();
      return Inertia::render('admin/investments',['data'=>$investments]);
    }
    
    //credit user
    public function CreditUser(Request $request, $id){
      $user = User::find($id);
      $user->depositFloat($request->amount);
      $user->save();
      // send user mail
      return redirect('admin')->with('success','User Credited successfully!');
    }
    
    //delete user
    public function DeleteUser($id){
      $user = User::find($id);
      if(!$user->is_admin){
        $user->delete();
        return redirect('admin/users')->with('success','User Deleted successfully!');}
      return redirect('admin/users')->with('error','You Cant Delete Admin!');
    }
}
