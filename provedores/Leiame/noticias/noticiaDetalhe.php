<?php
    include_once("../../../Control/LeiameDAO.php");

    if(!empty($_GET["id"]) && isset($_GET["id"])){
        $id = $_GET["id"];

        $objLeiameDAO = new LeiameDAO();

        $sql = 'Select * from noticia where id = '.$id;

        $noticia = $objLeiameDAO->selecionar($sql);

        echo json_encode($noticia);
    }else{
        exit;    
    }
?>