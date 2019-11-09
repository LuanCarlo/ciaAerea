@extends('layout.app', ["current" => "voo"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <form action="/voo/{{$voo->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="destinoVoo">Destino</label>
                        <input type="text" class="form-control" name="destinoVoo" id="destinoVoo" value="{{$voo->destino}}" placeholder="Destino">
                    </div>
                    <div class="form-group">
                        <label for="dataVoo">Data do Voo</label>
                        <input type="datetime-local" class="form-control" name="dataVoo" id="dataVoo" value="{{$voo->dt_voo}}" placeholder="Data do Voo">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
            </form>
        </div>
    </div>

@endsection
