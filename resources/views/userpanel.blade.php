
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Sidebar template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/master.css')}}">


</head>

<body>
<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="#">Twitch Event Viewer</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src={{session('profile_image_url')}}
                         alt="User picture">
                </div>
                <div class="user-info">
          <span class="user-name">
            {{session('display_name')}}
          </span>
                    <span class="user-role">{{session('description')}}</span>
                    <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
                </div>
            </div>
            <!-- sidebar-header  -->

            <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>Panel</span>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-info"></i>
                            <span>Menu</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Streamer Activities
                                        <span class="badge badge-pill badge-danger">10</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Trending Events</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="#">
                <i class="fa fa-power-off"></i>
            </a>
        </div>
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            <h2>Pro Sidebar</h2>
            <hr>
            <div class="row">

                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <div class="card rounded-0 p-0 shadow-sm">
                          <div class="card-header">
                              Add new Streamer
                          </div>
                            <div class="card-body text-center">
                                <h6 class="card-title" >Search Streamer </h6>
                                <input type="text" class="form-control" name="streamer" id="streamer-input">
                                <br/>
                                <button id="submitnewstraeamer" class="btn btn-primary">Submit</button>
                                <img id="wait" src="{{asset('image/loading.gif')}}" style="display: none;">
                                <div class="alert alert-danger"  role="alert" id="error-submit" style="display: none;"></div>
                            </div>

                    </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="card rounded-0 p-0 shadow-sm" id="panel-streamer" style="display: none;">
                            <div class="card-header">
                                Verify Streamer
                            </div>
                            <div class="card-body text-center">
                                <h8 class="card-title" id="streamer-name"></h8>
                                <div class="user-pic">
                                    <img class="img-responsive img-rounded" id="streamer-pic" src="{{asset('image/general-pic.png')}}" alt="User picture" style="height: 56px;">
                                </div>
                              <div class="form-group">
                                 <form action="{{ action('SubscriptionController@store') }}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input name="requester" id="requester" type="text" class="form-control" placeholder="requester" hidden>
                                <input name="streamer" id="streamer" type="text" class="form-control" placeholder="streamer" hidden>

                                     <button type="submit" class="btn btn-success btn-sm" style="margin: 2px">Verify</button>
                                </form>

                            </div>

                        </div>


                    </div>
                    </div>


            <h5>More templates</h5>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="card rounded-0 p-0 shadow-sm">
                        <img src="https://user-images.githubusercontent.com/25878302/53659076-e2204680-3c5a-11e9-8c00-0c10bcd945e6.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">
                        <div class="card-body text-center">
                            <h6 class="card-title">Angular Pro Sidebar</h6>
                            <a href="https://github.com/azouaoui-med/angular-pro-sidebar" target="_blank" class="btn btn-primary btn-sm">Github</a>
                            <a href="https://azouaoui-med.github.io/angular-pro-sidebar/demo/" target="_blank" class="btn btn-success btn-sm">Preview</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="card rounded-0 p-0 shadow-sm">
                        <img src="https://user-images.githubusercontent.com/25878302/53659497-016ba380-3c5c-11e9-8dfd-4901ddaf090b.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">
                        <div class="card-body text-center">
                            <h6 class="card-title">Angular Dashboard</h6>
                            <a href="https://github.com/azouaoui-med/lightning-admin-angular" target="_blank" class="btn btn-primary btn-sm">Github</a>
                            <a href="https://azouaoui-med.github.io/lightning-admin-angular/demo/" target="_blank" class="btn btn-success btn-sm">Preview</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>

    </main>
    <!-- page-content" -->
</div>
<!-- page-wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script>
    jQuery(function ($) {

        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
                $(this)
                    .parent()
                    .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
                $(this)
                    .parent()
                    .addClass("active");
            }

        });

        $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
        });




    });
    $("#submitnewstraeamer").click(function () {

        var token  = "{{session('token')}}";


        $(document).ajaxStart(function()
        {
            $("#wait").css("display","inline");
        });
        $(document).ajaxComplete(function()
        {
            $("#wait").css("display","none");
        });

        $.ajax({
            url:'https://api.twitch.tv/helix/users?login='+$("#streamer-input").val(),
            headers: {
                Authorization: "Bearer" + " " + token
            },
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.data.length===0)
                {
                    $("#error-submit").html("Not Found");
                    $("#error-submit").css("display", "block");
                    setTimeout(function (){
                        $("#error-submit").css("display", "none");
                    }, 3000);
                }
                else
                {
                    $("#streamer-name").html(data.data[0].display_name);
                    $("#streamer-pic").attr('src', data.data[0].profile_image_url);
                    $("#requester").val({{session('id')}});
                    $("#streamer").val(data.data[0].id);
                    $("#panel-streamer").slideDown("slow");

                    console.log(data.data[0]);
                }

            },
            error: function(error)
            {
                $("#error-submit").html("Not Found");
                $("#error-submit").css("display", "block");
                setTimeout(function (){
                    $("#error-submit").css("display", "none");
                }, 3000);


            }


        })
    });

</script>
</body>

</html>
