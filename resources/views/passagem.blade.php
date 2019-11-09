@extends('layout.app', ["current" => "passagem" ])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Passagens</h5>

            <table class="table table-ordered table-hover" id="tabelaPassagens">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Departamento</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" role="button" onClick="novaPassagem()">Nova Passagem</button>
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
                    $('#categoriaPassagem').append(opcao);
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

        function editar(id) {
            $.getJSON('/api/passagem/'+id, function(data) {
                console.log(data);
                $('#id').val(data.id);
                $('#nomePassagem').val(data.nome);
                $('#precoPassagem').val(data.preco);
                $('#quantidadePassagem').val(data.estoque);
                $('#categoriaPassagem').val(data.categoria_id);
                $('#dlgPassagens').modal('show');
            });
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
                categoria_id: $("#categoriaPassagem").val()
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
                categoria_id: $("#categoriaPassagem").val()
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
        })

    </script>
@endsection
