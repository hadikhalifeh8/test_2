<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\StoreUser;
use App\task;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{


   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('utype','Usr')->get();
        $department = Department::all();
        return view('pages.admin.User.users', compact('department', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
      $user = new User();

      $user->name = $request->name;
      $user->email = $request->email;
      $user->utype = "Usr";
      $user->password = bcrypt($request->password);
      $user->department_id = $request->department_id;

      $user->save();

      toastr()->success('User Data Saved Successfully');
      return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('name', $id)->first();
        $user_id = $user->id;

        $get_tasks = task::where('user_id', $user_id)->get();

        return view('pages.user.mytasks',compact('get_tasks', 'user'));

        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreUser $request)
    {
        
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
        $updt_user = User::findOrFail($request->id);

        $updt_user->name = $request->name;
        $updt_user->email =$request->email;
        $updt_user->department_id = $request->department_id;



        $updt_user->save();
        toastr()->success('User Data Saved Successfully');
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail( $request->id)->delete();

        toastr()->error('User Data Deleted Successfully');
        return redirect()->route('users.index');
        
    }


}
