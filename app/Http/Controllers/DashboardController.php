<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\project;
use App\Models\Task;
use App\Charts\ProjectChart;



class DashboardController extends Controller
{

   
    function index(){


      if(auth()?->user()?->role_id == 1){
        $labels = [];
        $status = [];
  
        foreach(Project::all() as $project){
            array_push($labels,$project->name);
  
        }
  
  foreach(Project::all() as $project){
    $progress = 0;
  
   
    $tasks=Task::where('project_id',$project->id)->get();
    $count=Task::where('project_id',$project->id)->count();


  
 
  
  
  
    if($count==0){
      continue;
    }
    else{
      foreach($tasks as $task){
        if($task->status == 1){
         $progress+=50;
        }
        elseif($task->status == 2){
         $progress+=100;
        }
      }
     $progress/=$count;
     array_push($status, $progress);
    }
    
      }}



      
      else{
        $labels = [];
        $status = [];
        $project_id = [];
          foreach(Task::where('user_id',auth()->user()->id)->distinct('project_id')->get() as $project){
              array_push($project_id,$project->project_id);
            
          }
  
        foreach(Project::whereIn('id',$project_id)->get() as $project){
            array_push($labels,$project->name);
  
        }

        
  
  foreach(Project::whereIn('id',$project_id)->get() as $project){
    $progress = 0;
  
    $tasks=Task::where('project_id',$project->id)->get();
    $count=Task::where('project_id',$project->id)->count();


  
  
  
    if($count==0){
      continue;
    }
    else{
      foreach($tasks as $task){
        if($task->status == 1){
         $progress+=50;
        }
        elseif($task->status == 2){
         $progress+=100;
        }
      }
     $progress/=$count;
     array_push($status, $progress);
    }}
      }
     
 
  
 
     


      $chart = new ProjectChart;
      $chart->labels($labels);
      $chart->dataset('Projects', 'bar',$status)->color('#2e10f3');
      return view('dashboard',[
        'project_chart' =>$chart,
      ]);
    }

}
