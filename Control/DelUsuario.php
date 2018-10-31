<?php
    if(isset($_POST['id']) && !empty($_POST['id'])){
        include_once("UsuarioDAO.php");

        $id = $_POST['id'];

        $objUsuarioDAO = new UsuarioDAO();

        $objUsuarioDAO->deletar($id);
    }

?>