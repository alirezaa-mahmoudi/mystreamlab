<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title', 'Call Center Performance')</title>





    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    @yield('header')
</head>
<body>



<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar" class="active">
        <div class="sidebar-header">
            <img class="img-responsive img-thumbnail" src="{{asset('img/logo.png')}}">
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#UserSubmenu" data-toggle="collapse" aria-expanded="false">User Management</a>
                <ul class="collapse list-unstyled" id="UserSubmenu">
                    <li><a>Users</a></li>
                </ul>
            </li>



        </ul>


    </nav>

    <!-- Page Content Holder -->
    <div id="content" class="container-fluid">

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <ul class="nav navbar-nav navbar-right">
                        <li><a href="">Welcome</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
                {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li><a href="#">Page</a></li>--}}
                {{--<li><a href="#">Page</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
            </div>
        </nav>


        {{--</div></div></div>--}}
        <div class="container-fluid">
            {{--<h2>@yield('Page Title', 'title')</h2>--}}
            @yield('content')


        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
