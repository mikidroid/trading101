<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Str;
use App\Models\Investment;
use App\Models\User;
use Auth;
class Invest extends Controller
{

    public function index()
    {
       if(Auth::user()->is_admin){
        $inv = Investment::all();
        return Inertia::render('admin/investments',['data'=>$inv]);
       }
       //load for normal user
       $user = User::find(Auth::user()->id);
       $inv = $user->investment;
       return Inertia::render('user/investments',['data'=>$inv]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('user/invest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $bal = $user->balanceFloat;
         
        $request->validate([
            'amount' => 'min:'.env('INVESTMENT_MIN').'|max:'.env('INVESTMENT_MAX').'|required|integer'
          ]);
        if($request->amount > $bal){
          return redirect('/home')->with('error','Insufficient balance!');
        }
        $start_date = Carbon::now();
        $end_date = Carbon::createFromDate($start_date)->addDays(env('INVESTMENT_DURATION'));
        //For cron testing purpose i reduced time to 2mins
        //$end_date = Carbon::createFromDate($start_date)->addMinutes(2);
        $random = Str::random(5).substr(time(), 6,8).Str::random(5);
        
      //  $coin_value = file_get_contents('');
        $details = [
          'user_id'=>$user->id,
          'interest'=>0,
          'start_date'=>$start_date,
          'end_date'=>$end_date,
         // 'coin_value'=>$coin_value,
          'amount'=>$request->amount,
          'ref'=> $random,
          'duration'=>env('INVESTMENT_DURATION'),
          'name'=>$user->name,
          'email'=>$user->email,
          'status'=>1
         ];
        $user->withdrawFloat($request->amount);
        $Trans = new Investment($details);
        $Trans->save(); 
        //send admin mail
        //send user mail
        return redirect('/home')->with('success','You successfully invested '.$request->amount);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
    }
    
    public function InvestCron(Request $request)
    {
        $invs = Investment::whereStatus(1)->get();
        $current_date = Carbon::now();
        //loop users
        foreach ($invs as $inv){
         $user = User::find($inv->user_id);
         $profit = $user->getWallet('profit');
           //check for expired investment
           if($inv->end_date < $current_date){
            $sum = $inv->amount + $inv->interest;
            $profit->withdrawFloat($inv->interest);
            $user->depositFloat($sum);
            $inv->status = 0;
            $inv->save();
          } else{
         //calculate percent
         $percent = $inv->amount/100*env('INTEREST_PERCENT');
         $profit->depositFloat($percent);
         $inv->interest += $percent;
         $inv->save();
          }
        }
    }


    public function destroy($id)
    {
        //
    }
}
