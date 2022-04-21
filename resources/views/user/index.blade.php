@extends("layouts.app")
@section("title")
Users
@endsection
@section("content")
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mx-auto">

<table class="pm-table">

        <tr class="pm-thead">
        <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Role</th>
      <th scope="col">Actions</th>
        </tr>
 
        @foreach($users as $user)
        <tr class="pm-tbody">
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td> @if($user->role_id == "")
          {{"New"}}
        @else
        {{$user->role->role}}       
         @endif</td>
            <td> <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{url('/user/edit')}}/{{$user->id}}"><button type="button" class="btn btn-sm btn-secondary"><i class="fa-solid fa-eraser"></i></button></a>
        <a href="{{url('/user/block')}}/{{$user->id}}"><button type="button" class="btn btn-sm btn-primary">
          @if($user->block == 0)
         </i><i class="fa-solid fa-lock"></i>
          @else
          <i class="fa-solid fa-lock-open"></i>
          @endif
        </button></a>
        <a href="{{url('/user/delete')}}/{{$user->id}}"><button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button></a>
      </div></td>
        </tr>
        @endforeach

        

</table>


</main>
@endsection