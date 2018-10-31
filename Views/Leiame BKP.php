<script>
    var noticias = new Array();
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
            <i class="fas fa-table"></i>Notícias
            <a href="#" onclick="carregarPagina('Views/CadNoticiaLeiame.php')")>
            <button class="btn btn-primary pull-right" style="margin-top:20px;" data-toggle="modal" data-target= "#item_add">
                <i class="fa fa-plus"></i>
                 Adicionar
            </button></a>         
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
                            <th>Retorno</th>
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
                            <th>Retorno</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

<!-- Page level plugin JavaScript-->
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<script>
    $(document).ready(function(){
        $.getJSON("provedores/Leiame/noticias/DB.json", function(data){
            var objeto_retorno = data.noticias;

            for(i = 1; i < objeto_retorno.length; i++){
                for(j = 0; j < objeto_retorno[i].resultados.length; j++){
                    noticias.push(objeto_retorno[i].resultados[j]);
                }
            } 
            popularDataTables(noticias);         
        });
    });
</script> 

<script>
    function popularDataTables(json){
        $('#dataTable').DataTable({
                        "aaData": json,
                        "aoColumns": [
                            { "mDataProp": "id" },
                            { "mDataProp": "titulo" },
                            { "mDataProp": "versao" },
                            { "mDataProp": "data" },
                            { "mDataProp": "relator" },
                            { "mDataProp": "programador" },
                            { "mDataProp": "teste" },
                            { "mDataProp": "retorno" }
                            ],
                        "language": {
                            "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
                        },
                });
    }
</script>