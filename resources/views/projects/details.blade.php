@extends("layouts.app")
@section("title")
Details
@endsection
@section("content")
<div class="row" style="margin-left:80px;">
    <div class="col-md-5">
      <iframe src="/uploads/projects/{{$project->attachment}}" frameborder="0" width="100%" height="350px"></iframe>
    </div>
    <div class="col-md-7">
        <div class="row mt-3">
            <div class="col-md-6">
                <p><label for="" style="width:40%;"> <b>Id</b> </label><b>:</b>     <span>{{$project->id}}</span></p>
                <p><label for="" style="width:40%;"> <b>Code</b> </label><b>:</b>     <span>{{$project->code}}</span></p>
                <p><label for="" style="width:40%;"> <b>Start Date</b> </label><b>:</b>     <span>{{$project->start_date}}</span></p>
                <p><label for="" style="width:40%;"> <b>Owner</b> </label><b>:</b>     <span>{{$project->project_owner}}</span></p>
                <p><label for="" style="width:40%;"> <b>Created At</b> </label><b>:</b>     <span>{{$project->created_at}}</span></p>
            </div>
            <div class="col-md-6">
                <p><label for="" style="width:40%;"> <b>Name</b> </label><b>:</b>     <span>{{$project->name}}</span></p>
                <p><label for="" style="width:40%;"> <b>Initiated For</b> </label><b>:</b>     <span>{{$project->initiated_for}}</span></p>
                <p><label for="" style="width:40%;"> <b>End Date</b> </label><b>:</b>     <span>{{$project->end_date}}</span></p>
                <p><label for="" style="width:40%;"> <b>Remarks</b> </label><b>:</b>   <span>{{$project->remarks}}</span></p>
                <p><label for="" style="width:40%;"> <b>Updated At</b> </label><b>:</b>     <span>{{$project->updated_at}}</span></p>
            </div>
            <p>{{$project->description}}</p>
        </div>
    </div>


    <div class="row mt-5 ">
    <div class="col-md-9">
    </div>
    <div class="col-md-3">
        <a href="{{url('tasks/create')}}/{{$project->id}}"><button type="button" class="blue-btn">Add new task</button></a>
    </div>
</div>

    <div class="row">
        <div class="col-md-10 mx-auto">
        <table class="pm-table">

<tr class="pm-thead">
    <th>Name</th>
    <th>Details</th>
    <th>Duration</th>
    <th>Assign to</th>
    <th>Attachment</th>
    <th>Status</th>
    <th>Action</th>
</tr>


@foreach($tasks as $task)

@php
$start_date = new DateTime($task->start_date);
$end_date = new DateTime($task->end_date);
$interval = $start_date->diff($end_date);
@endphp
<tr class="pm-tbody">
    <td>{{$task->name}}</td>
    <td>{{$task->details}}</td>
    <td>{{$interval->days}} days</td>
    <td>
        {{App\Models\User::find($task->user_id)->username}}
    </td>
    <td>
    <a href="{{url('tasks/attachment/view')}}/{{$task->attachment}}" 
        <?php
        if($task->attachment == null)
       echo "style='pointer-events: none'";
          ?>
        >
          <button
        type="button" class="btn btn-sm btn-primary" 
        <?php
        if($task->attachment == null)
          echo "disabled "; echo "style='pointer-events: none'";
          ?>
          
        ><i class="fa-solid fa-eye"></i></button></a>
    </td>
    <td>
    <form method="post" action="{{url('tasks/status/update')}}/{{$task->id}}">
        @csrf
        <select name='status' onchange='if(this.value != null) { this.form.submit(); }'>
            <option value='' selected disabled>
            @if($task->status == 0)
            Not Started
            @elseif($task->status == 1)
            In Progress
            @elseif($task->status == 2)
            Completed
            @elseif($task->status == 3)
            Waiting
            @else
            Deferred
            @endif

            </option>

            @if($task->status == 0)
            <option value='1'>In Progress</option>
            <option value='2'>Completed</option>
            <option value='3'>Waiting</option>
            <option value='4'>Deferred</option>
            @elseif($task->status == 1)
            <option value='0'>Not Started</option>
            <option value='2'>Completed</option>
            <option value='3'>Waiting</option>
            <option value='4'>Deferred</option>
            @elseif($task->status == 2)
            <option value='0'>Not Started</option>
            <option value='1'>In Progress</option>
            <option value='3'>Waiting</option>
            <option value='4'>Deferred</option>
            @elseif($task->status == 3)
            <option value='0'>Not Started</option>
            <option value='1'>In Progress</option>
            <option value='2'>Completed</option>
            <option value='4'>Deferred</option>
            @else
            <option value='0'>Not Started</option>
            <option value='1'>In Progress</option>
            <option value='2'>Completed</option>
            <option value='3'>Waiting</option>
            @endif
        </select>
    </form>
    </td>
    <td>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{url('projects')}}/{{$project->id}}/edit"><button type="button" class="btn btn-sm  btn-secondary"><i class="fa-solid fa-eraser"></i></button></a>

        <form method="POST" action="{{ url('projects')}}/{{$project->id }}">
            @csrf

            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-sm btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa-solid fa-trash-can"></i></button>
        </form>


      </div>
      </td>
</tr>
@endforeach


</table>
        </div>
    </div>
</div>
@endsection