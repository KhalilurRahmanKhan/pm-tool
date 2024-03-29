<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Alert;
use Auth;
use File;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("tasks.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {



        return view("tasks.create",[
            "project_id" => $id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
     
        $this->validate($request,[
            'name' => 'required',
            'details' => 'required',
            'project_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'user_id' => 'required',

        ]);

        $return_after_create = Task::create([
            'name' => $request->name,
            'details' => $request->details,
            'project_id' => $request->project_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => $request->user_id,
            'status' => 0,
            'attachment' => '',

        ]);



        if($request->hasFile('attachment')){
            $uploaded_file = $request->file("attachment");
            $uploaded_file_new_name = $return_after_create->id.".".$uploaded_file->extension();
            $request->file("attachment")->move('uploads/tasks',$uploaded_file_new_name);

            $return_after_create->attachment = $uploaded_file_new_name;
            $return_after_create->save();
        }

        Alert::success('Congrats', 'Data has been stored');


        // return redirect()->to('/projects/create'); 

        return back();
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
        return view('tasks.edit',[
            'task' => Task::find($id),
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
     
        $this->validate($request,[
            'name' => 'required',
            'details' => 'required',
            'project_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

        ]);



        if($request->hasFile('attachment')){
           
            $path = public_path("uploads/tasks/".$task->attachment);
    
            if(File::exists($path)){
                File::delete($path);
            }
            $project->delete();
        }

        $task->name = $request->name;
        $task->details = $request->details;
        $task->project_id = $request->project_id;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->user_id = $request->user_id;
       
   
        $task->save();


        if($request->hasFile('attachment')){
           

            $uploaded_file = $request->file("attachment");
            $uploaded_file_new_name = $task->id.".".$uploaded_file->extension();
            $request->file("attachment")->move('uploads/tasks',$uploaded_file_new_name);

            $task->attachment = $uploaded_file_new_name;
            $task->save();
        }


        Alert::success('Congrats', 'Data has been updated');

        return redirect()->to('projects/tasklist/'.$request->project_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        
        $path = public_path("uploads/tasks/".$task->attachment);

     
 

        if(File::exists($path)){
            File::delete($path);
        }

        $task->delete();

        Alert::success('Congrats', 'Data has been deleted');


        return back();
    }


    public function view($file)
    {
        return view("tasks.view",[
            "file" => $file,
        ]);
    }

    public function statusUpdate(Request $request,$id){

        $task = Task::find($id);
        $task->status = $request->status;

        $task->save();

        return back();
    }


    public function mytask(){

        return view("tasks.mytask",[
            'mytasks' => Task::where('user_id',Auth::id())->simplePaginate(6),
        ]);
    }
}
