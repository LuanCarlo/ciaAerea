@extends('layout.app', ["current" => "passagem" ])

@section('body')

    <div class="card border">
        <div class="card-body">
            <form action="/servico/{{$passagem->id}}" method="POST">
                @csrf
                <div class="form-group">

                    <input type="hidden" id="idpassagemServico" name="idpassagemServico" value="{{$passagem->id}}">

                    <div class="form-group">
                        <label for="descricaoPassagem" >Tipo</label>
                        <select name="tipoPassagem"  class="form-control" value="{{$passagem->tipo}}">
                            <option value="1">Ida e volta</option>
                            <option value="2">Ida</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="classePassagem" >Classe</label>
                        <select name="classePassagem"  class="form-control" value="{{$passagem->classe}}">
                            <option value="1">Econômica</option>
                            <option value="2">Primeira Classe</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="assentoPassagem">Assento</label>
                        <input type="text" class="form-control" name="assentoPassagem" id="assentoPassagem"
                               value="{{$passagem->assento}}" placeholder="Assento">
                    </div>

                    <div class="form-group">
                        <label for="portaoPassagem">Portão do Embarque</label>
                        <input type="text" class="form-control" name="portaoPassagem" id="portaoPassagem"
                               value="{{$passagem->portao}}" placeholder="Portão do Embarque">
                    </div>

                    <div class="form-group">
                        <label for="precoPassagem">Preço</label>
                        <input type="text" class="form-control" name="precoPassagem" id="precoPassagem"
                               value="{{$passagem->preco}}" placeholder="Preço">
                    </div>

                    <div class="form-group">
                        <label for="vooPassagem" class="control-label">Voo</label>
                        <div class="input-group">
                            <select class="form-control" id="vooPassagem" name="vooPassagem"
                                    value="{{$passagem->preco}}"
                            >
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <a type="cancel" class="btn btn-danger btn-sm" href="/passagem" >cancelar</a>

                    <button type="button" class="btn btn-secondary btn-sm" onClick="novoServico()">Adicionar Serviço(s)</button>

                </div>
            </form>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlgServico">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formServico">
                    <div class="modal-header">
                        <h5 class="modal-title">Novo Serviço</h5>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="idpassagemServico" name="idpassagemServico" value="{{$passagem->id}}">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="descricaoServico" class="control-label">Descrição</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="descricaoServico"  nome="descricaoServico" placeholder="Descrição">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="servicoPassagem" class="control-label">Serviço</label>
                            <div class="input-group">
                                <select class="form-control" id="idservicoServico" nome="idservicoServico">
                                </select>
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



@section('javascript')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        var elemento = document.getElementById('idpassagemServico');
        var passagemId = elemento.value;

        function novoServico() {
            $('#id').val('');
            $('#descricaoServico').val('');
            $('#idpassagemServico').val('');
            $('#idservicoServico').val('');
            $('#dlgServico').modal('show');
        }

        function carregarServicos() {
            $.getJSON('/api/servico', function(data) {
                for(i=0;i<data.length;i++) {
                    opcao = '<option value ="' + data[i].id + '">' +
                        data[i].nome + '</option>';
                    $('#idservicoServico').append(opcao);
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

        function criarServico() {
            prod = {
                descricao: $("#descricaoServico").val(),
                servico_id: $("#idservicoServico").val(),
                passagem_id: passagemId
            };
            $.post("/api/servicovoo", prod, function(data) {
                passagem = JSON.parse(data);
                linha = montarLinha(passagem);
                $('#tabelaPassagens>tbody').append(linha);
            });
        }

        function salvarServico() {
            prod = {
                id : $("#id").val(),
                descricao: $("#descricaoServico").val(),
                servico_id: $("#idservicoServico").val(),
                passagem_id: passagemId
            };
            alert(prod);
            $.ajax({
                type: "PUT",
                url: "/api/servicovoo" + prod.id,
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

        $("#formServico").submit( function(event){
            event.preventDefault();
            if ($("#id").val() != '')
                salvarServico();
            else
                criarServico();

            $("#dlgServico").modal('hide');
        });

        $(function(){
            carregarServicos();
            carregarPassagens();
            carregarVoo();
        })

    </script>
@endsection
