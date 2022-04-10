
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
  <form action="{{url('auth/check')}}" method="post">
    @csrf
    <img class="mb-4" src="{{asset('images/mx-logo.jpg')}}" alt="" width="200" height="90">

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="" name="username">
      <label for="floatingInput">Username</label>
    </div>
    @error('username')
      <small class="text-danger">{{$message}}</small>
    @enderror

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword"  name="password">
      <label for="floatingPassword">Password</label>
    </div>
    @error('password')
      <small class="text-danger">{{$message}}</small>
    @enderror

    <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
  </form>
  @if(session()->has("msg")) 
      {{session()->get("msg")}}
    @endif

  <p class="mt-5 mb-3 text-muted">If you are not registered, <a href="{{url('auth/registration')}}">register here</a>.</p>

</main>


    
  </body>
</html>

