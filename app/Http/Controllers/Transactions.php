<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
class Transactions extends Controller
{

    public function index()
    {
        //
        return Inertia::render('user/transactions');
    }


    public function deposit(Request $request)
    {
        //
        $request->session()->flash('success','done');
        return Inertia::render('user/deposit');
    }


    public function withdrawal()
    {
        //might be empty if user isnt logged in so configure guard for this path
       return Inertia::render('user/withdrawal');
    }

     
    public function store(Request $request)
    {
        //
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
        //
        $Trans = Transaction::findOrFail($id);
        $User = $request->user();
        $data['trans'] = $Trans;
        $data['user'] = $User;
        //send data to email
        switch($Trans->type){
         case 'deposit':
          $Trans->status=1;
          $User->depositFloat($Trans->amount);
          //send mail here
          return back()->with('success','Deposit confirmed');
          break;
         case 'withdrawal':
          $Trans->status=1;
          $User->withdrawFloat($Trans->amount);
          //send mail here
          return back()->with('success','withdraw confirmed');
        }
    }
    
    public function depositCallback(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
      * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
