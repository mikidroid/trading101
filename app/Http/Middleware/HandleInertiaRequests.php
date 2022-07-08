<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'appName' => config('app.name'),
            'auth.user' => function (Request $request){
             
             if(Auth::check()){
             $user = $request->user();
             $profit = $user->getWallet('profit');
             /*$profit = $user->createWallet([
              'name'=>'profit',
              'slug'=>'profit']);*/
             /*$user->depositFloat(10.3677777777);
             $profit->depositFloat(67.37);*/
             $user['bal'] = $user->balanceFloat;
             $user['profit'] = $profit->balanceFloat;
             
             }
             
             return $request->user()
                ? $user/*->only('id', 'name', 'email')*/
                : null;
             },
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'error' => fn () => $request->session()->get('error')
            ]
        ]);
    }
}
