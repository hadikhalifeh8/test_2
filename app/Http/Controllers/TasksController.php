<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\StoreTask;
use App\task;
use App\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('utype','Usr')->get();
        $depart = Department::all();
        $task = task::all();

        return view('pages.admin.Tasks.tasks', compact('user', 'depart', 'task'));
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
    public function store(StoreTask $request)
    {
        $task = new task();

        $task->name = $request->name;
        $task->user_id= $request->user_id;
        $task->departmet_id = $request->department_id;

        $task->save();

        toastr()->success('task Data Saved Successfully');
        return redirect()->route('tasks.index');


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
    public function update(StoreTask $request)
    {
       $task = new task();

       $task->name = $request->name;
       $task->user_id = $request->user_id;
       $task->departmet_id = $request->department_id;

       $task->save();

       toastr()->success('task Data Saved Successfully');
       return redirect()->route('tasks.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $task = task::findOrFail( $request->id)->delete();

        toastr()->error('task Data Deleted Successfully');
        return redirect()->route('tasks.index');
    }

   

}
