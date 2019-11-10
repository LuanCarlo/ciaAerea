@extends('layout.app', ["current" => "cliente"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <form action="/cliente/{{$cliente->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="nomeCliente">Nome Completo</label>
                        <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" value="{{$cliente->name}}"
                               placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="cpfCliente">CPF</label>
                        <input type="text" class="form-control" name="cpfCliente" id="cpfCliente" value="{{$cliente->cpf}}"
                               placeholder="CPF">
                    </div>
                    <div class="form-group">
                        <label for="dtnscCliente">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dtnscCliente" id="dtnscCliente" value="{{$cliente->dt_nascimento}}"
                               placeholder="Data">
                    </div>
                    <div class="form-group">
                        <label for="emailCliente">E-mail</label>
                        <input type="text" class="form-control" name="emailCliente" id="emailCliente" value="{{$cliente->email}}"
                               placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="telefoneCliente">Telefone</label>
                        <input type="text" class="form-control" name="telefoneCliente" id="telefoneCliente" value="{{$cliente->telefone}}"
                               placeholder="Telefone">
                    </div>

                    <div class="form-group">
                        <label for="senhaCliente">Senha</label>
                        <input type="password" class="form-control" name="senhaCliente" id="senhaCliente" value="{{$cliente->password}}"
                               placeholder="Senha">
                    </div>

                    <div class="form-group">
                        <label for="senhaCliente">Tipo</label>
                        <select name="tipoCliente"  class="form-control" value="{{$cliente->tipo}}">
                            <option value="1">Admin</option>
                            <option value="2">Usuário</option>
                        </select>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
            </form>
        </div>
    </div>

@endsection
