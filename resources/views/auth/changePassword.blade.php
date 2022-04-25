

@extends("layouts.app")
@section("title")
Change password
@endsection
@section("content")
    
<div class="row">
  <div class="col-md-4 mx-auto mt-5">
  <form action="{{url('auth/change/password')}}" method="post">
    @csrf
   

    <div class="form-floating">
      <input autofocus type="password" class="form-control" id="floatingInput" placeholder="Old password" name="old_password">
      <label for="floatingInput">Old Password</label>
    </div>
    @error('old_password')
        <small class="text-danger">{{$message}}</small>
    @enderror
    @if(session()->has("errors")) 
      <small class="text-danger text-center"> {{session('errors')->first('message');}}</small>
    @endif
    
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">New Password</label>
    </div>
    @error('password')
      <small class="text-danger">{{$message}}</small>
    @enderror
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="password_confirmation">
      <label for="floatingPassword">Confirm Password</label>
    </div>
    @error('password_confirmation')
      <small class="text-danger">{{$message}}</small>
    @enderror

    <div class="">
    <button class="w-100 btn btn-lg btn-primary" type="submit">Change</button>
    </div>
    @if(session()->has("msg")) 
      <small class="text-danger"> {{session()->get("msg")}}</small>
    @endif
   

  
  </form>
  </div>
</div>

  
  

@endsection



