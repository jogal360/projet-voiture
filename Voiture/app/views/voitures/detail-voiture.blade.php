<div class="col-xs-12 cent btn-success title-user">
    <h1>
        {{ ucfirst($user->nom_voiture) }}
    </h1>
</div>
<div class="col-xs-12">
    <div class="col-sm-4 col-xs-12">
        <p>
            Type:
        </p>
    </div>
    <div class="col-sm-8 col-xs-12">
        <p>
            {{ ucfirst($user -> type) }}
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
            {{$user->description}}
        </p>
    </div>
</div>
<hr/>
<div class="col-xs-12">
    <div class="col-sm-3 col-xs-12">
        <p>
            Model:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user->model  }}
        </p>
    </div>
    <div class="col-sm-3 col-xs-12 ">
        <p>
            Fabricant:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12 pull-right">
        <p>
            {{ $user -> fabricant }}
        </p>
    </div>
</div>

<div class="col-xs-12">
    <div class="col-sm-3 col-xs-12">
        <p>
            Resistance:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user -> resistance  }}
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            Rpm:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12 pull-right">
        <p>
            {{ $user -> rpm }}
        </p>
    </div>
</div>
<div class="col-xs-12">
    <div class="col-sm-3 col-xs-12">
        <p>
            Vitesse:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user -> vitesse }} km/h
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            Cylindres:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12 pull-right">
        <p>
            {{ $user -> cylindres }}
        </p>
    </div>
</div>

<div class="col-xs-12">
    <div class="col-sm-3 col-xs-12">
        <p>
            Cheval vapeur:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user -> cheval_vapeur }} hp
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            Taille Recevoir:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user -> taille_recevoir }} lts.
        </p>
    </div>
</div>
<div class="col-xs-12 space-down">
    <div class="col-sm-3 col-xs-12">
        <p>
            Niveau:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user -> niveau }}.
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            Carrocere:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user -> carrosserie }}.
        </p>
    </div>
</div>
<div class="col-xs-12 space-down">
    <div class="col-sm-3 col-xs-12">
        <p>
            Pneus:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user -> pneus }}.
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            Châssis:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user -> châssis }}.
        </p>
    </div>
</div>
<div class="col-xs-12 space-down">
    <div class="col-sm-3 col-xs-12">
        <p>
            Etat stabilite:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user -> et_stabilite }}.
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            Etat esthetique:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user -> et_esthetique }}.
        </p>
    </div>
</div>
<div class="col-xs-12 space-down">
    <div class="col-sm-3 col-xs-12">
        <p>
            Etat performance:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user -> et_performance }}.
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            Etat equilibre:
        </p>
    </div>
    <div class="col-sm-3 col-xs-12">
        <p>
            {{ $user -> et_equilibre }}.
        </p>
    </div>
</div>