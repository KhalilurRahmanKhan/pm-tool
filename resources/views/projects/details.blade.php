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
                <p><label for="" style="width:40%;"> <b>Id:</b> </label><span>{{$project->id}}</span></p>
                <p><label for="" style="width:40%;"> <b>Code:</b> </label><span>{{$project->code}}</span></p>
                <p><label for="" style="width:40%;"> <b>Start Date:</b> </label><span>{{$project->start_date}}</span></p>
                <p><label for="" style="width:40%;"> <b>Project Owner:</b> </label><span>{{$project->project_owner}}</span></p>
                <p><label for="" style="width:40%;"> <b>Created At:</b> </label><span>{{$project->created_at}}</span></p>
            </div>
            <div class="col-md-6">
                <p><label for="" style="width:40%;"> <b>Name:</b> </label><span>{{$project->name}}</span></p>
                <p><label for="" style="width:40%;"> <b>Initiated For:</b> </label><span>{{$project->initiated_for}}</span></p>
                <p><label for="" style="width:40%;"> <b>End Date:</b> </label><span>{{$project->end_date}}</span></p>
                <p><label for="" style="width:40%;"> <b>Remarks:</b> </label><span>{{$project->remarks}}</span></p>
                <p><label for="" style="width:40%;"> <b>Updated At:</b> </label><span>{{$project->updated_at}}</span></p>
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
<tr class="pm-tbody">
    <td>{{$task->name}}</td>
    <td>{{$task->details}}</td>
    <td>ghsgrfh</td>
    <td>
        {{App\Models\User::find($task->user_id)->username}}
    </td>
    <td>ghsgrfh</td>
    <td>ghsgrfh</td>
</tr>
@endforeach


</table>
        </div>
    </div>
</div>
@endsection