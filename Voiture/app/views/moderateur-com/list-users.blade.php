@if($entity == "mod")
    @extends('moderateur-com/home-mod')
@endif
@section('contentmod')
    <script>
        var pathImgWait = "{{  asset('Img/wait.gif') }}";
    </script>
    {{ Notification::getAliased('okUpdate'); }}
    <div id="resultat" >
        <div class="table-responsive">
            <h1>Liste d'utilisateurs</h1>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>
                        @if ($sortbyP == 'prenom' && $orderP == 'asc')

                            <a href="{{ route('list_users', ['sortby' => 'prenom', 'order'=> 'desc']) }}">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> Prenom
                            </a>

                        @else
                            <a href="{{ route('list_users', ['sortby' => 'prenom', 'order'=> 'asc']) }}">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Prenom</a>
                        @endif
                    </th>
                    <th>
                        @if ($sortbyP == 'nom' && $orderP == 'asc')

                            <a href="{{ route('list_users', ['sortby' => 'nom', 'order'=> 'desc']) }}">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> Nom
                            </a>

                        @else
                            <a href="{{ route('list_users', ['sortby' => 'nom', 'order'=> 'asc']) }}">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Nom</a>
                        @endif
                    </th>
                    <th>
                        @if ($sortbyP == 'email' && $orderP == 'asc')

                            <a href="{{ route('list_users', ['sortby' => 'email', 'order'=> 'desc']) }}">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> Email
                            </a>

                        @else
                            <a href="{{ route('list_users', ['sortby' => 'email', 'order'=> 'asc']) }}">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Email</a>
                        @endif
                    </th>
                    <th>
                        @if ($sortbyP == 'pseudo' && $orderP == 'asc')

                            <a href="{{ route('list_users', ['sortby' => 'pseudo', 'order'=> 'desc']) }}">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> Pseudo
                            </a>

                        @else
                            <a href="{{ route('list_users', ['sortby' => 'pseudo', 'order'=> 'asc']) }}">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Pseudo</a>
                        @endif
                    </th>
                    <th>Affiher profil</th>
                    <th>Editer</th>
                </tr>
                </thead>
                <tbody>
                @if($dataUsers)
                    @foreach($dataUsers as $user)
                        <tr>
                            <td>{{ $user -> prenom }}</td>
                            <td>{{ $user -> nom }}</td>
                            <td>{{ $user -> email }}</td>
                            <td>{{ $user -> pseudo }}</td>
                            <td>
                                <a class="btn btn-success btn-responsive afficher" value="{{$user->id }}" data=1 href="{{ route ('user-detail') }}" role="button">
                                    Afficher &raquo;
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-responsive editer" href="{{ route ('user-edit', [$user->id]) }}" value="{{$user->id }}" role="button">
                                    Editer &raquo;
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

            <br><p>Pagina:</p>
            {{ $dataUsers-> links() }}
            @if($entity == "mod")
                <p><a class="btn btn-danger btn-sm" href="{{ route('mod-com') }}" role="button">Returner</a></p>
            @endif
        </div>
    </div>
@stop