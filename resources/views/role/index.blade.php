@extends("layouts.app")
@section("title")
Create a role
@endsection
@section("content")
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mx-auto">

      <div class="row mb-3">
    <div class="col-md-11">
        <a href="{{url('role/create')}}"><button type="button" class="btn btn-secondary">Add new role</button></a>
    </div>
</div>



<table class="table table-success table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Role</th>
      <th scope="col">Comments</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($role as $item)
    <tr>
      <th scope="row" >{{$item->id}}</th>
      <td width="20%">{{$item->role}}</td>
      <td width="50%">{{$item->comments}}</td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{url('/role/edit')}}/{{$item->id}}"><button type="button" class="btn btn-secondary">Edit</button></a>
        <a href="{{url('/role/delete')}}/{{$item->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
      </div>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</main>
@endsection