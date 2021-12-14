<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\TaskModel;
use App\Models\User;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    private $objUser;
    private $objTask;

    public function __construct()
    {
        $this->objUser=new User();
        $this->objTask=new TaskModel();  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task=$this->objTask->paginate(10);
        return view('index',compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->objUser->all();
        return view('create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $cad=$this->objTask->create([
            'title'=>$request->title,
            'done'=>$request->done,
            'id_user'=>$request->id_user
         ]);
         if($cad){
             return redirect('tasks');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task=$this->objTask->find($id);
        return view('show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=$this->objTask->find($id);
        $users=$this->objUser->all();
        return view('create',compact('task','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $this->objTask->where(['id'=>$id])->update([
            'title'=>$request->title,
            'done'=>$request->done,
            'id_user'=>$request->id_user
        ]);
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objTask->destroy($id);
        return($del)?"sim":"não";
    }
}
