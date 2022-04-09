<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management Tools</title>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b595dd4b2c.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="main">
        <div class="left">
            <div class="brand-name">
                <p>Machine Xtreme</p>
            </div>
            <div class="menu">
                <p>Menu Board</p>
                
                    <p class="item"><i class="fa-solid fa-table-columns"></i>Dashboard</p>
                    <p class="item"><i class="fa-solid fa-table-columns"></i>My Task</p>
                
            </div>
            <div class="menu">
                <a href="{{url('role')}}"><p>Role</p></a>
                <a href="{{url('role/create')}}"><p class="item"><i class="fa-solid fa-table-columns"></i>Create</p></a>

               
            </div>
            <div class="menu">
                <p>Menu Board</p>
               
                <p class="item"><i class="fa-solid fa-table-columns"></i>My Tahpiohpsk</p>
                <p class="item"><i class="fa-solid fa-table-columns"></i>My Task</p>
             
            </div>
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
                    <div class="profile">
                        <img src="https://picsum.photos/200" alt="">
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                </div>
            </div>
            @yield("content")
        </div>

      

    </div>
</body>
</html>