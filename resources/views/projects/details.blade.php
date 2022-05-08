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
    <div class="col-md-10">

    </div>
    <div class="col-md-2">
        <a href="{{url('projects/tasklist')}}/{{$project->id}}"><button type="button" class="blue-btn">See the task list</button></a>
    </div>

    
    <div style="margin-top:20px;">

 

    {!! $chart->container() !!}

    </div>



</div>

        </div>
    </div>
</div>
 
{!! $chart->script() !!}

@endsection