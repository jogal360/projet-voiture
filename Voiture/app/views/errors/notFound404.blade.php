@extends('layout')
@section('content')
    <div class="row">
        <div class="xs-12 cent">
            <img src="{{asset('Img/zombie404.jpg')}}" alt="error 404 Not Found"/>
        </div>
    </div>
    <div class="row">
        <div class="xs-12 cent">
            <a href="{{route($page)}}"><button class="btn-primary">Go back</button></a>
        </div>
    </div>
    @stop