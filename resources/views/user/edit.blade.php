@extends("layouts.app")
@section("title")
Edit the role
@endsection
@section("content")

<form action="{{url('role/update')}}" method="post">
    @csrf
    <div class="role-form">
    <div class="" style="width:100%;">
    <label for="">Role</label><br>
    <div class=" input-div">
        <select  name="initiated_for"  id="">
            <option value="" selected>Select one</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->username}}</option>
            @endforeach
        </select> 

   </div>
    </div>
           
            
            
           </div>
            <div class="button">
                <input type="submit" name="" value="Edit" class="colored-btn">
    </div>
</form>
     

@endsection