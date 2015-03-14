@extends('moderateur-com/home-mod')
@section('contentmod')
    <div class="row cent"></div>
    <div class="col-xs-12">
        <h1>Modification de profil</h1>
        {{ Form::model($user,['route'=> 'update_user', 'method' => 'PUT', 'role'=> 'form','novalidate']) }}
        <div class="col-xs-12 cent btn-success title-user">
            <h1>
                {{ ucfirst($user -> prenom) }}
            </h1>
        </div>
            {{ Field::text('prenom') }}
            {{ Field::text('nom') }}
            {{ Field::email('email') }}
            {{ Field::text('date_nac') }}
            {{ Field::select ('sexe', $sexe) }}
            {{ Field::text('phone') }}
            {{ Field::text('adr_postale') }}
            {{ Field::text('description') }}
            {{ Field::url('website_url') }}
        <div class="cent">
            {{ Form::hidden('id', $user->id) }}
            <p><button type="submit" class="btn btn-success">Guardar perfil</button></p>
            {{Form::close()}}

            <p><a class="btn btn-danger btn-sm" href="{{ URL::previous() }}" role="button">Annuler</a></p>
        </div>
    </div>
@stop