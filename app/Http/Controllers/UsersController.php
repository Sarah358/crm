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

   //   get a single user
   public function getUser(Request $request, $id){
      // returning a data dump
   // dd($id);
   // returning user view passing the user
   $user = User::findOrFail($id);

   return view('admin.user',['user'=>$user]);
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

     //function for updating user details
     public function update(Request $request){
      //   dd($request);
         //validation
   $request->validate([
      'name' => 'required',
      'email' => 'required|email',   //all users email should be unique(unique to db)
      'role' => 'required',
      'isActive' => 'required',
      ]);
      


      // retrieve the user
      $user = User::find($request->id);
      $user-> name= $request-> name;
      $user-> email= $request-> email;
      $user-> role= $request-> role;
      $user-> isActive= $request-> isActive;

       //save
       $user->save();
       

      //  redirect to the user page with a succes message
      return redirect('admin/users/'. $user->id)->with('success',' User Updated successfully');
      // return view('admin.user',['user'=>$user]);

     }

   //   deleting a user
    public function delete($id){
       
    User::destroy($id);
   return redirect('admin/users')->with('deleted','User has been removed!!');

   // $user = User::findOrFail($id);
   // $user->delete($request->all());
   
    }

}
