<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
   //show add users form
     public function index(){
        //  display all users
        $users = User::all();

        return view('admin.users',['users'=>$users]);
     }

     //store users details
     public function store(Request $request){
        //validation
        
        $request->validate([
         'name' => 'required',
         'email' => 'required|unique:users|email',   //all users email should be unique(unique to db)
         'role' => 'required',
         'password' => 'required|same:confirm_password',   //password to be same as confirm password
         'confirm_password' => 'required',


        ]);
        
      
     }

}
