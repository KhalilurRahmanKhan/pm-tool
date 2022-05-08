@extends("layouts.app")
@section("title")
Create a task
@endsection
@section("content")
<form action="{{url('tasks')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="role-form">
    <div class="" style="width:100%;">
        <label for="">Task Name</label><br>
        <input autofocus class="input-div-full" name="name" id="" cols="30" rows="5" value="{{old('name')}}"></input><br>
        @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
   
    
</div>
<div class="role-form">
    <div class="input-div">
        <label for="">Start date</label><br>
        <input type="date"  name="start_date" value="{{old('start_date')}}" ><br>
        @error('start_date')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
    <div class="input-div">
        <label for="">End date</label><br>
        <input type="date"  name="end_date" value="{{old('end_date')}}" ><br>
        @error('end_date')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
    
</div>
<div class="role-form">
    <div class="" style="width:100%;">
        <label for="">Task details</label><br>
        <textarea class="input-div-full"  name="details"   id="" cols="30" rows="5">{{old('details')}}</textarea><br>
        @error('details')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
   
    
</div>

<div class="role-form">
<div class="input-div">
        <label for="">Project owner</label><br>
        <select name="user_id" id="">
        <option value="" selected>Select one</option>
            @foreach(App\Models\User::all() as $user)
           
            <option value="{{$user->id}}">{{$user->username}}</option>
            @endforeach
           
        </select> <br>
        @error('project_owner')
                <small class="text-danger">{{$message}}</small>
            @enderror
   </div>
    <div class="input-div">
        <label for="">Attachment</label><br>
        <input type="file"  name="attachment" ><br>
     
    </div>  
</div>
<input type="hidden" name="project_id" value="{{$project_id}}">


    <div class="button">
        <input type="reset" value="Cancel">
        <input type="submit" class="colored-btn">
    </div>
    </form>
@endsection