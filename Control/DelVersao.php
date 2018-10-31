<?php
    if(isset($_POST['id']) && !empty($_POST['id'])){
        include_once("VersaoDAO.php");

        $id = $_POST['id'];

        $objVersaoDAO = new VersaoDAO();

        $objVersaoDAO->deletar($id);
    }

?>