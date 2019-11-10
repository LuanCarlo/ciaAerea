@extends('layout.app', ["current" => "cliente"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/cliente/save" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeCliente">Nome Completo</label>
                    <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="cpfCliente">CPF</label>
                    <input type="text" class="form-control" name="cpfCliente" id="cpfCliente" placeholder="CPF">
                </div>
                <div class="form-group">
                    <label for="dtnscCliente">Data de Nascimento</label>
                    <input type="date" class="form-control" name="dtnscCliente" id="dtnscCliente" placeholder="Data">
                </div>
                <div class="form-group">
                    <label for="emailCliente">E-mail</label>
                    <input type="text" class="form-control" name="emailCliente" id="emailCliente" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="telefoneCliente">Telefone</label>
                    <input type="text" class="form-control" name="telefoneCliente" id="telefoneCliente" placeholder="Telefone">
                </div>
                <div class="form-group">
                    <label for="senhaCliente">Senha</label>
                    <input type="password" class="form-control" name="senhaCliente" id="senhaCliente" placeholder="Senha">
                </div>

                <div class="form-group">
                    <label for="senhaCliente">Tipo</label>
                    <select name="tipoCliente"  class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">Usuário</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a type="cancel" class="btn btn-danger btn-sm" href="/cliente">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
