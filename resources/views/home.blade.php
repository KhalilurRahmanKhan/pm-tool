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
    <div class="container-fluid" style="background-color:;">
    <img class="" src="{{asset('images/mx-logo.jpg')}}" alt="" width="150" height="50">
    <div style="background-color:black;">
    <h3 class="text-center mt-5">Welcome to Mx Project Management Tool</h3>

        <div class="text-center">

            <a href="{{url('auth/login')}}" class="btn btn-primary">Login</a>
            <a href="{{url('auth/registration')}}" class="btn btn-info">Register</a>
    </div>
    </div>
      
    </div>
</body>
</html>