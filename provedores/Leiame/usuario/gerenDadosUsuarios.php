<?php
    include_once("../../../Control/conexao.php");
    include_once("mobUsuario.php");
    include_once("mobUsuarioDAO.php");

    $json = file_get_contents('php://input');   
    $obj = json_decode($json);
    $key = strip_tags($obj->key);

    $retorno = "";

    $objUsuario = new mobUsuario();

    $objUsuarioDAO = new mobUsuarioDAO();

    switch ($key) {
        case 'insert':
            $objUsuario->setNome($obj->nome);
            $objUsuario->setUsuario($obj->usuario);
            $objUsuario->setSenha(md5($obj->senha));
            $objUsuario->setEmail($obj->email);

            $retorno = $objUsuarioDAO->inserir($objUsuario);        
            
            break;
        case 'update':
            $objUsuario->setNome($obj->nome);
            $objUsuario->setUsuario($obj->usuario);
            $objUsuario->setSenha(md5($obj->senha));
            $objUsuario->setEmail($obj->email);
            $objUsuario->setInativo($obj->inativo);
            $objUsuario->setId($obj->id);

            $retorno = $objUsuarioDAO->alterar($objUsuario);            
            
            break;
        case 'delete':
            $retorno = $objUsuarioDAO->deletar($obj->id);        
            break;    
        default:
            # code...
            break;
    }

    unset($objUsuario);
    unset($objUsuarioDAO);

    echo $retorno;

?>