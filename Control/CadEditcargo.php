<?php
    if (isset($_POST['cargo']) && !empty($_POST['cargo'])){
    
        include_once("cargo.php");
        include_once("cargoDAO.php");

        $cargo = $_POST['cargo'];
        $id = $_POST['id'];
        
        $objCargo = new Cargo($cargo);

        $objCargoDAO = new CargoDAO();

        $retorno = "";

        if (!empty($id)){
            $objCargo->setId($id);
            $retorno = $objCargoDAO->alterar($objCargo);
        }else{
            $retorno = $objCargoDAO->inserir($objCargo);
        }

        unset($objCargo);
        unset($objCargoDAO);

        echo $retorno;
    }else{
        $retorno = "O campo cargo não pode ser vazio!";
        echo $retorno;    
    }
?>