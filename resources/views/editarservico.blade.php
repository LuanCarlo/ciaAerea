@extends('layout.app', ["current" => "servico"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <form action="/servico/{{$servico->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="nomeServico">Tipo de serviço</label>
                        <input type="text" class="form-control" name="nomeServico" id="nomeServico"
                               value="{{$servico->nome}}" placeholder="Tipo">
                    </div>
                    <div class="form-group">
                        <label for="descricaoServico">Descrição</label>
                        <input type="text" class="form-control" name="descricaoServico" id="descricaoServico"
                               value="{{$servico->descricao}}" placeholder="Descrição">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
            </form>
        </div>
    </div>

@endsection
