<?php
    if (isset($_POST['versao']) && !empty($_POST['versao'])){
    
        include_once("Versao.php");
        include_once("VersaoDAO.php");

        $versao = $_POST['versao'];
        $id = $_POST['id'];
        
        $objVersao = new Versao($versao);

        $objVersaoDAO = new VersaoDAO();

        $retorno = "";

        if (!empty($id)){
            $objVersao->setId($id);
            $retorno = $objVersaoDAO->alterar($objVersao);
        }else{
            $retorno = $objVersaoDAO->inserir($objVersao);
        }

        unset($objVersao);
        unset($objVersaoDAO);

        echo $retorno;
    }
?>