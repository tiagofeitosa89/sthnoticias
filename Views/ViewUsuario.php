<script>
    var table = null;
</script>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#" onclick="carregarPagina('Views/cards.php')">Provedores</a>
    </li>
    <li class="breadcrumb-item active">Usuários</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Usuários
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat" id="adicionar">Adicionar</button>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>Cargo</th>
                            <th>Usuário</th>
                            <th>Inativo</th> 
                            <th>Opções</th> 
                        </tr>
                    </thead>
                    <tbody>        
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>               
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>Cargo</th>
                            <th>Usuário</th>
                            <th>Inativo</th>
                            <th>Opções</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    <!-- Modal de cadastro e alteração de usuarios -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="control-label required">Nome<sup style="color:red">*</sup></label>
                        <input id="nome" name="nome" class="form-control input-lg" placeholder="Nome" tabindex="1" maxlength="30" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label required">Sobrenome<sup style="color:red">*</sup></label>
                        <input id="sobrenome" name="sobrenome" class="form-control input-lg" placeholder="Sobrenome" tabindex="2" maxlength="30" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label required">Usuário<sup style="color:red">*</sup></label>
                        <input id="usuario" name="usuario" class="form-control input-lg" placeholder="Usuário" tabindex="2" maxlength="30" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label required">Senha<sup style="color:red">*</sup></label>
                        <input class="form-control input-lg" id="senha" type="password" name="senha" tabindex="3" maxlength="60" placeholder="Senha" required>    
                    </div>

                    <div class="form-group">
                        <label class="control-label required">Cargo<sup style="color:red">*</sup></label>
                        <select id="cargo" name="cargo"  class="form-control input-lg"  placeholder="Cargo" tabindex="4" required>
                            
                        </select>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="inativo">
                        <label class="form-check-label" for="exampleCheck1">Inativo</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" name="salvar" id="" onclick="salvarUsuario()">Salvar</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal de exclusão de versões -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"> Excluir usuário </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mensagem">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" name="excluir" id="" onclick="deletarUsuario()">Excluir</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal para confirmar ação de inativar -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Confirmação</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="mensagemInativo">
            ...    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="voltarStatusInativo()">Cancelar</button>
            <button type="button" class="btn btn-primary" name="inativar" id = "" title = ""  onclick = "inativar()">Confirmar</button>
        </div>
        </div>
    </div>
    </div>

<!-- Page level plugin JavaScript-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>    
    $("#adicionar").on("click", function(){
        document.getElementById("exampleModalLabel").innerHTML = 'Inserir usuário';
        document.getElementById("nome").value = "";
        document.getElementById("sobrenome").value = "";
        document.getElementById("usuario").value = "";
        document.getElementById("senha").disabled = false;
        document.getElementById("senha").value = "";
        document.getElementById("cargo").options.selectedIndex = 0;
        document.getElementById("inativo").checked = false;
        document.getElementsByName("salvar").id = "";
    });          
</script>

<script>
    // Editar 
    $('#dataTable tbody').on('click', 'tr', function () {         
        var linha = table.row(this).index();

        var codigo = table.cell(linha, 0).data();
        var nome = table.cell(linha, 1).data();
        var sobrenome = table.cell(linha, 2).data();
        var cargo = table.cell(linha, 3).data();
        var usuario = table.cell(linha, 4).data();
        var inativo = table.cell(linha, 5).data();
        
        document.getElementById("exampleModalLabel").innerHTML = 'Editar usuário';
        
        document.getElementById("nome").value = nome;
        document.getElementById("sobrenome").value = sobrenome;
        document.getElementById("usuario").value = usuario;
        document.getElementById("senha").disabled = true;
        document.getElementById("cargo").options.namedItem(cargo).selected = true;

        if (inativo == 'S'){
            document.getElementById("inativo").checked = true;    
        }else{
            document.getElementById("inativo").checked = false;
        }
        
        document.getElementsByName("salvar").id = codigo; 
    });  
</script>

<script>
    // Deletar
    $('#dataTable tbody').on('click', 'tr', function () {         
        var linha = table.row(this).index();
        var codigo = table.cell(linha, 0).data();
        var usuario = table.cell(linha, 1).data(); 
        console.log(linha);
        document.getElementById("mensagem").innerHTML = "Deseja realmente excluir o usuario "+codigo+" - "+usuario+"?";
        document.getElementsByName("excluir").id = codigo;
   });
</script>

<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<script>
    function salvarUsuario(){
        var inativo;

        var nome = document.getElementById("nome").value;
        var sobrenome = document.getElementById("sobrenome").value;
        var usuario = document.getElementById("usuario").value;
        var senha = document.getElementById("senha").value;
        var cargo = document.getElementById("cargo").value;
        
        if(document.getElementById("inativo").checked){
            inativo = 'S'
        }else{
            inativo = 'N';
        }

        var codigo = document.getElementsByName("salvar").id;
        
        $.ajax({
            type: 'POST',
            url: 'Control/CadEditusuario.php',
            data: {"id": codigo, "nome": nome, "sobrenome": sobrenome, "usuario": usuario, "senha": senha, "cargo": cargo, "inativo": inativo },
            success: function(response) {    
                    console.log(response);
                    if(response == ""){
                        swal("Sucesso!", "Operação realizado com sucesso!", "success", {closeOnClickOutside: false}
                            ).then(function(){
                                $("#exampleModal").modal("hide");    
                                atualizarTabela();
                            });
                    }else{
                        swal("Erro!", "Não foi possível realizar a operação! \n\n"+"Mensagem original: "+response, "error", {closeOnClickOutside: false}
                            ).then(function(){
                                $("#exampleModal").modal("hide");
                            });                 
                    }
                }, error: function(response) {
                    swal("Erro!", "Não foi possível realizar a operação!", "error", {closeOnClickOutside: false}
                            ).then(function(){
                                $("#exampleModal").modal("hide");
                            });     
                }
        });   
    }
</script>

<script>
    function deletarUsuario(){
       console.log(document.getElementsByName("excluir").id);

        var codigo = document.getElementsByName("excluir").id;

        $.ajax({
            type: 'POST',
            url: 'Control/DelUsuario.php',
            data: {'id': codigo },
            success: function(response) {    
                    console.log(response);
                    if(response == ""){
                        swal("Sucesso!", "Operação realizado com sucesso!", "success", {closeOnClickOutside: false}
                            ).then(function(){
                                $("#exampleModal1").modal("hide");
                                atualizarTabela();
                            });
                    }else{
                        swal("Erro!", "Não foi possível realizar a operação! \n\n"+"Mensagem original: "+response, "error", {closeOnClickOutside: false}
                            ).then(function(){
                                $("#exampleModal1").modal("hide");
                            });                 
                    }
                }, error: function(response) {
                    swal("Erro!", "Não foi possível realizar a operação!", "error", {closeOnClickOutside: false}
                            ).then(function(){
                                $("#exampleModal1").modal("hide");
                            });     
                }
        });   
    }
</script>

<script>
    $(document).ready(function(){
        var nomeBox;
        var sql;

        sql = 'Select id, nome from cargo';
        nomeBox = 'cargo';
        
        $.getJSON("Control/getJsonDAO.php?sql="+sql, function(data){
            popularComboBox(data.data, nomeBox);         
        });
    });
</script>

<script>
    function popularComboBox(opcoes, nomeBox){
        var select = document.getElementById(nomeBox);

        for(i = 0 ; i < opcoes.length ; i++){
            var option = document.createElement("option");
            
            option.value = opcoes[i][0];
            option.id = opcoes[i][1];
            option.text = opcoes[i][1];

            select.add(option, select.options[i]);
        } 
    }         
</script>

<script>
 $(document).ready(function(){
        
        var sql = "SELECT usuario.id, usuario.nome, usuario.sobrenome, usuario.usuario, cargo.nome as cargo, usuario.inativo FROM usuario inner join cargo ON usuario.cargo = cargo.id ";
        
        popularDataTables(sql);         
        
    });
</script> 

<script>
    function popularDataTables(sql){

        table = $('#dataTable').DataTable({
                        "ajax": "Control/getJsonDAO.php?sql="+sql,
                        "columns": [
                            { "data": "id" },
                            { "data": "nome" },
                            { "data": "sobrenome" },
                            { "data": "cargo" },
                            { "data": "usuario" },
                            {   
                                "mRender": function( oObj ) {
                                    if(oObj == 'S'){
                                        return '<div class="form-check"><input id="inativar" type="checkbox" class="form-check-input" data-toggle="modal" data-target="#exampleModal2" checked></div>';
                                    }else{
                                        return '<div class="form-check"><input id="inativar" type="checkbox" class="form-check-input" data-toggle="modal" data-target="#exampleModal2"></div>';
                                    }  
                                }   
                            },
                            { 
                                data: null,
                                className: "center",
defaultContent: '<button type="button" class="btn btn-sm btn-success" id="editar" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"><i class="fa fa-pencil"></i> Editar</button> <button type="button" class="btn btn-sm btn-danger" id="deletar" data-toggle="modal" data-target="#exampleModal1" data-whatever="@fat"><i class="fa fa-trash"></i> Excluir</button>'
                            }
                        ],
                        "language": {
                            "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
                        }
                });
    }
</script>

<script>
    function atualizarTabela(){
        table.ajax.reload();
    }
</script>

<script>
    // Função Inativar
    $('#dataTable tbody').on('click', 'tr', function () {         
        var linha = table.row(this).index();
        
        var codigo = table.cell(linha, 0).data();
        var inativo = table.cell(linha, 5).data();

        if(inativo == 'S'){
            document.getElementById("mensagemInativo").innerHTML = "Deseja ativar este usuário?";            
            inativo = 'N';
        }else{
            document.getElementById("mensagemInativo").innerHTML = "Deseja inativar este usuário?";
            inativo = 'S'
        }
        
        document.getElementsByName("Inativar").id = codigo;
        document.getElementsByName("Inativar").title = inativo;

    });  

    function voltarStatusInativo(){
        atualizarTabela();
    }
    
    function inativar(){
        var codigo = document.getElementsByName("Inativar").id; 
        
        var inativo = document.getElementsByName("Inativar").title;
        
        $.ajax({
            type: 'POST',
            url: 'Control/updateInativo.php',
            data: {'id': codigo, 'inativo': inativo },
            success: function(response) {    
                    console.log(response);
                    if(response == ""){
                        swal("Sucesso!", "Operação realizado com sucesso!", "success", {closeOnClickOutside: false}
                            ).then(function(){
                                $("#exampleModal2").modal("hide");
                                atualizarTabela();
                            });
                    }else{
                        swal("Erro!", "Não foi possível realizar a operação! \n\n"+"Mensagem original: "+response, "error", {closeOnClickOutside: false}
                            ).then(function(){
                                $("#exampleModal2").modal("hide");
                            });                 
                    }
                }, error: function(response) {
                    swal("Erro!", "Não foi possível realizar a operação!", "error", {closeOnClickOutside: false}
                            ).then(function(){
                                $("#exampleModal2").modal("hide");
                            });     
                }
        });
    }
</script>
