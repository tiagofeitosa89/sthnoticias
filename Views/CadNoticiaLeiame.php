<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#" onclick="carregarPagina('Views/cards.php')">Provedores</a>
    </li>
    <li class="breadcrumb-item active">Leiame</li>
    <li class="breadcrumb-item active">Adicionar</li>
</ol>

<div class="card card-register mx-auto mt-5"> 

    <div class="card-body">
        <form>
            <div class="form-group">
            <div class="form-row">
                <label class="control-label required">Título<sup style="color:red">*</sup></label>
                <input id="titulo" name="titulo" class="form-control input-lg"  placeholder="Título" tabindex="2" maxlength="60" required>
            </div>
            </div>
            <div class="form-group">
            <div class="form-row">
                <label class="control-label required">Versão<sup style="color:red">*</sup></label>
                <input id="versao" name="versao" class="form-control input-lg"  placeholder="Versão" tabindex="2" maxlength="8" required>
            </div>
            </div>
            <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label class="control-label required">Relator<sup style="color:red">*</sup></label>
                <input id="relator" name="relator" class="form-control input-lg"  placeholder="Relator" tabindex="2" maxlength="100" required>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label class="control-label required">Programador<sup style="color:red">*</sup></label>
                <input id="programador" name="programador" class="form-control input-lg" placeholder="Programador" tabindex="2" maxlength="100" required>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label class="control-label required">Teste<sup style="color:red">*</sup></label>
                <input id="teste" name="teste" class="form-control input-lg" placeholder="Teste" tabindex="2" maxlength="100" required>
                </div>
            </div>
            </div>

            <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label class="control-label required">Caso<sup style="color: red">*</sup></label><br>
                <textarea id="summernote" name="caso"><p>Escreva a história aqui...</p></textarea>
                </div>
            </div>
            </div>        

            <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label class="control-label required">Solução<sup style="color: red">*</sup></label><br>
                <textarea id="summernote" name="solucao"><p>Escreva a história aqui...</p></textarea>
                </div>
            </div>
            </div> 

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="retorno" name="retorno">
                <label class="form-check-label" for="exampleCheck1">Retornado</label>
            </div>

            <div class="form-group">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                <input type="submit" name="registrar" id="registrar" tabindex="4" class="form-control btn btn-primary"
                onclick="Registrar()"  value="Registrar">
                </div>
            </div>
            </div>
        </form>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function Registrar(){
        var data = new Date();
        var retorno;
        if(document.getElementById("retorno").checked){
            retorno = 'S';
        }else{
            retorno = 'N';
        }

        var dados = {
            id: data.getTime(),
            titulo: document.getElementById("titulo").value,
            versao: document.getElementById("versao").value,
            data: data.toLocaleDateString() +' '+ data.toLocaleTimeString(),
            relator: document.getElementById("relator").value,
            programador: document.getElementById("programador").value,
            teste: document.getElementById("teste").value,
            caso: document.getElementsByName("caso").value,
            solucao: document.getElementsByName("solucao").value,
            retorno: retorno, 
        }

        $.ajax({
            type: 'post',
            url: 'provedores/Leiame/noticias/serveNoticia.php?path=noticias',
            dataType: 'json',
            contentType: 'application/json',
            data: JSON.stringify(dados),
            success: function(response) {
                swal("Sucesso!", "Operação realizada com sucesso!", "success", {closeOnClickOutside: false}
                            ).then(function(){
                                window.location.href = "Leiame.php";
                            });
            }    
        });

    }
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

<script>
    $('#summernote').summernote({
        tabsize: 2,
        height: 200
      });
</script> -->