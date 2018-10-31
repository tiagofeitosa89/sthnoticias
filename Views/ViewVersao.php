<script>
    var table = null;
</script>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#" onclick="carregarPagina('Views/cards.php')">Provedores</a>
    </li>
    <li class="breadcrumb-item active">Versões</li>
    </ol>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Versões
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat" id="adicionar">Adicionar</button>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Versão</th>
                            <th>Criação</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>        
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>               
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Código</th>
                            <th>Versão</th>
                            <th>Criação</th>
                            <th>Opções</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    <!-- Modal de cadastro e alteração de versão -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova versão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="control-label required">Versão<sup style="color:red">*</sup></label>
                        <input id="versao" name="versao" class="form-control input-lg" placeholder="Versão" tabindex="2" maxlength="12" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" name="salvar" id="" onclick="salvarVersao()">Salvar</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal de exclusão de versões -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1"> Excluir versão </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mensagem">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" name="excluir" id="" onclick="deletarVersao()">Excluir</button>
            </div>
            </div>
        </div>
    </div>

<!-- Page level plugin JavaScript-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $('#adicionar').on('click', function(){
        document.getElementById("exampleModalLabel").innerHTML = 'Adicionar versão';
        document.getElementById("versao").value = "";
        document.getElementsByName("salvar").id = "";
    });  
</script>

<script>
        // Função de alterar
        $('#dataTable tbody').on('click', 'tr', function () {        
            var linha = table.row(this).index();
            var codigo = table.cell(linha, 0).data();
            var versao = table.cell(linha, 1).data();
            
            document.getElementById("exampleModalLabel").innerHTML = 'Editar versão';
            document.getElementById("versao").value = versao;
            document.getElementsByName("salvar").id = codigo; 
        } );

</script>

<script>
        // Função de deletar
        $('#dataTable tbody').on('click', 'tr', function () {        
            var linha = table.row(this).index();
            var codigo = table.cell(linha, 0).data();
            var versao = table.cell(linha, 1).data(); 

            document.getElementById("mensagem").innerHTML = "Deseja realmente excluir a versão "+codigo+" - "+versao+"?";
            document.getElementsByName("excluir").id = codigo;
        });
    
</script>

<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<script>
    function salvarVersao(){
        var nome = document.getElementById("versao").value;
        var codigo = document.getElementsByName("salvar").id;
        
        console.log(codigo);

        $.ajax({
            type: 'POST',
            url: 'Control/CadEditVersao.php',
            data: {'id': codigo, 'versao': nome },
            success: function(response) {    
                    console.log(response);
                    if(response == ""){
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
    function deletarVersao(){
       console.log(document.getElementsByName("excluir").id);

        var codigo = document.getElementsByName("excluir").id;

        $.ajax({
            type: 'POST',
            url: 'Control/DelVersao.php',
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
 $(document).ready(function(){
        var sql = "Select * from versao";
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
                            { "data": "data_criacao" },
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