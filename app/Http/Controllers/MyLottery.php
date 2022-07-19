<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Lottery;
use App\Models\User;
use App\Notifications\User\LotteryWinner;
use Illuminate\Support\Facades\Notification;
 

class MyLottery extends Controller
{

    public function index()
    {
        $lottery = Lottery::whereStatus(1)->first();
        return Inertia::render('user/lottery',["data"=>$lottery]);
    }

    public function LotteryCron(Request $request)
    {
        if(Lottery::whereStatus(1)->first()){
         $lott = Lottery::whereStatus(1)->first();
         $lott->status = 0;
         $lott->save();
        } 
        $user = User::whereIs_admin(false)->get();
        $num = count($user);
        $random = rand(1,$num);
        
        $user = User::find($random);
        $details = [
           'amount' => env('LOTTERY_AMOUNT'),
           'name'=>$user->name,
           'email'=>$user->email,
           'user_id'=>$user->id,
         ];
         $lottery = new Lottery($details);
         $lottery->save();
         // send email
         Notification::send($user, new LotteryWinner($lottery));
    }
    
   public function ClaimLottery($id)
    {
      $lottery = Lottery::find($id);
      $lottery->claimed = 1;
      $lottery->save();
    }
    
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
