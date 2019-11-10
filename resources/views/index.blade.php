@extends('layout.app', ["current" => "home"])

@section('body')

    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastre em nosso Serviço</h5>
                        <p class="card=text">
                            Aqui ao se cadastrar, terá acesso a todos os nossos serviços.
                        </p>
                        <a href="/home" class="btn btn-primary">Cadastre-se</a>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Voos</h5>
                        <p class="card=text">
                            Vizualize nossos destinos.
                        </p>
                        <a href="/voo" class="btn btn-primary">Vizualizar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
