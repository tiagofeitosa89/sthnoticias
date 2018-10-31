<?php
    if(isset($_POST['id']) && !empty($_POST['id'])){
        include_once('LeiameDAO.php');
        
        $id = $_POST['id'];
        $status = $_POST['status'];

        $objLeiameDAO  = new LeiameDAO();
        $retorno = $objLeiameDAO->updatePublicar($id, $status);

        unset($objLeiameDAO);

        echo $retorno;
    }
?>