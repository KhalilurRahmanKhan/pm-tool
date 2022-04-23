
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

   

        <form method="POST" action="{{url('/user/delete')}}/{{$user->id}}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-sm btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa-solid fa-trash-can"></i></button>
        </form>

      </div></td>
        </tr>
        @endforeach

        

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