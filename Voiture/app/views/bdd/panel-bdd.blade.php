@extends('superadmin.home-admin')
@section('contentmod')
    <div class="row">
        <div class="col-xs-4"><a href="" class="btn btn-default" id="ReloadServer" value="reload"> Reload</a></div>
        <div class="col-xs-4 cent"><h3>Sauvegarde</h3>

                <p>{{Form::label('mysqldump')}} {{ Form::radio('guardar', 'mysqldump' ,null,['class'=>'sauv']) }}</p>
                <p>{{Form::label('rsync')}} {{ Form::radio('guardar', 'rsync',null,['class'=>'sauv']) }}</p>

        </div>
        <div class="col-xs-4"><a href="{{ route('generer-bd') }}" class="btn btn-default pull-right" id="generer" value="generer" data-token="{{ csrf_token() }}"> Generer</a></div>
    </div>
    <hr/>
    <div class="row">
        <div class="class col-xs-8">
            <a href="" class="btn btn-default" id="optimizeMyIsam" value="optimizeMyIsam"> GO</a>
            <h4>Optimiser BD</h4>
        </div>
        <div class="class col-xs-4">
            <h3>MyISAM</h3>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-xs-2">
            <h4>Optimiser BDD</h4>
            <p>{{Form::label('check')}} {{ Form::radio('optimizeInno', 'check' ,null,['class'=>'search']) }}</p>
            <p>{{Form::label('repair')}} {{ Form::radio('optimizeInno', 'repair',null,['class'=>'search']) }}</p>
            <p>{{Form::label('optimize')}} {{ Form::radio('optimizeInno', 'optimize' ,null,['class'=>'search']) }}</p>
            <p>{{Form::label('analize')}} {{ Form::radio('optimizeInno', 'analize',null,['class'=>'search']) }}</p>
        </div>
        <div class="col-xs-6 pull-left">{{ Field::select ('Tableaux', ['1','2']) }}</div>
        <div class="col-xs-4"><h3>INNODB</h3></div>
    </div>
@stop