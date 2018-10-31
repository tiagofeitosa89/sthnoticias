<script>
    var table = null;
</script>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#" onclick="carregarPagina('Views/cards.php')">Provedores</a>
    </li>
    <li class="breadcrumb-item active">Leiame</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Notícias
            <button type="button" id="adicionar" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Adicionar</button>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Versão</th>
                            <th>Data</th>
                            <th>Relator</th>
                            <th>Programador</th>
                            <th>Teste</th>
                            <th>Caso</th>
                            <th>Solução</th>
                            <th>Publicar</th>
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
                            <td></td>
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
                            <th>Título</th>
                            <th>Versão</th>
                            <th>Data</th>
                            <th>Relator</th>
                            <th>Programador</th>
                            <th>Teste</th>
                            <th>Caso</th>
                            <th>Solução</th>
                            <th>Publicar</th>
                            <th>Opções</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    <!-- Modal para cadastro e edição de notícias -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova notícia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="control-label required">Título<sup style="color:red">*</sup></label>
                        <input id="titulo" name="titulo" class="form-control input-lg" placeholder="Título" tabindex="2" maxlength="60" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label required">Versão<sup style="color:red">*</sup></label>
                        <select id="versao" name="versao"  class="form-control input-lg"  placeholder="Versão" tabindex="2" required>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label required">Relator<sup style="color:red">*</sup></label>
                        <select id="relator" name="relator"  class="form-control input-lg"  placeholder="Relator" tabindex="2" required>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label required">Programador<sup style="color:red">*</sup></label>
                        <select id="programador" name="programador"  class="form-control input-lg"  placeholder="Programador" tabindex="2" required>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label required">Teste<sup style="color:red">*</sup></label>
                        <select id="teste" name="teste"  class="form-control input-lg"  placeholder="Teste" tabindex="2" required>
                            
                        </select>
                    </div>    

                    <div class="form-group">
                        <label class="control-label required">Caso<sup style="color: red">*</sup></label><br>
                        <textarea id="caso"></textarea>
                    </div>    
                    
                    <div class="form-group">
                        <label class="control-label required">Solução<sup style="color: red">*</sup></label><br>
                        <textarea id="solucao"></textarea>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="CheckStatus">
                        <label class="form-check-label" for="exampleCheck1">Publicar</label>
                    </div>        
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" name="salvar" id="" onclick="salvarNoticia()">Salvar</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal para exclusão de notícia -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"> Excluir notícia </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mensagemExclusao">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelarExcluir" style="display: block;">Cancelar</button>
                <button type="button" class="btn btn-primary" id="excluir" name="" onclick="deletarNoticia()" style="display: block;">Excluir</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal para confirmar ação de publicar notícia -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Confirmação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mensagemStatus">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="voltarStatusCheck()">Cancelar</button>
                <button type="button" class="btn btn-primary" name="publicar" id = "" title = ""  onclick = "publicarNoticia()">Confirmar</button>
            </div>
            </div>
        </div>
    </div>



<!-- Page level plugin JavaScript-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $('#adicionar').on('click', function(){
        document.getElementById("exampleModalLabel").innerHTML = 'Adicionar notícia';
        document.getElementById("titulo").value = "";
        document.getElementById("versao").options.selectedIndex = 0;
        document.getElementById("relator").options.selectedIndex = 0;
        document.getElementById("programador").options.selectedIndex = 0;
        document.getElementById("teste").options.selectedIndex = 0;
        document.getElementById("caso").value = "";
        document.getElementById("solucao").value = ""; 
        document.getElementById("CheckStatus").checked = false;
        document.getElementsByName("salvar").id = "";
    });  
</script>

<script>
    // Editar
    $('#dataTable tbody').on('click', 'tr', function () { 
        var linha = table.row(this).index();
        var codigo = table.cell(linha, 0).data();
        var titulo = table.cell(linha, 1).data();
        var versao = table.cell(linha, 2).data();
        var relator = table.cell(linha, 4).data();
        var programador = table.cell(linha, 5).data();
        var teste = table.cell(linha, 6).data();
        var caso = table.cell(linha, 7).data();
        var solucao = table.cell(linha, 8).data();
        var status = table.cell(linha, 9).data();
        
        document.getElementById("exampleModalLabel").innerHTML = 'Editar notícia';
        document.getElementById("titulo").value = titulo;
        document.getElementById("versao").options.namedItem(versao).selected = true;
        document.getElementById("relator").options.namedItem(relator).selected = true;
        document.getElementById("programador").options.namedItem(programador).selected = true;
        document.getElementById("teste").options.namedItem(teste).selected = true;
        document.getElementById("caso").value = caso;
        document.getElementById("solucao").value = solucao; 
        
        if(status == 'S'){
            document.getElementById("CheckStatus").checked = true;
        }else{
            document.getElementById("CheckStatus").checked = false;
        }
        
        document.getElementsByName("salvar").id = codigo; 

        console.log(titulo);
        console.log(document.getElementsByName("salvar").id);

    });  
</script>

<script>
    // Deletar
    $('#dataTable tbody').on('click', 'tr', function () { 
        var linha = table.row(this).index();
        var codigo = table.cell(linha, 0).data();
        var titulo = table.cell(linha, 1).data(); 
        var status = table.cell(linha, 9).data();
        
        document.getElementById("exampleModalLabel1").innerHTML = "Excluir notícia";
        document.getElementById("excluir").style.display = "block";
        document.getElementById("cancelarExcluir").innerHTML = "Cancelar";

        if(status == 'S'){
            document.getElementById("exampleModalLabel1").innerHTML = "Informação";
            document.getElementById("mensagemExclusao").innerHTML = "Não é possível excluir uma notícia já publicada!";
            
            document.getElementById("excluir").style.display = "none";
            document.getElementById("cancelarExcluir").innerHTML = "Ok";
            
        }else{
            document.getElementById("mensagemExclusao").innerHTML = "Deseja realmente excluir a notícia "+codigo+" - "+titulo+"?";
            document.getElementById("excluir").name = codigo;
       }
   });
</script>

<script>
    // Função Publicar
    $('#dataTable tbody').on('click', 'tr', function () { 
        var linha = table.row(this).index();
        var codigo = table.cell(linha, 0).data();
        var status = table.cell(linha, 9).data();
        
        document.getElementsByName("publicar").id = codigo;
        document.getElementsByName("publicar").title = status;  

        console.log(codigo);
        console.log(status);

        if(status == 'S'){
            document.getElementById('mensagemStatus').innerHTML = 'Deseja ocultar esta notícia?';
        }else{
            document.getElementById('mensagemStatus').innerHTML = 'Deseja publicar esta notícia?';
        }
    });

    function voltarStatusCheck(){
        atualizarTable();
    }

</script>

<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<script>
    function salvarNoticia(){
        var codigo, titulo, versao, relator, programador, teste, caso, solucao, status;
        
        titulo = document.getElementById("titulo").value;
        versao = document.getElementById("versao").value;
        relator = document.getElementById("relator").value;
        programador = document.getElementById("programador").value;
        teste = document.getElementById("teste").value;
        caso = document.getElementById("caso").value;
        solucao = document.getElementById("solucao").value;

        if(document.getElementById("CheckStatus").checked){
            status = 'S';
        }else{
            status = 'N'
        }

        codigo = document.getElementsByName("salvar").id;
        
        console.log(titulo);
        console.log(versao);
        console.log(relator);
        console.log(programador);
        console.log(teste);
        console.log(caso);
        console.log(solucao);
        console.log(status);
        console.log(codigo);

        $.ajax({
            type: 'POST',
            url: 'Control/CadEditNoticia.php',
            data: {"id": codigo, "titulo": titulo, "versao": versao, "relator": relator, "programador": programador, "teste": teste, "caso": caso,
                   "solucao": solucao, "status": status },
                success: function(response) {    
                    if (response == ''){
                        swal("Sucesso!", "Operação realizado com sucesso!", "success", {closeOnClickOutside: false}
                            ).then(function(){
                                $("#exampleModal").modal("hide");
                                atualizarTable();
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
    function deletarNoticia(){
        console.log(document.getElementById("excluir").name);

        var codigo = document.getElementById("excluir").name;

        $.ajax({
            type: 'POST',
            url: 'Control/DelNoticia.php',
            data: {'id': codigo },
            success: function(response) {    
                    console.log(response);
                    if(response == ""){
                        swal("Sucesso!", "Operação realizado com sucesso!", "success", {closeOnClickOutside: false}
                            ).then(function(){
                                $("#exampleModal1").modal("hide");
                                atualizarTable();
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
    function publicarNoticia(){
        var codigo, status;

        codigo = document.getElementsByName("publicar").id;
        status = document.getElementsByName("publicar").title;

        console.log(status);
        console.log(codigo);


        if(status == 'S'){
            status = 'N';
        }else{
            status = 'S';
        }

        $.ajax({
            type: 'POST',
            url: 'Control/updatePublicarNoticia.php',
            data: { 'id': codigo, 'status': status },
            success: function(response) {    
                    console.log(response);
                    if(response == ""){
                        swal("Sucesso!", "Operação realizado com sucesso!", "success", {closeOnClickOutside: false}
                            ).then(function(){
                                $("#exampleModal2").modal("hide");
                                atualizarTable();
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


<script>
    $(document).ready(function(){
        var sql;

        sql = 'Select nome from versao';
        
        $.getJSON("Control/getJsonDAO.php?sql="+sql, function(data){
            //console.log(data.data);
            popularComboBox(data.data, 'versao');         
        });

        sql = "Select nome from usuario where inativo <> 'S' ";
        
        $.getJSON("Control/getJsonDAO.php?sql="+sql, function(data){
            //console.log(data.data);
            popularComboBox(data.data, 'relator');         
        }); 

        sql = "Select nome from usuario where cargo = 2 and inativo <> 'S' ";
    
        $.getJSON("Control/getJsonDAO.php?sql="+sql, function(data){
            //console.log(data);
            popularComboBox(data.data, 'programador');         
        });

        sql = "Select nome from usuario where cargo = 7 and inativo <> 'S' ";
        
        $.getJSON("Control/getJsonDAO.php?sql="+sql, function(data){
            //console.log(data);
            popularComboBox(data.data, 'teste');         
        });

    });
</script>

<script>
    function popularComboBox(opcoes, nomeBox){
        var select = document.getElementById(nomeBox);
        console.log(nomeBox);
        console.log(opcoes.length);
        for(i = 0 ; i < opcoes.length ; i++){
            var option = document.createElement("option");
            
            option.value = opcoes[i][0];
            option.id = opcoes[i][0];
            option.text = opcoes[i][0];

            select.add(option, select.options[i]);
        } 
    }         
</script>


<script>
   $(document).ready(function(){
        var sql = 'Select id, titulo, versao, data_publicacao, relator, programador, teste, caso, solucao, status from noticia';
        popularDataTables(sql);         
    });
</script> 

<script>
    function popularDataTables(sql){
        table = $('#dataTable').DataTable({
                        "ajax": "Control/getJsonDAO.php?sql="+sql,
                        "columns": [
                            { "data": "id" },
                            { "data": "titulo" },
                            { "data": "versao" },
                            { "data": "data_publicacao" },
                            { "data": "relator" },
                            { "data": "programador" },
                            { "data": "teste" },
                            { "data": "caso" },
                            { "data": "solucao" },
                            {   
                                "mRender": function( oObj ) {
                                    if(oObj == 'S'){
                                        return '<div class="form-check"><input id="status" type="checkbox" class="form-check-input" data-toggle="modal" data-target="#exampleModal2" checked></div>';
                                    }else{
                                        return '<div class="form-check"><input id="status" type="checkbox" class="form-check-input" data-toggle="modal" data-target="#exampleModal2"></div>';
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
    function atualizarTable(){
        table.ajax.reload();
    }
</script>
