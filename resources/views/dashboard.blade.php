@extends("layouts.app")
@section("content")
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mx-auto">
<div class="row board justify-content-center">
@if(auth()?->user()?->role_id == 1)
    <div class="col-md-3 pin">
    <i class="fa-solid fa-users"></i>
        <h4>Users</h4>
        <h1>{{App\Models\User::count()}}</h1>
    </div>
    <div class="col-md-3 pin">
    <i class="fa-solid fa-briefcase"></i>
        <h4>Projects</h4>
        <h1>{{App\Models\Project::count()}}</h1>
    </div>
    <div class="col-md-3 pin">
    <i class="fa-solid fa-list-check"></i>
        <h4>Tasks</h4>
        <h1>{{App\Models\Task::count()}}</h1>
    </div>
    @endif

    @if(auth()?->user()?->role_id != 1)
  
    <div class="col-md-3 pin">
    <i class="fa-solid fa-briefcase"></i>
        <h4>Projects</h4>
        <h1>{{App\Models\Task::where('user_id',auth()->user()->id)->distinct('project_id')->count()}}</h1>

    </div>
    <div class="col-md-3 pin">
    <i class="fa-solid fa-list-check"></i>
        <h4>Tasks</h4>
        <h1>{{App\Models\Task::where('user_id',auth()->user()->id)->count()}}</h1>
    </div>
    @endif
   
</div>
<br>
<div class="row board justify-content-center">
<div class="col-md-10 ">
{!! $project_chart->container() !!}
    </div>
   
</div>
<div class="row board justify-content-center">
<div class="col-md-10  ">
    </div>
</div>
<main/>

{!! $project_chart->script() !!}
@endsection