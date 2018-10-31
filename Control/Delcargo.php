<?php
    if(isset($_POST['id']) && !empty($_POST['id'])){
        include_once("CargoDAO.php");

        $id = $_POST['id'];

        $objCargoDAO = new CargoDAO();

        $objCargoDAO->deletar($id);
    }

?>