<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="../../favicon.ico">

    <title>Projet Voiture SI et BD</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset ('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Personal CSS -->
    <link href="{{ asset ('Css/styles.css') }}" rel="stylesheet">

    <link href="{{ asset( 'font-awesome/css/font-awesome.min.css' )}}" rel="stylesheet" type="text/css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="{{ asset('bootstrap/js/ie8-responsive-file-warning.js')}}"></script><![endif]-->

    <script src="{{ asset('bootstrap/js/ie-emulation-modes-warning.js')}}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="{{ asset ('bootstrap/css/carousel.css') }}" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->
<body>
<div class="wrapper">
    <!-- Header -->
    <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-toggle"></span>
                </button>
                <a class="navbar-brand" href="#">
                    @if(! Auth::check())
                        Crazy Car
                    @else
                        {{Auth::user()->pseudo}}
                    @endif
                </a>
            </div>
            <div class="navbar-collapse collapse">
                @if(Auth::check())
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i>  {{Auth::user()->pseudo}} <span class="caret"></span></a>
                            <ul id="g-account-menu" class="dropdown-menu" role="menu">
                                <li><a href="#">My Profile</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route( 'logout' ) }}"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
                    </ul>
                @else
                    {{ Form::open(['route'=> 'login', 'method' => 'POST', 'role' => 'form', 'class' => 'navbar-form navbar-right']) }}
                    @if(Session::has('login_error'))
                        <span class="label label-danger">Identifiant ou mot de passe incorrect</span>
                    @endif
                    <div class="form-group ">
                        {{ Form::text('user', null, ['class' => 'form-control' , 'placeholder' =>'Username']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password', ['class' => 'form-control' , 'placeholder' =>'Password']) }}
                    </div>
                    <div class="checkbox">
                        <label class="remember-me nav-txt" for="remember">
                            {{ Form::checkbox('remember') }} Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success btn-responsive">Connexion</button>
                    <!--<a href="@{{ route ('sign_up') }}" class="btn btn-primary btn-responsive" role="button">S'inscrire</a>-->

                    {{Form::close()}}
                @endif
            </div>
        </div><!-- /container -->
    </div>
    <!-- /Header -->

    @yield('content')

</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="{{{ asset ('Js/jquery-1.11.1.js')}}}"></script> -->
<script src="{{ asset('Js/jquery-2.1.3.js')}}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('Js/jquery.bpopup.min.js')}}"></script>
<script src="{{ asset('Js/jquery.easing.1.3.js')}}"></script>
<script src="{{ asset('Js/layout.js')}}"></script>
<script>
    var pathImgWait = "{{  asset('Img/wait.gif') }}";
</script>
{{ HTML::script('bootstrap-sweetalert/js/sweet-alert.js') }}
{{ HTML::style('bootstrap-sweetalert/css/sweet-alert.css') }}
<script>
    $('#flash-overlay-modal').modal();
</script>
@yield('scripts')

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('bootstrap/js/ie10-viewport-bug-workaround.js')}}"></script>
</body>
</html>