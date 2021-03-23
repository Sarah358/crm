<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
         'password' => 'required|min:4',   //password to be same as confirm password
         'confirm_password' => 'required|same:password',
        ]);

        //add user to db
        //hash password
        $user_password = Hash::make($request->password);

        $user = new User;
        $user-> name= $request-> name;
        $user-> email= $request-> email;
        $user-> role= $request-> role;
        $user-> password= $user_password;

        //save
        $user->save();

      //   redirect to users page with a success message
      return redirect('admin/users')->with('success', 'successfully added a user');


        
      
     }

}
