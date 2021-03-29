<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Prospect;
use App\User;

class ProspectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // passing users to assigned prospects
        $users = User::all();
        // paginating prospects
        $prospects = Prospect::paginate(8);
        // return the prospects view
        return view('admin.prospects',['prospects'=> $prospects, 'users' =>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // validate prospect details
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:prospects|email',   //all prospects email should be unique(unique to db)
            'note' => 'required',
            
           ]);
        //    creating new prospect
        $prospect = new Prospect;
        $prospect->created_by = Auth::id();
        $prospect->name = $request->name;
        $prospect->email = $request->email;
        $prospect->phone = $request->phone;
        $prospect->phone_2 = $request->phone_2;
        $prospect->address = $request->address;
        $prospect->city = $request->city;
        $prospect->county = $request->county;
        $prospect->country = $request->country;
        $prospect->note = $request->note;

        if ($request->assigned != 0) {     //if prospect is not assigned to anyone then assign to a user
        $prospect->assigned = $request->assigned;
        $prospect->date_assigned = now();       //date assigned for prospect will be now
        }
     $prospect->save();
    //  redirect to prospects view page
     return redirect('admin/prospects')->with('success','Prospect added');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prospect = Prospect::findOrFail($id);
        // assign prospect to admin
        $assigned_to = User::findOrFail($prospect->assigned);
        return view('admin.prospect',['prospect'=>$prospect,'assigned_to' =>$assigned_to->name]);
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
    public function update(Request $request)
    {
        // validate prospect details

      
      
      
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',   //all prospects email should be unique(unique to db)
            'note' => 'required',
            
           ]);
        //    retrieve the prospect
      $prospect = Prospect::find($request->id);
      $prospect->created_by = Auth::id();
        $prospect->name = $request->name;
        $prospect->email = $request->email;
        $prospect->phone = $request->phone;
        $prospect->phone_2 = $request->phone_2;
        $prospect->address = $request->address;
        $prospect->city = $request->city;
        $prospect->county = $request->county;
        $prospect->country = $request->country;
        $prospect->note = $request->note;

        if ($request->assigned != 0) {     //if prospect is not assigned to anyone then assign to a user
        $prospect->assigned = $request->assigned;
        $prospect->date_assigned = now();       //date assigned for prospect will be now
        }
     $prospect->save();
    
     return redirect('admin/prospects')->with('success', 'prospect updated successfully');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Prospect::destroy($id);

   return redirect('admin/prospects')->with('deleted','prospect removed');


    }
}
