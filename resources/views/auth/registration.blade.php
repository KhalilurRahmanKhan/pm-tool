
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title></title>

    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
  </head>

  
  <body class="text-center">
    
<main class="form-signin">
  <form action="{{url('auth/store')}}" method="post">
    @csrf
    <img class="mb-4" src="{{asset('images/mx-logo.jpg')}}" alt="" width="200" height="90">

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
      <label for="floatingInput">username</label>
    </div>
    @error('username')
        <small class="text-danger">{{$message}}</small>
    @enderror
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
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
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
    </div>
    @if(session()->has("msg")) 
      <small class="text-danger"> {{session()->get("msg")}}</small>
    @endif

    <p class="mt-5 mb-3 text-muted">If you are already registered, <a href="{{url('/')}}">login here</a>.</p>
  </form>
</main><br>


    
  </body>
</html>


