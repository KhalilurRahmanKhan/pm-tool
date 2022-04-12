<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

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

        if($request->hasFile('attachment')){
            $uploaded_file = $request->file("attachment");
            $uploaded_file_new_name = $return_after_create->id.".".$uploaded_file->extension();
            
            $uploaded_file_location = base_path("public/uploads/projects/".$uploaded_file_new_name);

         
            Image::make($uploaded_file)->save($uploaded_file_location);

            $return_after_create->attachment = $uploaded_file_new_name;
            $return_after_create->save();
        }

        return redirect('/projects');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        //
    }
}
