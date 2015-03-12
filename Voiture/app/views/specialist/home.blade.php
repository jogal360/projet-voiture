@extends('layout')
@section('content')
    @if(Auth::check())
        <!-- Navbar tools -->
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand visible-xs" href="#"><i class="fa fa-home fa-fw"></i>Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse cent" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav nav-center">
                    <li class="dropdown">
                        <a href="@{{ route( 'search' ) }}" ><i class="glyphicon glyphicon-search"></i> Search</a>
                    </li>


                    <li class="dropdown">
                        <a href="@{{ route('article') }}" ><i class="glyphicon glyphicon-list-alt"></i> Article</a>

                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    @endif
    <div class="cent"><h1>You are a Specialist!!!!</h1>

    </div>
@stop