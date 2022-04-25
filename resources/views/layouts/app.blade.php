<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Project Management Tools</title>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b595dd4b2c.js" crossorigin="anonymous"></script>
    
 
    

   
</head>
<body>
@include('sweetalert::alert')
    <div class="main">
        <div class="left">
            <div class="brand-name">
                <a href="{{url('dashboard')}}" style="text-decoration:none; color:white;"><p style="text-decoration:none;">Machine Xtreme</p></a>
            </div>
           @if(auth()?->user()?->role_id == 1)
            <div class="menu">
                <!-- <a href="{{url('projects')}}"><p>Projects</p></a> -->
                <a  href="{{url('projects')}}"><p class="item"><i class="fa-solid fa-bars-progress"></i>Projects</p></a>  
                <!-- <a href="{{url('projects/create')}}"><p class="item"><i class="fa-solid fa-table-columns"></i>Create project</p></a>   -->
            </div>
         
            <div class="menu">
                <!-- <a href="{{url('role')}}"><p>Roles</p></a> -->
                <a  href="{{url('role')}}"><p class="item"><i class="fa-solid fa-network-wired"></i>Roles</p></a>  


                <!-- <a href="{{url('role/create')}}"><p class="item"><i class="fa-solid fa-table-columns"></i>Create role</p></a>    -->
            </div>
            <div class="menu">
                <!-- <a href="{{url('user')}}"><p>Users</p></a> -->
                <a  href="{{url('user')}}"><p class="item"><i class="fa-solid fa-users"></i>Users</p></a>  


                <!-- <a href="{{url('role/create')}}"><p class="item"><i class="fa-solid fa-table-columns"></i>Create role</p></a>    -->
            </div>
            @endif
          
        </div>
        <div class="right">
            <div class="nav">
                <p> @yield("title")</p>
                <div class="nav-items">
                    <div class="search">
                        <input type="text">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="notification">
                        <i class="fa-solid fa-bell"></i>
                    </div>
                    <div class="profile" id="profile">
                        <p>{{auth()?->user()?->username}}</p>
                    </div>
                </div>
            </div>
            <div id="profile-menu">
               <h4>{{auth()->user()?->username}}</h4>
               
                <a class="mb-2" href="{{url('auth/change/password')}}">Change password</a>
                
                <form action="{{url('auth/logout')}}" method="post">
                    @csrf
                <button type="submit" class="btn btn-sm btn-primary" style="margin-top :15px;">Logout</button>
                </form>
            </div>


            @yield("content")
        </div>

       

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('js/custom.js')}}"></script>

    <script>
        var perfEntries = performance.getEntriesByType("navigation");

        if (perfEntries[0].type === "back_forward") {
            {{Session()->pull('success')}}
            location.reload(true);
        }
    </script>

   

</body>
</html>