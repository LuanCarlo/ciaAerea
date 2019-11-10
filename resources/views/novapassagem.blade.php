@extends('layout.app', ["current" => "passagem"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/passagem/save" method="POST">
                @csrf

                <div class="form-group">
                    <label for="descricaoPassagem">Tipo</label>
                    <select name="tipoPassagem"  class="form-control">
                        <option value="1">Ida e volta</option>
                        <option value="2">Ida</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="classePassagem">Classe</label>
                    <select name="classePassagem"  class="form-control">
                        <option value="1">Econômica</option>
                        <option value="2">Primeira Classe</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="assentoPassagem">Assento</label>
                    <input type="text" class="form-control" name="assentoPassagem" id="assentoPassagem" placeholder="Assento">
                </div>

                <div class="form-group">
                    <label for="portaoPassagem">Portão do Embarque</label>
                    <input type="text" class="form-control" name="portaoPassagem" id="portaoPassagem" placeholder="Portão do Embarque">
                </div>

                <div class="form-group">
                    <label for="precoPassagem">Preço</label>
                    <input type="text" class="form-control" name="precoPassagem" id="precoPassagem" placeholder="Preço">
                </div>

                <div class="form-group">
                    <label for="vooPassagem" class="control-label">Voo</label>
                    <div class="input-group">
                        <select class="form-control" id="vooPassagem" name="vooPassagem">
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <a type="cancel" class="btn btn-danger btn-sm" href="/passagem" >cancelar</a>
            </form>
        </div>
    </div>
@endsection



@section('javascript')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function novaPassagem() {
            $('#id').val('');
            $('#nomePassagem').val('');
            $('#precoPassagem').val('');
            $('#quantidadePassagem').val('');
            $('#dlgPassagens').modal('show');
        }

        function carregarServicos() {
            $.getJSON('/api/servico', function(data) {
                for(i=0;i<data.length;i++) {
                    opcao = '<option value ="' + data[i].id + '">' +
                        data[i].nome + '</option>';
                    $('#servicoPassagem').append(opcao);
                }
            });
        }

        function carregarVoo() {
            $.getJSON('/api/voo', function(data) {
                for(i=0;i<data.length;i++) {
                    opcao = '<option value ="' + data[i].id + '">' +
                        data[i].destino + " " + data[i].dt_voo + '</option>';
                    $('#vooPassagem').append(opcao);
                }
            });
        }

        function montarLinha(p) {
            var linha = "<tr>" +
                "<td>" + p.id + "</td>" +
                "<td>" + p.nome + "</td>" +
                "<td>" + p.estoque + "</td>" +
                "<td>" + p.preco + "</td>" +
                "<td>" + p.categoria_id + "</td>" +
                "<td>" +
                '<button class="btn btn-sm btn-primary" onclick="editar(' + p.id + ')"> Editar </button> ' +
                '<button class="btn btn-sm btn-danger" onclick="remover(' + p.id + ')"> Apagar </button> ' +
                "</td>" +
                "</tr>";
            return linha;
        }

        function remover(id) {
            $.ajax({
                type: "DELETE",
                url: "/api/passagem/" + id,
                context: this,
                success: function() {
                    console.log('Apagou OK');
                    linhas = $("#tabelaPassagens>tbody>tr");
                    e = linhas.filter( function(i, elemento) {
                        return elemento.cells[0].textContent == id;
                    });
                    if (e)
                        e.remove();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function carregarPassagens() {
            $.getJSON('/api/passagem', function(passagens) {
                for(i=0;i<passagens.length;i++) {
                    linha = montarLinha(passagens[i]);
                    $('#tabelaPassagens>tbody').append(linha);
                }
            });
        }

        function criarPassagem() {
            prod = {
                nome: $("#nomePassagem").val(),
                preco: $("#precoPassagem").val(),
                estoque: $("#quantidadePassagem").val(),
                categoria_id: $("#servicoPassagem").val()
            };
            $.post("/api/passagem", prod, function(data) {
                passagem = JSON.parse(data);
                linha = montarLinha(passagem);
                $('#tabelaPassagens>tbody').append(linha);
            });
        }

        function salvarPassagem() {
            prod = {
                id : $("#id").val(),
                nome: $("#nomePassagem").val(),
                preco: $("#precoPassagem").val(),
                estoque: $("#quantidadePassagem").val(),
                categoria_id: $("#servicoPassagem").val()
            };
            $.ajax({
                type: "PUT",
                url: "/api/passagem/" + prod.id,
                context: this,
                data: prod,
                success: function(data) {
                    prod = JSON.parse(data);
                    linhas = $("#tabelaPassagens>tbody>tr");
                    e = linhas.filter( function(i, e) {
                        return ( e.cells[0].textContent == prod.id );
                    });
                    if (e) {
                        e[0].cells[0].textContent = prod.id;
                        e[0].cells[1].textContent = prod.nome;
                        e[0].cells[2].textContent = prod.estoque;
                        e[0].cells[3].textContent = prod.preco;
                        e[0].cells[4].textContent = prod.categoria_id;
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $("#formPassagem").submit( function(event){
            event.preventDefault();
            if ($("#id").val() != '')
                salvarPassagem();
            else
                criarPassagem();

            $("#dlgPassagens").modal('hide');
        });

        $(function(){
            carregarServicos();
            carregarPassagens();
            carregarVoo();
        })

    </script>
@endsection
