@if($entity == "mod")
    @extends('moderateur-com/home-mod')
@endif

@section('contentmod')
    @if($search==true)
    <script src="{{ asset('Js/layout.js')}}"></script>
    @endif
    <script>
        var pathImgWait = "{{  asset('Img/wait.gif') }}";
        var searchRoute = "{{ route('search-user') }}"
    </script>

    {{ Notification::getAliased('okUpdate'); }}
    <h3>Recherche d'un utilisateur</h3>
    <div class="cent">
        {{Form::label('prenom')}} {{ Form::radio('search', 'prenom',null,['class'=>'search']) }}
        &nbsp;&nbsp;&nbsp;{{Form::label('nom')}} {{ Form::radio('search', 'nom',null,['class'=>'search']) }}
        &nbsp;&nbsp;&nbsp;{{Form::label('email')}} {{ Form::radio('search', 'email',null,['class'=>'search']) }}
    </div>
    <div class="input-group">
        <input type="text" class="form-control" name="inputSearch" id="inputSearch" placeholder="Search for..." readonly value="">
      <span class="input-group-btn">
        <button class="btn btn-default disabled" type="button" id="goSearch" data-token="{{ csrf_token() }}">Go!</button>
      </span>
    </div><!-- /input-group -->
    <div id="resultatesS"></div>
    <div id="resultat" >
        <div class="table-responsive">
            <h3>Liste d'utilisateurs</h3>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>
                        @if($sortbyP == 'prenom' && $orderP == 'asc' && $search == null)
                            <a href="{{ route('list_users', ['sortby' => 'prenom', 'order'=> 'desc']) }}">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> Prenom
                            </a>
                        @elseif($search == true)
                            Prenom
                        @else
                            <a href="{{ route('list_users', ['sortby' => 'prenom', 'order'=> 'asc']) }}">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Prenom</a>
                        @endif
                    </th>
                    <th>
                        @if ($sortbyP == 'nom' && $orderP == 'asc' && $search == null)

                            <a href="{{ route('list_users', ['sortby' => 'nom', 'order'=> 'desc']) }}">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> Nom
                            </a>
                        @elseif($search == true)
                            Nom
                        @else
                            <a href="{{ route('list_users', ['sortby' => 'nom', 'order'=> 'asc']) }}">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Nom</a>
                        @endif
                    </th>
                    <th>
                        @if ($sortbyP == 'email' && $orderP == 'asc' && $search == null)

                            <a href="{{ route('list_users', ['sortby' => 'email', 'order'=> 'desc']) }}">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> Email
                            </a>
                        @elseif($search == true)
                            Email
                        @else
                            <a href="{{ route('list_users', ['sortby' => 'email', 'order'=> 'asc']) }}">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Email</a>
                        @endif
                    </th>
                    <th>
                        @if ($sortbyP == 'pseudo' && $orderP == 'asc' && $search == null)

                            <a href="{{ route('list_users', ['sortby' => 'pseudo', 'order'=> 'desc']) }}">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> Pseudo
                            </a>
                        @elseif($search == true)
                            Pseudo
                        @else
                            <a href="{{ route('list_users', ['sortby' => 'pseudo', 'order'=> 'asc']) }}">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Pseudo</a>
                        @endif
                    </th>
                    <th>Affiher profil</th>
                    <th>Editer</th>
                    <th>Effacer</th>
                </tr>
                </thead>
                <tbody id="listUsers">
                @if($dataUsers)
                    @foreach($dataUsers as $user)
                        <tr>
                            <td>{{ $user -> prenom }}</td>
                            <td>{{ $user -> nom }}</td>
                            <td>{{ $user -> email }}</td>
                            <td>{{ $user -> pseudo }}</td>
                            <td>
                                <a class="btn btn-success btn-sm btn-responsive afficher" value="{{$user->id }}" data=1 href="{{ route ('user-detail') }}" role="button">
                                    Afficher &raquo;
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm btn-responsive editer" href="{{ route ('user-edit', [$user->id]) }}" value="{{$user->id }}" role="button">
                                    Editer &raquo;
                                </a>
                            </td>
                            <td>{{ Form::checkbox('supprimer', $user->id,null,['class'=>"checkbox-supp"]) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2">
                            <a id="dropSelection" class="btn-danger btn-xs btn-responsive" href="{{route('delete-user')}}" data-token="{{ csrf_token() }}">Effacer sélectionnées</a>
                        </td>
                        <td colspan="2">Check All {{ Form::checkbox('supprimer', 'allSup',null,['class'=>"checkbox-all"]) }}</td>
                    </tr>
                @else
                    <tr><td colspan="7" class="btn-danger">Pas de resultats</td></tr>
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