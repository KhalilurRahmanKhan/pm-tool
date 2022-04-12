
@extends("layouts.app")
@section("content")
<form action="{{url('role/store')}}" method="post">
    @csrf
<div class="role-form">
           <div class="input-div">
                <label for="">Role</label><br>
                <input type="text" name="role" value="{{old('role')}}" placeholder="Type the role"><br>
                 @error('role')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
           
            <div class="input-div">
                <label for="">Comments</label><br>
                <input type="text" name="comments" value="{{old('comments')}}" placeholder="Write the comments"><br>
                     @error('comments')
                <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
            
           </div>
            <div class="button">
                <input type="reset" value="Cancel">
                <input type="submit" name="" value="Submit" class="colored-btn">
    </div>
</form>
 
@endsection
  