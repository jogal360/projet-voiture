@extends('moderateur-com/home-mod')
@section('users')
    <div id="resultat" >
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Mail</th>
                    <th>Pseudo</th>
                    <th>Affiher profil</th>
                    <th>Editer</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataUsers as $user)
                    <tr>
                        <td>{{ $user -> prenom }}</td>
                        <td>{{ $user -> nom }}</td>
                        <td>{{ $user -> email }}</td>
                        <td>{{ $user -> pseudo }}</td>
                        <td>
                            <a class="btn btn-success btn-responsive afficher" value="{{$user->id }}" data=1 href="#" role="button">
                                Afficher &raquo;
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-responsive editer" href="#" value="{{$user->id }}" role="button">
                                Editer &raquo;
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <br><p>Pagina:</p>
            {{ $dataUsers-> links() }}
        </div>
    </div>
@stop