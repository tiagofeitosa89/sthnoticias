<?php
    if (!empty($_POST["nome"]) && !empty($_POST["sobrenome"]) && !empty($_POST["usuario"]) && 
        !empty($_POST["cargo"]) && !empty($_POST["inativo"])){
        
        include_once("Usuario.php");
        include_once("UsuarioDAO.php");

        $Usuario = $_POST['usuario'];
        $senha = md5($_POST['senha']);
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cargo = $_POST['cargo'];
        $inativo = $_POST['inativo'];

        $id = $_POST['id'];

        $objUsuario = new Usuario($nome, $sobrenome, $Usuario, $senha, $cargo, $inativo);

        $objUsuarioDAO = new UsuarioDAO();

        $retorno = "";

        if (!empty($id)){
            $objUsuario->setId($id);
            $retorno = $objUsuarioDAO->alterar($objUsuario);
        }else{
            $retorno = $objUsuarioDAO->inserir($objUsuario);
        }

        unset($objUsuario);
        unset($objUsuarioDAO);

        echo $retorno;
    }
?>