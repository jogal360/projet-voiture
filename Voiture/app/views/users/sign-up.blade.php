@extends('layout')
@section('content')


    <div class="container" id="form-signUp">
        <h1>Sign up</h1>

        <div class="row">
            <div class="col-xs-6 col-centered">
                {{ Form::open(['route'=> 'register', 'method' => 'POST', 'role'=> 'form']) }}

                {{ Field::text('prenom') }}

                {{ Field::text('nom') }}

                {{ Field::email('email') }}

                {{ Field::password('password',['placeholder'=> 'Ingresa una contraseña']) }}

                {{ Field::password('password_confirmation',['placeholder'=>'Reingresa la clave escrita']) }}
                <div class="default-group">

                    {{ Field::text('captcha') }}
                    {{ HTML::IMAGE(Captcha::img(), 'Captcha image') }}
                </div>

                <div class="cent">
                    <br/>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>
@stop