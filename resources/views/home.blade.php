<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pm-tool</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <img class="mb-4" src="{{asset('images/mx-logo.jpg')}}" alt="" width="200" height="90">
        <h1 class="text-center mt-5">Welcome to Mx Project</h1>

        <div class="text-center mt-4">
      
            <a href="{{url('auth/login')}}" class="btn btn-primary">Login</a>
            <a href="{{url('auth/registration')}}" class="btn btn-info">Register</a>
        </div>
    </div>
</body>
</html>