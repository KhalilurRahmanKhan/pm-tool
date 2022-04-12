@extends("layouts.app")
@section("title")
Users
@endsection
@section("content")
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mx-auto">



<table class="table table-success table-striped">
    <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Role</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row" >{{$user->id}}</th>
      <td width="20%">{{$user->username}}</td>
      <td width="50%">{{$user->role}}</td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{url('/user/edit')}}/{{$user->id}}"><button type="button" class="btn btn-secondary">Change Role</button></a>
        <a href="{{url('/user/delete')}}/{{$user->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
      </div>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</main>
@endsection