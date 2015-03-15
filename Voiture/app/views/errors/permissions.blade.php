@extends('layout')
@section('content')
    <div class="row">
        <div class="xs-12 cent">
            <h1>Désolé, vous avez pas la permission de faire cette opération. </h1>
            <img src="{{asset('Img/sad.png')}}" alt="Not permissions"/>
        </div>
    </div>
    <div class="row">
        <div class="xs-12 cent">
            <a href="{{route($page)}}"><button class="btn-primary">Go back</button></a>
        </div>
    </div>
    @stop