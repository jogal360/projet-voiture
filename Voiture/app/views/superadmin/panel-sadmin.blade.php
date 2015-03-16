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
                            <h4>
                                @if( $numberUsers === 1)
                                    Utilisateur
                                @elseif( $numberUsers > 1)
                                    Utilisateurs
                                @else
                                    Aucun utilisateur enregistré
                                @endif
                                dans la comunauté!
                            </h4>
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

        <div class="panel panel-warning">
            <div class="panel-heading"><div class="panel-title"><h4>Joueurs de la semaine</h4></div></div>
            <div class="panel-body">
                @foreach($joueursSemaine as $joueur)
                    <div class="col-xs-4 text-center">
                        <a href="{{ route ('user-detail')}}" class ='img-random' value="{{$joueur->id}}" data="search">
                            <img src="{{asset("photos/$joueur->avatar")}}" class="img-circle img-responsive img-random" >
                        </a>
                        {{$joueur->pseudo}}
                    </div>
                @endforeach

            </div>
        </div><!--/panel-->
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
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-money fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><h2>{{ $numberAccounts  }}</h2></div>
                        <div>
                            <h4>
                                @if( $numberAccounts === 1)
                                    Bank Account enregistrés.
                                @elseif( $numberAccounts > 1)
                                    Bank Accounts enregistrés.
                                @else
                                    Aucun bank account enregistré
                                @endif
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
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


        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-9 text-left">
                        <div class="huge"><h2>{{ $numberVoitures  }}</h2></div>
                        <div>
                            <h4>
                                @if( $numberVoitures === 1)
                                    Voiture enregistré.
                                @elseif( $numberVoitures > 1)
                                    Voitures enregistrés.
                                @else
                                    Aucun voiture enregistré
                                @endif
                            </h4>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <i class="fa fa-car fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('voitures-list') }}" id="viewDetailsUsers">
                <div class="panel-footer">
                    <span class="pull-left"><b>View Details</b></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
        <div class="panel panel-default">
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

    </div><!--/col-span-6-->
@stop
@section('info-panel2')

@stop