<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Project;
use App\Models\Task;
use App\Charts\ProjectChart;



class DashboardController extends Controller
{
    function index(){
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
 

}
  
 
     


      $chart = new ProjectChart;
      $chart->labels($labels);
      $chart->dataset('Projects', 'bar',$status)->backgroundColor('#2e10f3');
      return view('dashboard',[
        'project_chart' =>$chart,
      ]);
    }

}
