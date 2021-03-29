<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Prospect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isActive');   //adding isActive middleware

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role =='admin') {
        return view('admin.index');    

        }elseif (Auth::user()->role =='user') {
            // display assigned leads
            $assigned_leads = Prospect::where('assigned',Auth::id())->get();
        return view('user.index',['assigned_leads' =>$assigned_leads]);    

        }
        return view('home');
    }
}
