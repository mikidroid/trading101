<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //
    public function index(Request $request){
     return Inertia::render('admin/dashboard');
    }
}
