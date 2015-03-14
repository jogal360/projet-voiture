<div class="col-xs-12 cent btn-success title-user">
    <h1>
        {{ ucfirst($user -> prenom) }}
    </h1>
</div>
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
