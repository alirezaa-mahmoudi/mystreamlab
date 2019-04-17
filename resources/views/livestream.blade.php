
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>StreamerEventViewer</title>
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
                                    <a href="{{url('/home')}}"> Page 1 - Home
                                        <span class="badge badge-pill badge-danger"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('/livestream')}}">Page 2 - Live Stream</a>
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
            <h2>Live Stream |  {{$channel->name}}</h2>
            <hr>
            <div class="row">

                    <div style="display: inline">

                                <iframe
                                    src="https://player.twitch.tv/?channel={{$channel->name}}"
                                    height="480"
                                    width="640"
                                    frameborder="0"
                                    scrolling="no"
                                    allowfullscreen="true">
                                </iframe>


                    </div>
                    <div style="display: inline">
                        <iframe frameborder="0"
                                scrolling="no"
                                id="chat_embed"
                                src="https://www.twitch.tv/embed/{{$channel->name}}/chat"
                                height="480"
                                width="350">
                        </iframe>
                    </div>

        </div>

            <br/>
            <div class="row">
                <h3>Web Socket PubSub</h3>
            </div>
            <div class="row">
                        <div class="col-md-6">
                            Sent Messages
                            <div class="socket">
                                <textarea class="ws-output" rows="20" style="font-family:Courier;width:100%"></textarea>
                                <form id="topic-form" class="text-left form-inline" >
                                    <label id="topic-label" for="topic-text"></label>
                                    <input type="text" class="form-control" id="topic-text" placeholder="Topic">
                                    <button type="submit" class="btn btn-primary">Listen</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            Received Messages:
                            <textarea class="ws-output-recieve" rows="20" style="font-family:Courier;width:100%"></textarea>
                        </div>

                    </div>
            <br/>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card rounded-0 p-0 shadow-sm">
                        <div class="card-header">
                            10 recent Events from your favourite streamers
                        </div>
                        <div class="card-body text-center">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Streamer</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Event</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$event->sub_name}}</td>
                                        <td>{{$event->created_at}}</td>
                                        <td>{{$event->event_des}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

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
<script type="javascript" src="{{asset('js/scripts.js')}}">
    console.log('ali');

</script>
<script>
    jQuery(function ($) {

            $(".sidebar-dropdown > a").click(function () {
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


            $("#close-sidebar").click(function () {
                $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function () {
                $(".page-wrapper").addClass("toggled");
            });

            //Get Online Streams



            // Websocket
            var clientId = 'nbjcw8wo7so2vfqwgq7mbntkezafs8';
            var token = "{{session('token')}}";
            var userId="{{session('id')}}";
            var whispers = "whispers." + userId;



            function nonce(length) {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                for (var i = 0; i < length; i++) {
                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                }
                return text;
            }

            // Heartbeat
            function heartbeat() {
                message = {
                    type: 'PING'
                };
                $('.ws-output').append('SENT: ' + JSON.stringify(message) + '\n');
                ws.send(JSON.stringify(message));
            }

            function listen(topic) {
                message = {
                    type: 'LISTEN',
                    nonce: nonce(15),
                    data: {
                        topics: [topic],
                        auth_token: token
                    }
                };
                $('.ws-output').append('SENT: ' + JSON.stringify(message) + '\n');
                ws.send(JSON.stringify(message));
            }


            //Connect Websocket
            function connect() {
                var heartbeatInterval = 1000 * 60; //ms between PING's
                var reconnectInterval = 1000 * 3; //ms to wait before reconnect
                var heartbeatHandle;

                ws = new WebSocket('wss://pubsub-edge.twitch.tv');

                ws.onopen = function (event) {
                    $('.ws-output').append('INFO: Socket Opened\n');
                    heartbeat();
                    heartbeatHandle = setInterval(heartbeat, heartbeatInterval);
                };

                ws.onerror = function (error) {
                    $('.ws-output').append('ERR:  ' + JSON.stringify(error) + '\n');
                };

                ws.onmessage = function (event) {
                    message = JSON.parse(event.data);
                    $('.ws-output-recieve').append('RECV: ' + JSON.stringify(message) + '\n');
                    if (message.type == 'RECONNECT') {
                        $('.ws-output').append('INFO: Reconnecting...\n');
                        setTimeout(connect, reconnectInterval);
                    }
                };
                ws.onclose = function () {
                    $('.ws-output').append('INFO: Socket Closed\n');
                    clearInterval(heartbeatHandle);
                    $('.ws-output').append('INFO: Reconnecting...\n');
                    setTimeout(connect, reconnectInterval);
                };
            }


            var channel= {
                id: "{{$channel->_id}}",
                name: "{{$channel->name}}",
                bits: function(){
                    return "channel-bits-events-v2." + this.id;
                },
                commerce: function ()
                {
                    return 'channel-commerce-events-v1.' + this.id
                }


            };

            connect();

            $.ajax(
                {
                    url: "https://api.twitch.tv/kraken/user",
                    method: "GET",
                    headers: {
                        "Client-ID": clientId,
                        "Authorization": "OAuth " + token
                    }
                })
                .done(function (user) {
                    $('#topic-label').text("Enter a topic to listen to. For example, to listen to whispers enter topic 'whispers." + user._id + "'");
                });

            $('#topic-form').submit(function() {
                listen($('#topic-text').val());
                event.preventDefault();

            });

        })

</script>


</body>

</html>
