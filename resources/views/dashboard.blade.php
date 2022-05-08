@extends("layouts.app")
@section("content")
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mx-auto">
<div class="row board justify-content-center">
    <div class="col-md-3 pin">
        <h3>Users</h3>
        <h1>{{App\Models\User::count()}}</h1>
    </div>
    <div class="col-md-3 pin">
        <h3>Projects</h3>
        <h1>{{App\Models\Project::count()}}</h1>
    </div>
    <div class="col-md-3 pin">
        <h3>Tasks</h3>
        <h1>{{App\Models\Task::count()}}</h1>
    </div>
   
</div>
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