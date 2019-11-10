@extends('layout.app', ["current" => "cliente"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Clientes</h5>

            @if(count($clientes) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome do cliente</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->name}}</td>
                            <td>
                                <a href="/cliente/editar/{{$cliente->id}}" class="btn btn-sm btn-primary">Editar</a>
                                <a href="/cliente/apagar/{{$cliente->id}}" class="btn btn-sm btn-danger" href="/cliente">Apagar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="/cliente/novo" class="btn btn-sm btn-primary" role="button">Novo cliente</a>
        </div>
    </div>

@endsection
