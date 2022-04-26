@extends("layouts.app")
@section("title")
Create a task
@endsection
@section("content")
<form action="{{url('projects')}}" method="post" enctype="multipart/form-data">
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
        <input type="date"  name="code" value="{{old('code')}}" ><br>
        @error('code')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
    <div class="input-div">
        <label for="">End date</label><br>
        <input type="date"  name="initiated_for" value="{{old('initiated_for')}}" ><br>
        @error('initiated_for')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
    
</div>
<div class="role-form">
    <div class="" style="width:100%;">
        <label for="">Task details</label><br>
        <textarea class="input-div-full"  name="description" value="{{old('description')}}"  id="" cols="30" rows="5"></textarea><br>
        @error('description')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>
   
    
</div>

<div class="role-form">
<div class="input-div">
        <label for="">Project owner</label><br>
        <select name="project_owner" id="">
            <option value="" selected>Select one</option>
          
           
        </select> <br>
        @error('project_owner')
                <small class="text-danger">{{$message}}</small>
            @enderror
   </div>
    <div class="input-div">
        <label for="">Attachment</label><br>
        <input type="file"  name="remarks" value="{{old('remarks')}}" ><br>
        @error('remarks')
                <small class="text-danger">{{$message}}</small>
            @enderror
    </div>  
</div>
<input type="hidden" value="{{$project_id}}">


    <div class="button">
        <input type="reset" value="Cancel">
        <input type="submit" class="colored-btn">
    </div>
    </form>
@endsection