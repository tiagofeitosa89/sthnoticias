<?php
    if (!empty($_POST['titulo']) && !empty($_POST['caso']) && !empty($_POST['solucao']) && !empty($_POST['status'])){
    
        include_once("Leiame.php");
        include_once("LeiameDAO.php");

        $id = $_POST['id'];
        
        $titulo = $_POST['titulo'];
        $versao = $_POST['versao'];
        $relator = $_POST['relator'];
        $programador = $_POST['programador'];
        $teste = $_POST['teste'];
        $caso = $_POST['caso'];
        $solucao = $_POST['solucao'];
        $status = $_POST['status'];
         
        $objLeiame = new Leiame();
        $objLeiame->setTitulo($titulo);
        $objLeiame->setVersao($versao);
        $objLeiame->setRelator($relator);
        $objLeiame->setProgramador($programador);
        $objLeiame->setTeste($teste);
        $objLeiame->setCaso($caso);
        $objLeiame->setSolucao($solucao);
        $objLeiame->setStatus($status);

        $objLeiameDAO = new LeiameDAO();

        $retorno = "";

        if (!empty($id)){
            $objLeiame->setId($id);
            $retorno = $objLeiameDAO->alterar($objLeiame);
        }else{
            $retorno = $objLeiameDAO->inserir($objLeiame);
        }

        unset($objLeiame);
        unset($objLeiameDAO);

        echo $retorno;
        
    }
?>