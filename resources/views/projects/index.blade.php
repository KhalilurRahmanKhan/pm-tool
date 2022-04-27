@extends("layouts.app")
@section('title')
Projects
@endsection
@section("content")
<main class="col-md-8 ms-sm-auto col-lg-10 m-auto">
   
<div class="row ">
    <div class="col-md-10">
    </div>
    <div class="col-md-2">
        <a href="{{url('projects/create')}}"><button type="button" class="blue-btn">Create New</button></a>
    </div>
</div>
<table class="pm-table">

        <tr class="pm-thead">
        <th scope="col">Project Name</th>
      <th scope="col">Duration</th>
      <th scope="col">Owner</th>
      <th scope="col">Progress</th>
      <th scope="col">Attachment</th>
      <th scope="col">Actions</th>
        </tr>
 
        @forelse($projects as $project)
        <tr class="pm-tbody">
        <td>{{$project->name}}</td>
      <td>{{$project->duration}}</td>
      <td>{{$project->project_owner}}</td>
      <td>
      @php
      $progress = 0;
      $tasks=App\Models\Task::where('project_id',$project->id)->get();
      $count=App\Models\Task::where('project_id',$project->id)->count();
     foreach($tasks as $task){
       if($task->status == 1){
        $progress+=50;
       }
       elseif($task->status == 2){
        $progress+=100;
       }
     }
    $progress/=$count;
    
      @endphp



      <div class="progress">
      <div class="progress-bar" role="progressbar"style="width: {{$progress}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"><div>
      </div>


      </td>
           
      <td>
     
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{url('projects/attachment/view')}}/{{$project->attachment}}" 
        <?php
        if($project->attachment == null)
       echo "style='pointer-events: none'";
          ?>
        >
          <button
        type="button" class="btn btn-sm btn-primary" 
        <?php
        if($project->attachment == null)
          echo "disabled "; echo "style='pointer-events: none'";
          ?>
          
        ><i class="fa-solid fa-eye"></i></button></a>
        <a href="{{url('projects/attachment/download')}}/{{$project->attachment}}" <?php
        if($project->attachment == null)
       echo "style='pointer-events: none'";
          ?>><button   <?php
          if($project->attachment == null)
            echo "disabled "; echo "style='pointer-events: none'";
            ?> type="button" class="btn btn-sm btn-info"><i class="fa-solid fa-download"></i></button></a>
      </div>
      </td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{url('projects')}}/{{$project->id}}/edit"><button type="button" class="btn btn-sm  btn-secondary"><i class="fa-solid fa-eraser"></i></button></a>

      <!--         
        <form action="{{ url('projects')}}/{{$project->id }}" method="POST">
            @csrf

            @method('DELETE')

            <button type="submit" class="btn btn-sm btn-danger btn-block"><i class="fa-solid fa-trash-can"></i></button>
        </form> -->

        <form method="POST" action="{{ url('projects')}}/{{$project->id }}">
            @csrf

            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-sm btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa-solid fa-trash-can"></i></button>
        </form>
        <a href="{{url('projects')}}/{{$project->id}}"><button type="button" class="btn btn-sm  btn-success"><i class="fa-solid fa-bars"></i></button></a>


      </div>
      </td>

      @empty
      <td colspan="20" class="text-center text-danger"> No data found</td>
    
    </tr>
  @endforelse
        

</table>

</main>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>


@endsection