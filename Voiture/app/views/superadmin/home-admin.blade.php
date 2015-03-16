@extends('layout')
@section('content')
    <!-- Main -->
    <div class="container">
        <div class="row">
            <!-- left panel -->
            <div class="col-md-3">
                <!-- Left column -->
                <a href="#">
                    <strong>
                        <i class="glyphicon glyphicon-wrench"></i>
                        Tools
                    </strong>
                </a>

                <hr>

                <ul class="list-unstyled">
                    <li class="nav-header">
                        <a href="#" data-toggle="collapse" data-target="#userMenu">
                            <h5>Settings <i class="glyphicon glyphicon-chevron-down"></i></h5>
                        </a>
                        <ul class="list-unstyled collapse in" id="userMenu">
                            <li class="active"> <a href="{{ route('home-admin') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                            <li><a href="{{ route('list_users') }}"><i class="glyphicon glyphicon-user"></i> Users List</a></li>
                            <li><a href="{{ route('voitures-list') }}"><i class="fa fa-lg fa-spinner fa-car"></i></i> Voitures</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Options</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-comment"></i> Shoutbox</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-flag"></i> Transactions</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-exclamation-sign"></i> Rules</a></li>
                            <li><a href="{{ route( 'logout' ) }}"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
                        </ul>
                    </li>

                    <li class="nav-header">
                        <a href="#" data-toggle="collapse" data-target="#menu2">
                            <h5>Reports <i class="glyphicon glyphicon-chevron-right"></i></h5>
                        </a>
                        <ul class="list-unstyled collapse" id="menu2">
                            <li><a href="#">Information &amp; Stats</a>
                            </li>
                            <li><a href="#">Views</a>
                            </li>
                            <li><a href="#">Requests</a>
                            </li>
                            <li><a href="#">Timetable</a>
                            </li>
                            <li><a href="#">Alerts</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">
                        <a href="#" data-toggle="collapse" data-target="#menu3">
                            <h5>Social Media <i class="glyphicon glyphicon-chevron-right"></i></h5>
                        </a>
                        <ul class="list-unstyled collapse" id="menu3">
                            <li><a href="#"><i class="glyphicon glyphicon-circle"></i> Facebook</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-circle"></i> Twitter</a></li>
                        </ul>
                    </li>
                </ul>

                <hr>

                <a href="#">
                    <strong>
                        <i class="glyphicon glyphicon-link"></i>
                        Resources
                    </strong>
                </a>

                <hr>

                <ul class="nav nav-pills nav-stacked">
                    <li class="nav-header"></li>
                    <li><a href="#"><i class="glyphicon glyphicon-list"></i> Layouts &amp; Templates</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Toolbox</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-link"></i> Widgets</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-book"></i> Pages</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-star"></i> Social Media</a></li>
                </ul>

                <hr>
                <ul class="nav nav-stacked">
                    <li class="active">
                        <a href="http://bootply.com" title="The Bootstrap Playground" target="ext">
                            Playground
                        </a>
                    </li>
                    <li><a href="/tagged/bootstrap-3">Bootstrap 3</a></li>
                    <li><a href="/61518" title="Bootstrap 3 Panel">Panels</a></li>
                </ul>

                <hr>
            </div><!-- /col-3 -->
            <!-- /left panel -->

            <div class="col-md-9" >

                <!-- column 2 -->
                <!-- top-right small menu -->
                <ul class="list-inline pull-right">
                    <!-- settings ico -->
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-cog"></i></a>
                    </li>
                    <!-- / settings ico -->

                    <!-- messages -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-comment"></i>
                            <span class="count">3</span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#">
                                    1. Is there a way..
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    2. Hello, admin. I would..
                                </a>
                            </li>
                            <li>
                                <a href="#"><strong>All messages</strong></a>
                            </li>
                        </ul>
                    </li>
                    <!--/messages-->

                    <!-- users ico -->
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-user"></i></a>
                    </li>
                    <!-- / users ico -->

                    <!-- add widget ico -->
                    <li>
                        <a title="Add Widget" data-toggle="modal" href="#addWidgetModal">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            Add Widget
                        </a>
                    </li>
                    <!-- / add widget ico -->
                </ul>
                <!--  /top-right small menu -->

                <a class="welcomeUser" href="{{ route('home-admin') }}">
                    <strong><i class="glyphicon glyphicon-dashboard"></i> Bienvenue Super Admin </strong>
                </a>

                <hr>

                <div class="row">
                    <!-- center left-->
                    <div id="cont">@yield('contentmod')</div>
                    <div id="detailUser"></div>
                </div><!--/row-->
                @yield('info-panel2')
            </div><!--/col-span-9-->
        </div>

    </div>
    <!-- /Main -->
@stop