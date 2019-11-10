@extends('layout.app', ["current" => "passagem" ])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Passagens</h5>

            <table class="table table-ordered table-hover" id="tabelaPassagens">
                <thead>
                <tr>
                    <th>Código</th>
                    <th>assento</th>
                    <th>Preço</th>
                    <th>Voo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($passagens as $passagem)
                    <tr>
                        <td>{{$passagem->id}}</td>
                        <td>{{$passagem->assento}}</td>
                        <td>{{$passagem->preco}}</td>
                        <td>{{$passagem->voo_id}}</td>
                        <td>
                            @auth
                                @if(Auth::user()->tipo == 1 || Auth::user()->id == $passagem->cliente_id)
                                    <a href="/passagem/editar/{{$passagem->id}}" class="btn btn-sm btn-primary">Editar</a>
                                @endif
                                @if(Auth::user()->tipo == 1)
                                    <a href="/passagem/apagar/{{$passagem->id}}" class="btn btn-sm btn-danger">Apagar</a>
                                @endif
                            @endauth
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            <a href="/passagem/novo" class="btn btn-sm btn-primary" role="button">Nova Passagem</a>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlgPassagens">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formPassagem">
                    <div class="modal-header">
                        <h5 class="modal-title">Nova Passagem</h5>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="destinoPassagem" class="control-label">Destino</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="destinoPassagem" placeholder="Destino">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="precoPassagem" class="control-label">Preço</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="precoPassagem" placeholder="Preço da passagem">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
