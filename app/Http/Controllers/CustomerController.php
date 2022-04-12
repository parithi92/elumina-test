<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{   


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'dob' => 'required',
        ]);
        $user = User::create([
            'first_name'=> $request->fname,
            'last_name'=> $request->lname,
            'email'=> $request->email,
            'dob'=> $request->dob,
            'status'=> "In Review",
        ]);
        return back()->with('success', 'Customer added Sucessfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $users = User::Where('is_admin','!=', 1)->orWhereNull('is_admin')->get();
        return view('viewdata', compact('users'));
    }

    public function viewStatus(Request $request){
        $user = User::Where('id', $request->id)->get();
        return view('updatestatus', compact('user'));
    }

    public function updateStatus(Request $request){

        $id = $request->id;
        $status = $request->status;
        $user = User::findorfail($id);       
        $user->status = $status;

        $password = "";
        if($status=="Approved"){
            $password = "admin@123";
            $user->password = Hash::make($password);
        }

        $userInfo = User::Where('id', $id)->get();
        $updated = $user->save();
        if($status=="Approved" || $status=="Rejected"){

            $mailDetails = [
                'first_name' => $userInfo[0]->first_name,
                'last_name' => $userInfo[0]->last_name,
                'password' => $password,
                'status' => $status,
            ];
   
            \Mail::to($userInfo[0]->email)->send(new \App\Mail\sendMail($mailDetails));
        }
        return back()->with('success', 'Updated Sucessfully !');
    }
    
    public function viewRole(Request $request){
        $user = User::Where('id', $request->id)->get();
        return view('viewrole', compact('user'));
    }

    public function updateRole(Request $request){

        $id = $request->id;
        $role = $request->role;
        $user = User::findorfail($id);
        $user->is_admin = $role; 
        $updated = $user->save();
        return back()->with('success', 'Updated Sucessfully !');
    }
}
