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
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($voos as $voo)
                        <tr>
                            <td>{{$voo->id}}</td>
                            <td>{{$voo->destino}}</td>
                            <td>{{$voo->dt_voo}}</td>
                            <td>
                                @auth
                                    @if(Auth::user()->tipo == 1 || Auth::user()->id == $voo->cliente_id)
                                        <a href="/voo/editar/{{$voo->id}}" class="btn btn-sm btn-primary">Editar</a>
                                    @endif
                                    @if(Auth::user()->tipo == 1)
                                        <a href="/voo/apagar/{{$voo->id}}" class="btn btn-sm btn-danger">Apagar</a>
                                    @endif
                                @endauth
                            </td>
                            <td>
                                <a href="/passagem/novo" class="btn btn-sm btn-primary">+</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        @auth
            @if(Auth::user()->tipo == 1)
            <div class="card-footer">
                <a href="/voo/novo" class="btn btn-sm btn-primary" role="button">Novo Voo</a>
            </div>
            @endif
        @endauth
    </div>

@endsection
