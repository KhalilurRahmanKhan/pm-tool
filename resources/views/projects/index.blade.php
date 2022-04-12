@extends("layouts.app")
@section('title')
Projects
@endsection
@section("content")
<main class="col-md-8 ms-sm-auto col-lg-10 m-auto">
   
<div class="row mb-3">
    <div class="col-md-6">
    <a href="/projects/create"><button type="button" class="btn btn-secondary">Create new project</button></a>

    </div>
</div>

<table class="table table-success table-striped">
    <thead>
    <tr>
      <th scope="col">Project Name</th>
      <th scope="col">Code</th>
      <th scope="col">Initiated for</th>
      <th scope="col">Description</th>
      <th scope="col">Duration</th>
      <th scope="col">Owner</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @forelse($projects as $project)
    <tr>
      <td>{{$project->name}}</td>
      <td>{{$project->code}}</td>
      <td>{{$project->initiated_for}}</td>
      <td>{{$project->description}}</td>
      <td>{{$project->duration}}</td>
      <td>{{$project->project_owner}}</td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{url('projects')}}/{{$project->id}}/edit"><button type="button" class="btn btn-secondary">Edit</button></a>
        <a href="{{url('projects')}}/{{$project->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
      </div>
      </td>

      @empty
      <td colspan="20" class="text-center text-danger"> No data found</td>
    
    </tr>
  @endforelse
    
  </tbody>
</table>
</main>
@endsection