@extends("layouts.app")
@section("content")
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Teams</h1>
      </div> 

      <div class="row mb-3">
    
</div>



<table class="table table-success table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">role_id</th>
      <th scope="col">comments</th>
      <th scope="col">attachment</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($teams as $team)
    <tr>
      <th scope="row">{{$team->id}}</th>
      <td>{{$team->name}}</td>
      <td>{{$team->role_id}}</td>
      <td>{{$team->comments}}</td>
      <td>{{$team->attachment}}</td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{url('/role/edit')}}/{{$team->id}}"><button type="button" class="btn btn-secondary">Edit</button></a>
        <a href="{{url('/role/delete')}}/{{$team->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
      </div>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</main>
@endsection