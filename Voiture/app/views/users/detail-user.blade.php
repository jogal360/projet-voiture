<div class="col-xs-12 cent btn-success title-user">
    <h1>
        @if($search == "no")
            {{ ucfirst($user -> prenom) }}
        @elseif($search == "yes")
            {{ ucfirst($user -> prenom) . ' '. ucfirst($user -> nom) }}
        @endif
    </h1>
</div>
@if($search == "no")
    <div class="col-xs-12">
        <div class="col-sm-4 col-xs-12">
            <p>
                Nom:
            </p>
        </div>
        <div class="col-sm-8 col-xs-12">
            <p>
                {{ ucfirst($user -> prenom) }}
            </p>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-sm-4 col-xs-12">
            <p>
                Prénom:
            </p>
        </div>
        <div class="col-sm-8 col-xs-12">
            <p>
                {{ ucfirst($user -> nom) }}
            </p>
        </div>
    </div>
@endif
<div class="col-xs-12 text-center">

    <img src="{{asset("Photos/$user->avatar")}}" class="img-circle img-responsive img-random" >

</div>
<div class="col-xs-12">
    <div class="col-sm-4 col-xs-12">
        <p>
            Email:
        </p>
    </div>
    <div class="col-sm-8 col-xs-12">
        <a href="mailto:{{ $user -> email }}?Subject=Hello" target="_top">
            {{ $user -> email }}
        </a>
    </div>
</div>
@if($search == "no")
    <div class="col-xs-12">
        <div class="col-sm-4 col-xs-12">
            <p>
                Date de naissance:
            </p>
        </div>
        <div class="col-sm-8 col-xs-12">
            <p>
                {{ $user -> date_nac }}
            </p>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-sm-4 col-xs-12">
            <p>
                Sexe:
            </p>
        </div>
        <div class="col-sm-8 col-xs-12">
            @if($user -> sexe == 'm')
                <p>
                    Homme
                </p>
            @else
                <p>
                    Femme
                </p>
            @endif
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-sm-4 col-xs-12">
            <p>
                Phone:
            </p>
        </div>
        <div class="col-sm-8 col-xs-12">
            <p>
                {{ $user -> phone }}
            </p>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-sm-4 col-xs-12">
            <p>
                CP:
            </p>
        </div>
        <div class="col-sm-8 col-xs-12">
            <p>
                {{ $user -> adr_postale }}
            </p>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-sm-4 col-xs-12">
            <p>
                Description:
            </p>
        </div>
        <div class="col-sm-8 col-xs-12">
            <p>
                {{ $user -> description }}
            </p>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="col-sm-4 col-xs-12">
            <p>
                Website URL:
            </p>
        </div>
        <div class="col-sm-8 col-xs-12">
            <p>
                {{ $user -> website_url }}
            </p>
        </div>
    </div>
    <div class="col-xs-12 space-down">
        <div class="col-sm-4 col-xs-12">
            <p>
                IP Dernière connexion:
            </p>
        </div>
        <div class="col-sm-8 col-xs-12">
            <p>
                {{ $user -> adr_ip }}
            </p>
        </div>
    </div>
@elseif($search == "yes")
    <div class="panel-body">

        <small>Voitures en possession</small>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                <span class="sr-only">72% Complete</span>
            </div>
        </div>
        <small>Concours gagné</small>
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                <span class="sr-only">20% Complete</span>
            </div>
        </div>
        <small>Items</small>
        <div class="progress">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                <span class="sr-only">60% Complete (warning)</span>
            </div>
        </div>
        <small>Infrastructures</small>
        <div class="progress">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                <span class="sr-only">80% Complete</span>
            </div>
        </div>

    </div><!--/panel-body-->
@endif