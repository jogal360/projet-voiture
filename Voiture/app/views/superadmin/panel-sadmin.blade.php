@extends('superadmin/home-admin')
@section('contentmod')
    <div class="col-md-6">
        <!-- div box total users -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><h2>{{ $numberUsers  }}</h2></div>
                        <div>
                            @if( $numberUsers === 1)
                                Utilisateur
                            @elseif( $numberUsers > 1)
                                Utilisateurs
                            @else
                                Aucun utilisateur enregistré
                            @endif
                            dans la comunauté!
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('list_users') }}" id="viewDetailsUsers">
                <div class="panel-footer">
                    <span class="pull-left"><b>View Details</b></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
        <!-- / div box total users -->
        <hr>

        <div class="btn-group btn-group-justified">
            <a href="#" class="btn btn-primary col-sm-3">
                <i class="glyphicon glyphicon-plus"></i><br>
                Service
            </a>
            <a href="#" class="btn btn-primary col-sm-3">
                <i class="glyphicon glyphicon-cloud"></i><br>
                Cloud
            </a>
            <a href="#" class="btn btn-primary col-sm-3">
                <i class="glyphicon glyphicon-cog"></i><br>
                Tools
            </a>
            <a href="#" class="btn btn-primary col-sm-3">
                <i class="glyphicon glyphicon-question-sign"></i><br>
                Help
            </a>
        </div>

        <hr>

        <div class="panel panel-default">
            <div class="panel-heading"><h4>Reports</h4></div>
            <div class="panel-body">

                <small>Success</small>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                        <span class="sr-only">72% Complete</span>
                    </div>
                </div>
                <small>Info</small>
                <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <span class="sr-only">20% Complete</span>
                    </div>
                </div>
                <small>Warning</small>
                <div class="progress">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                        <span class="sr-only">60% Complete (warning)</span>
                    </div>
                </div>
                <small>Danger</small>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                        <span class="sr-only">80% Complete</span>
                    </div>
                </div>

            </div><!--/panel-body-->
        </div><!--/panel-->


        <hr>

        <div class="panel panel-default">
            <div class="panel-heading"><h4>New Requests</h4></div>
            <div class="panel-body">
                <div class="list-group">
                    <a href="#" class="list-group-item active">Hosting virtual mailbox serv..</a>
                    <a href="#" class="list-group-item">Dedicated server doesn't..</a>
                    <a href="#" class="list-group-item">RHEL 6 install on new..</a>
                </div>
            </div>
        </div>

    </div><!--/col-->
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-money fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><h2>{{ $numberUsers  }}</h2></div>
                        <div>
                            @if( $numberUsers === 1)
                                Utilisateur
                            @elseif( $numberUsers > 1)
                                Utilisateurs
                            @else
                                Aucun utilisateur enregistré
                            @endif
                            dans la comunauté!
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('list_users') }}" id="viewDetailsUsers">
                <div class="panel-footer">
                    <span class="pull-left"><b>View Details</b></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>

        <table class="table table-striped">
            <thead>
            <tr><th>Visits</th><th>ROI</th><th>Source</th></tr>
            </thead>
            <tbody>
            <tr><td>45</td><td>2.45%</td><td>Direct</td></tr>
            <tr><td>289</td><td>56.2%</td><td>Referral</td></tr>
            <tr><td>98</td><td>25%</td><td>Type</td></tr>
            <tr><td>..</td><td>..</td><td>..</td></tr>
            <tr><td>..</td><td>..</td><td>..</td></tr>
            </tbody>
        </table>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="glyphicon glyphicon-wrench pull-right"></i>
                    <h4>Post Request</h4>
                </div>
            </div>
            <div class="panel-body">

                <form class="form form-vertical">

                    <div class="control-group">
                        <label>Name</label>
                        <div class="controls">
                            <input type="text" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>

                    <div class="control-group">
                        <label>Message</label>
                        <div class="controls">
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label>Category</label>
                        <div class="controls">
                            <select class="form-control"><option>options</option></select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-primary">
                                Post
                            </button>
                        </div>
                    </div>
                </form>
            </div><!--/panel content-->
        </div><!--/panel-->

        <div class="panel panel-default">
            <div class="panel-heading"><div class="panel-title"><h4>Engagement</h4></div></div>
            <div class="panel-body">
                <div class="col-xs-4 text-center"><img src="http://placehold.it/80/BBBBBB/FFF" class="img-circle img-responsive"></div>
                <div class="col-xs-4 text-center"><img src="http://placehold.it/80/EFEFEF/555" class="img-circle img-responsive"></div>
                <div class="col-xs-4 text-center"><img src="http://placehold.it/80/EEEEEE/222" class="img-circle img-responsive"></div>
            </div>
        </div><!--/panel-->
    </div><!--/col-span-6-->
@stop
@section('info-panel2')
    <hr>

    <a href="#"><strong><i class="glyphicon glyphicon-comment"></i> Discussions</strong></a>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i> <small>(3 mins ago)</small> The 3rd page reports don't contain any links. Does anyone know why..</a></li>
                <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i> <small>(1 hour ago)</small> Hi all, I've just post a report that show the relationship betwe..</a></li>
                <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-heart"></i> <small>(2 hrs ago)</small> Paul. That document you posted yesterday doesn't seem to contain the over..</a></li>
                <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-heart-empty"></i> <small>(4 hrs ago)</small> The map service on c243 is down today. I will be fixing the..</a></li>
                <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-heart"></i> <small>(yesterday)</small> I posted a new document that shows how to install the services layer..</a></li>
                <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-flash"></i> <small>(yesterday)</small> ..</a></li>
            </ul>
        </div>
    </div>
@stop