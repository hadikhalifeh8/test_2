<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\StoreUser;
use App\User;
use Illuminate\Http\Request;

class myprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   





    public function index()
    {
        $users = User::where('utype','Usr')->first();
        $department = Department::all();
        return view('pages.user.myprofile', compact('department', 'users'));
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
    public function update(StoreUser $request)
    {
        $updt_user_prof = User::findOrFail($request->id);

        $updt_user_prof->name = $request->name;
        $updt_user_prof->email =$request->email;
        $updt_user_prof->department_id = $request->department_id;

        $updt_user_prof->password = $request->password;
       


        $updt_user_prof->save();
        toastr()->success('User Data Saved Successfully');
       
        return view('pages.user.myprofile');
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
