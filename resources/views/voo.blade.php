@extends('layout.app', ["current" => "voo"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Voos</h5>

            @if(count($voos) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Destino</th>
                        <th>Data do Voo</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($voos as $voo)
                        <tr>
                            <td>{{$voo->id}}</td>
                            <td>{{$voo->destino}}</td>
                            <td>{{$voo->dt_voo}}</td>
                            <td>
                                <a href="/voo/editar/{{$voo->id}}" class="btn btn-sm btn-primary">Editar</a>
                                <a href="/voo/apagar/{{$voo->id}}" class="btn btn-sm btn-danger">Apagar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="/voo/novo" class="btn btn-sm btn-primary" role="button">Novo Voo</a>
        </div>
    </div>

@endsection
