@extends("layouts.app")
@section("title")
Edit the role
@endsection
@section("content")
<div class="row" style="    margin-left: 145px;">
    <div class="col-md-8 mx-auto ml-5">
    <form action="{{url('user/update')}}/{{$user->id}}" method="post">
    @csrf
    <div class="role-form">
    <div class="" style="width:100%;">
    <label for="">Role</label><br>
    <div class=" input-div">
        <select  name="role"  id="">
            <option value="" selected>Select one</option>
            @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->role}}</option>
            @endforeach
        </select> 

   </div>
    </div>
           
            
            
           </div>
            <div class="button" style="width:45%;">
                <input type="submit" name="" value="Edit" class="colored-btn">
    </div>
</form>
     
    </div>
</div>



@endsection