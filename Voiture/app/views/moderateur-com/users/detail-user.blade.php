@extends($layoutp)
@section('detail')


    <div class="col-xs-12">
        <h1>
            {{ $user -> prenom }}
        </h1>
    </div>
    <div class="col-xs-12">
        <div class="col-sm-2 col-xs-12">
            <p>
                Categoria:
            </p>
        </div>
        <div class="col-sm-10 col-xs-12">
            <a href="#">
                @{{ $candidate -> category -> name }}
            </a>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-sm-2 col-xs-12">
            <p>
                Tipo de trabajo:
            </p>
        </div>
        <div class="col-sm-10 col-xs-12">
            <p>
                @{{ $candidate -> job_type_title }}
            </p>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-sm-2 col-xs-12">
            <p>
                Website:
            </p>
        </div>
        <div class="col-sm-10 col-xs-12">
            <a href="#">
                @{{ $candidate -> website_url }}
            </a>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-12">
            <h4>
                Description:
            </h4>
        </div>
        <div class="col-xs-12">
            <p>
                @{{ $candidate -> description }}
            </p>
        </div>
    </div>
    <div class="col-xs-12">
        <a class="btn btn-primary btn-sm" href="#" role="button">Regresar</a></p>
    </div>

        <div class="col-xs-12">
            <div class="col-xs-12">
                <p>
                    <a href="#">Editar candidato</a>
                </p>
            </div>
        </div>

@stop