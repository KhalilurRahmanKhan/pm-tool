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
      <td width="50%">
        @if($user->role_id == "")
          {{"New"}}
        @else
        {{$user->role->role}}       
         @endif
    </td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{url('/user/edit')}}/{{$user->id}}"><button type="button" class="btn btn-sm btn-secondary">Edit</button></a>
        <a href="{{url('/user/block')}}/{{$user->id}}"><button type="button" class="btn btn-sm btn-warning">
          @if($user->block == 0)
            Block
          @else
            Unblock
          @endif
        </button></a>
        <a href="{{url('/user/delete')}}/{{$user->id}}"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
      </div>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
</main>
@endsection