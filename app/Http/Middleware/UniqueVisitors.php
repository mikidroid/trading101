<?php

namespace App\Http\Middleware;
use App\Models\VisitorLog;
use App\Models\Session;
use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UniqueVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   //if there is already a vistor log for this day
       if(VisitorLog::where('date','=',date('Y-m-d'))->first()){
       $sessionId = $request->session()->getId();
        //if user already added to session, proceed to intended
        $vl = VisitorLog::where('date',date('Y-m-d'))->first();
        $dbSession = null;
        foreach($vl->details as $vl){
          if($vl['session_id']==$sessionId){
            $dbSession = $vl['session_id'];
          }
        }
       // $sre = json_decode(json_encode($se->details));
        if($sessionId==$dbSession){
        //dd($sessionId);
        return $next($request);}
        //else add new user to current date session
        else{
         $visitorLog = VisitorLog::where('date','=',date('Y-m-d'))->first();
         //increase visitors count
         $visitorLog->visitors += 1;
         $v = $visitorLog->details;
         //push ip and session key to json column in db
         $v[] = ['ip'=>$request->ip(),'session_id'=>$sessionId];
         $visitorLog->details = $v;
         //save when done
         $visitorLog->save();
         //return to intended
         return $next($request);
        }
       }
       
       //if no visitor added to the current date log
       $sessionId = $request->session()->getId();
       $details = [
           "date"=>date('Y-m-d'),
           "visitors"=>1,
           "details"=>[array(
              "ip"=>$request->ip(),
              "session_id"=>$sessionId)
            ],
        ];
       $visitorLog = VisitorLog::create($details);
       return $next($request);
       
    }
}
