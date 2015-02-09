<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Projet Voiture SI et BD</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset ('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Personal CSS -->
    <link href="{{ asset ('Css/styles.css') }}" rel="stylesheet">

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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand hidden-sm" href="{{ route('home') }}">Crazy car</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                @if(Auth::check())
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <a class="dropdown-toggle" data-toggle='dropdown' href="#">
                        <span class="icon icon-wh i-profile">
                            @{{ Auth::user()->full_name }} <span class="caret"></span>
                        </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href=" @{{ route ('profile') }}">Editar perfil</a></li>
                                <li><a href=" @{{ route ( 'account' ) }}">Editar usuario</a></li>
                                <li><a href=" @{{ route( 'search' ) }}">Buscar</a></li>
                                <li><a href=" @{{ route( 'messagerieSend' ) }}">Enviar mensaje</a></li>
                                <li><a href=" @{{ route( 'logout' ) }}">Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a class="navbar-brand pull-right der_con" href="#">Ultima conexion: @{{ date("d F Y",strtotime(Auth::user()->updated_at)) }} at {{ date("g:ha",strtotime(Auth::user()->updated_at)) }}</a>
                    <a class="navbar-brand pull-right der_con" href="#">Conectado desde @{{ $_SERVER['REMOTE_ADDR'] }}</a>
                @else
                    {{ Form::open(['route'=> 'login', 'method' => 'POST', 'role' => 'form', 'class' => 'navbar-form navbar-right']) }}
                    @if(Session::has('login_error'))
                        <span class="label label-danger">Identifiant ou mot de passe incorrect</span>
                    @endif
                    <div class="form-group ">
                        {{ Form::email('email', null, ['class' => 'form-control' , 'placeholder' =>'Email']) }}
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
                    <a href="{{ route ('sign_up') }}" class="btn btn-primary btn-responsive" role="button">S'inscrire</a>

                    {{Form::close()}}
                @endif
            </div><!--/.navbar-collapse -->
        </div>
    </nav>


    @yield('content')

    <div class="push"><!--//--></div>
</div>
<footer>
    <div class="container">
        <p>By Jog@L 2015</p>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
@yield('scripts')

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('bootstrap/js/ie10-viewport-bug-workaround.js')}}"></script>
</body>
</html>