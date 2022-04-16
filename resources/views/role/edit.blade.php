
@extends("layouts.app")
@section("title")
Edit the role
@endsection
@section("content")

<form action="{{url('role/update',[$role->id])}}" method="post">
    @csrf
<div class="role-form">
           <div class="input-div">
                <label for="">Role</label><br>
                <input type="text" name="role" value="{{$role->role}}" placeholder="Type the role"><br>
                 @error('role')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
           
            <div class="input-div">
                <label for="">Comments</label><br>
                <input type="text" name="comments" value="{{$role->comments}}" placeholder="Write the comments"><br>
                     @error('comments')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
            
           </div>
            <div class="button">
                <input type="submit" name="" value="Edit" class="colored-btn">
    </div>
</form>
     

@endsection