<?php
    if(isset($_POST['id']) && !empty($_POST['id'])){
        include_once('UsuarioDAO.php');
        
        $id = $_POST['id'];
        $inativo = $_POST['inativo'];

        $retorno = "";

        $objUsuarioDAO  = new UsuarioDAO();
        $retorno = $objUsuarioDAO->updateInativo($id, $inativo);

        unset($objUsuarioDAO);

        echo $retorno;
    }
?>