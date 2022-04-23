<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\User;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Facades\Storage;
use Alert;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('projects.index',[
            "projects" => project::all(),
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
        //
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
            $file = Project::find($project);
            $path = public_path("uploads/projects/".$file[0]->attachment);
            echo $path;
    
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
