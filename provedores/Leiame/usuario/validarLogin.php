<?php
    include_once("mobUsuarioDAO.php");

    $usuario = $_GET['usuario'];
    $senha = $_GET['senha'];
    
    $sql = 'Select * from mobusuario where usuario = "'.$usuario.'" and senha = "'.$senha.'"';
    
    $objUsuarioDAO = new mobUsuarioDAO();

    $retorno = $objUsuarioDAO->selecionar($sql);
    
    if(!empty($retorno)){
        $valido = 'S';
    }else{
        $valido = 'N';
    }
    
    unset($objUsuarioDAO);
    
    echo $valido;
?>