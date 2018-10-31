<?php
    if(isset($_POST['id']) && !empty($_POST['id'])){
        include_once("LeiameDAO.php");

        $id = $_POST['id'];

        $objLeiameDAO = new LeiameDAO();

        $retorno = $objLeiameDAO->deletar($id);

        echo $retorno;
    }

?>