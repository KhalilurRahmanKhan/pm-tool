@extends("layouts.app")
@section("title")
Roles
@endsection
@section("content")
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mx-auto">

      <div class="row mb-3">
    <div class="col-md-11">
        <a href="{{url('role/create')}}"><button type="button" class="btn btn-secondary">Add new role</button></a>
        <a href="{{url('role/print')}}"><button type="button" class="btn btn-secondary">Print</button></a>
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
        <a href="{{url('/role/edit')}}/{{$item->id}}"><button type="button" class="btn btn-sm btn-secondary">Edit</button></a>
        
        <form method="POST" action="{{url('/role/delete')}}/{{$item->id}}}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-sm btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
        </form>
      </div>
      </td>
    </tr>
    @endforeach
    
  </tbody>
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