@extends('layout.app', ["current" => "servico"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de serviços</h5>

            @if(count($servicos) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome do servico</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($servicos as $servico)
                        <tr>
                            <td>{{$servico->id}}</td>
                            <td>{{$servico->nome}}</td>
                            <td>
                                <a href="/servico/editar/{{$servico->id}}" class="btn btn-sm btn-primary">Editar</a>
                                <a href="/servico/apagar/{{$servico->id}}" class="btn btn-sm btn-danger">Apagar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="/servico/novo" class="btn btn-sm btn-primary" role="button">Novo serviço</a>
        </div>
    </div>

@endsection
