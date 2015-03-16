@extends($extends)

@section('contentmod')

    <script>
        var searchRoute = "{{ route('search-user') }}";
    </script>

    {{ Notification::getAliased('okUpdate'); }}

    <div id="resultat" >
        <div class="table-responsive">
            <h3>Liste de voitures</h3>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>
                        @if($sortbyP == 'nom_voiture' && $orderP == 'asc' && $search == null)
                            <a href="{{ route('voitures-list', ['sortby' => 'nom_voiture', 'order'=> 'desc']) }}">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> Nom voiture
                            </a>
                        @elseif($search == true)
                            Nom voiture
                        @else
                            <a href="{{ route('voitures-list', ['sortby' => 'nom_voiture', 'order'=> 'asc']) }}">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Nom voiture</a>
                        @endif
                    </th>
                    <th>
                        @if ($sortbyP == 'type' && $orderP == 'asc' && $search == null)

                            <a href="{{ route('voitures-list', ['sortby' => 'type', 'order'=> 'desc']) }}">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> Type
                            </a>
                        @elseif($search == true)
                            Type
                        @else
                            <a href="{{ route('voitures-list', ['sortby' => 'type', 'order'=> 'asc']) }}">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Type</a>
                        @endif
                    </th>
                    <th>
                        @if ($sortbyP == 'model' && $orderP == 'asc' && $search == null)

                            <a href="{{ route('voitures-list', ['sortby' => 'model', 'order'=> 'desc']) }}">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> Model
                            </a>
                        @elseif($search == true)
                            Model
                        @else
                            <a href="{{ route('voitures-list', ['sortby' => 'model', 'order'=> 'asc']) }}">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Model</a>
                        @endif
                    </th>
                    <th>
                        @if ($sortbyP == 'fabricant' && $orderP == 'asc' && $search == null)

                            <a href="{{ route('voitures-list', ['sortby' => 'fabricant', 'order'=> 'desc']) }}">
                                <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span> Fabricant
                            </a>
                        @elseif($search == true)
                            Fabricant
                        @else
                            <a href="{{ route('voitures-list', ['sortby' => 'fabricant', 'order'=> 'asc']) }}">
                                <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span> Fabricant</a>
                        @endif
                    </th>
                    <th>Affiher profil</th>
                    <th>Effacer</th>
                </tr>
                </thead>
                <tbody id="listUsers">
                @if($dataUsers)
                    @foreach($dataUsers as $user)
                        <tr>
                            <td>{{ $user -> nom_voiture }}</td>
                            <td>{{ $user -> type }}</td>
                            <td>{{ $user -> model }}</td>
                            <td>{{ $user -> fabricant }}</td>
                            <td>
                                <a class="btn btn-success btn-sm btn-responsive afficher" value="{{$user->id }}" data=1 href="{{ route ('voitures-list-post') }}" role="button">
                                    Afficher &raquo;
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
                            @if($entity=="mod")
                                <a id="dropSelection" class="btn-danger btn-xs btn-responsive" href="{{route('delete-user')}}" data-token="{{ csrf_token() }}">Effacer sélectionnées</a>
                            @elseif($entity=="sadmin")
                                <a id="dropSelection" class="btn-danger btn-xs btn-responsive" href="{{route('delete-voiture')}}" data-token="{{ csrf_token() }}">Effacer sélectionnées</a>
                            @endif
                        </td>
                        <td colspan="2">Check All {{ Form::checkbox('supprimer', 'allSup',null,['class'=>"checkbox-all"]) }}</td>
                    </tr>
                @else
                    <tr><td colspan="7" class="btn-danger">Pas de resultats</td></tr>
                @endif
                </tbody>
            </table>

            <br><p>Page:</p>
            {{ $dataUsers-> links() }}
            @if($entity == "mod")
                <p><a class="btn btn-danger btn-sm" href="{{ route('mod-com') }}" role="button">Returner Moderateur Home</a></p>
            @elseif($entity == "sadmin")
                <p><a class="btn btn-danger btn-sm" href="{{ route('home-admin') }}" role="button">Returner Admin Home</a></p>
            @endif
        </div>
    </div>
@stop