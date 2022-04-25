@extends("layouts.app")
@section("title")
Create a project
@endsection
@section("content")
<form action="{{url('projects')}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="role-form">
    <div class="" style="width:100%;">
        <label for="">Project Name</label><br>
        <input autofocus class="input-div-full" name="name" id="" cols="30" rows="5" value="{{old('name')}}"></input><br>
        @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
   
    
</div>
<div class="role-form">
    <div class="input-div">
        <label for="">Code</label><br>
        <input type="text"  name="code" value="{{old('code')}}" ><br>
        @error('code')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
    <div class="input-div">
        <label for="">Initiated for</label><br>
        <input type="text"  name="initiated_for" value="{{old('initiated_for')}}" ><br>
        @error('initiated_for')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
    
</div>
<div class="role-form">
    <div class="" style="width:100%;">
        <label for="">Project description</label><br>
        <textarea class="input-div-full"  name="description" value="{{old('description')}}"  id="" cols="30" rows="5"></textarea><br>
        @error('description')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
   
    
</div>
<div class="role-form-3">
    <div class="input-div">
        <label for="">Start date</label><br>
        <input type="date"  name="start_date"  id="start_date" value="{{old('start_date')}}"><br>
        @error('start_date')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
    <div class="input-div">
        <label for="">End date</label><br>
        <input type="date"  name="end_date" id="end_date" value="{{old('end_date')}}"><br>
        @error('end_date')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
    <div class="input-div">
        <label for="">Duration</label><br>
        <input type="text"  name="duration"  id="duration" value="{{old('duration')}}"><br>
        @error('duration')
                <small class="text-danger">{{$message}}</small>
            @enderror
   </div>
    
</div>
<div class="role-form">
<div class="input-div">
        <label for="">Project owner</label><br>
        <select name="project_owner" id="">
            <option value="" selected>Select one</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->username}}</option>
            @endforeach
        </select> <br>
        @error('project_owner')
                <small class="text-danger">{{$message}}</small>
            @enderror
   </div>
    <div class="input-div">
        <label for="">remarks</label><br>
        <input type="text"  name="remarks" value="{{old('remarks')}}" ><br>
        @error('remarks')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>  
</div>

<div class="role-form">
    <div class="" style="width:100%;">
        <label for="attachment">Attachment</label><br>
        <input class="input-div-full attachment" type="file"  name="attachment"  ></input>
    </div>
   
    
</div>

    <div class="button">
        <input type="reset" value="Cancel">
        <input type="submit" class="colored-btn">
    </div>
    </form>
@endsection