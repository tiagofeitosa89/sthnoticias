<?php
    include_once("conexao.php");

    function getJSON($sql){
        try{
            $stmt = Conexao::getConexao()->prepare($sql);

            $stmt->execute();

            $resultado = $stmt->fetchAll();
            
            $dados["data"] = $resultado;
            //file_put_contents('DB.json', json_encode($dados));    

            return json_encode($dados);

        } catch(PDOException $e){
            echo $e->getMessage();
        }

        return [];    
    }

    if (isset($_GET['sql']) || !empty($_GET['sql'])){
        $sql = $_GET['sql']; 
        echo getJSON($sql);
    }

?>