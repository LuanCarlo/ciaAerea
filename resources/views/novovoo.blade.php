@extends('layout.app', ["current" => "voo"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/voo/save" method="POST">
                @csrf
                <div class="form-group">
                    <label for="destinoVoo">Destino</label>
                    <input type="text" class="form-control" name="destinoVoo" id="destinoVoo" placeholder="Destino">
                </div>
                <div class="form-group">
                    <label for="dataVoo">Data do Voo</label>
                    <input type="datetime-local" class="form-control" name="dataVoo" id="dataVoo" placeholder="Data do Voo">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a type="cancel" class="btn btn-danger btn-sm" href="/voo" >cancelar</a>
            </form>
        </div>
    </div>
@endsection
