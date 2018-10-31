<?php
    include_once("GerarJsonNoticias.php");

    if (!array_key_exists('pagina', $_GET)){
        echo 'Error. Path missing.';
        exit;
    }

    $pagina = explode('/', $_GET['pagina']);

    if (count($pagina) == 0 || $pagina[0] == ""){
        echo 'Error. Path missing.';
        exit;
    }

    header('Content-type: application/json');

    // Criar arquivo json 
    echo Gerar($pagina[0]);
    
    //echo $conteudo;

    /*$id = "";

    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }

    $pagina = "";
    
    if(count($path) > 1){
        $pagina = $path[1];
    }*/

    //$conteudo = file_get_contents('DB.json');

    //$json = json_decode($conteudo, true);

    //$metodo = $_SERVER['REQUEST_METHOD'];
    
    //$body = file_get_contents('php://input');

    //include_once("ClasseServeNoticias.php");

   // $Servidor = new ClasseServeNoticias($metodo, $json, $body, $pagina, $path, $id);
    //$Servidor->runRequisicao();

?>