@extends('layout.app', ["current" => "servico"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/servico/save" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeServico">Tipo de serviço</label>
                    <input type="text" class="form-control" name="nomeServico" id="nomeServico" placeholder="Tipo">
                </div>
                <div class="form-group">
                    <label for="descricaoServico">Descrição</label>
                    <input type="text" class="form-control" name="descricaoServico" id="descricaoServico" placeholder="Descrição">
                </div>
                <div class="form-group">
                    <label for="descricaoServico">Preço</label>
                    <input type="text" class="form-control" name="precoServico" id="precoServico" placeholder="Preço">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a type="cancel" class="btn btn-danger btn-sm" href="/servico" >cancelar</a>
            </form>
        </div>
    </div>
@endsection
