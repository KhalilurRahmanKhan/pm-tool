<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Facades\Storage;
use Alert;
use App\Charts\TaskChart;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $project_id = [];
        foreach(Task::where('user_id',auth()->user()->id)->distinct('project_id')->get() as $project){
            array_push($project_id,$project->project_id);
          
        }

        $user_projects =  project::whereIn('id',$project_id)->get();

        return view('projects.index',[
            "projects" => project::all(),
            "user_projects" => $user_projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('projects.create',[
            'users' => User::all(),
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
            'code' => 'required',
            'initiated_for' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'duration' => 'required',
            'project_owner' => 'required',
            'remarks' => 'required',

        ]);

        $return_after_create = project::create([
            'name' => $request->name,
            'code' => $request->code,
            'initiated_for' => $request->initiated_for,
            'description' => $request->description,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $request->duration,
            'project_owner' => $request->project_owner,
            'remarks' => $request->remarks,
        ]);

        // if($request->hasFile('attachment')){
        //     $uploaded_file = $request->file("attachment");
        //     $uploaded_file_new_name = $return_after_create->id.".".$uploaded_file->extension();
            
        //     $uploaded_file_location = base_path("public/uploads/projects/".$uploaded_file_new_name);

         
        //     Image::make($uploaded_file)->save($uploaded_file_location);

        //     $return_after_create->attachment = $uploaded_file_new_name;
        //     $return_after_create->save();
        // }


        if($request->hasFile('attachment')){
            $uploaded_file = $request->file("attachment");
            $uploaded_file_new_name = $return_after_create->id.".".$uploaded_file->extension();
            
            // $uploaded_file_location = base_path("public/uploads/projects/".$uploaded_file_new_name);

         
            // $request->file("attachment")->store($uploaded_file_location);
            $request->file("attachment")->move('uploads/projects',$uploaded_file_new_name);

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
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {

        $labels = [];
        $status=[];

        foreach(Task::where('project_id',$project->id)->where('user_id',auth()->user()->id)->get() as $task){
            array_push($labels,$task->name);
            if($task->status== 0){
                array_push($status,0);
            }
            elseif($task->status== 1){
                array_push($status,50);
            }
            elseif($task->status== 2){
                array_push($status,100);
            }
            elseif($task->status== 3){
                array_push($status,0);
            }
            elseif($task->status== 4){
                array_push($status,0);
            }
        }

        $chart = new TaskChart;
        $chart->labels($labels);
        $chart->dataset('Tasks', 'line',$status)->color('#16009E');
        
        return view("projects.details",[
            'chart' =>$chart,
            'project' =>$project,
            'tasks' => Task::where('project_id',$project->id)->get(),
        ]);
    }

    public function tasklist(project $project)
    {

        if(auth()?->user()?->role_id == 1){
            return view("projects.tasklist",[
                'project' =>$project,
                'tasks' => Task::where('project_id',$project->id)->get(),
            ]);
        }
        else{
            return view("projects.tasklist",[
                'project' =>$project,
                'tasks' => Task::where('project_id',$project->id)->where('user_id',auth()?->user()?->id)->get(),
            ]);
        }

        return view("projects.tasklist",[
            'project' =>$project,
            'tasks' => Task::where('project_id',$project->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        return view('projects.edit',[
            'project' => $project,
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required',
            'initiated_for' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'duration' => 'required',
            'project_owner' => 'required',
            'remarks' => 'required',

        ]);



        if($request->hasFile('attachment')){
           
            $path = public_path("uploads/projects/".$project->attachment);
    
            if(File::exists($path)){
                File::delete($path);
            }
            $project->delete();
        }

        $project->name = $request->name;
        $project->code = $request->code;
        $project->initiated_for = $request->initiated_for;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->duration = $request->duration;
        $project->project_owner = $request->project_owner;
        $project->remarks = $request->remarks;
   
        $project->save();


        if($request->hasFile('attachment')){
           

            $uploaded_file = $request->file("attachment");
            $uploaded_file_new_name = $project->id.".".$uploaded_file->extension();
            $request->file("attachment")->move('uploads/projects',$uploaded_file_new_name);

            $project->attachment = $uploaded_file_new_name;
            $project->save();
        }


        Alert::success('Congrats', 'Data has been updated');

        return redirect()->to('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {


        // $file = Project::find($project);

        // $file = Project:::where('id', explode(',' $test))->get();

        $path = public_path("uploads/projects/".$project->attachment);

     
 

        if(File::exists($path)){
            File::delete($path);
        }

        $project->delete();

        Alert::success('Congrats', 'Data has been deleted');


        return back();
       
    }


    public function download($file)
    {
        return response()->download(public_path("uploads/projects/".$file));
    }

    public function view($file)
    {
        return view("projects.view",[
            "file" => $file,
        ]);
    }


   
}
