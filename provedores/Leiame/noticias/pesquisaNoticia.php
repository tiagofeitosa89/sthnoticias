<?php
    include_once("../../../Control/LeiameDAO.php");

    if(isset($_GET["palavra"]) && !empty($_GET["palavra"])){
        $palavra = $_GET["palavra"];
        $pagina = $_GET["pagina"];
        $inicio = 0;
        $final = 2;

        if($pagina > 2){
            $inicio = (($pagina * 2) - 2);
        }else if($pagina == 2){
            $inicio = 2;
        }

        $sql = 'Select id, titulo, versao from noticia where versao LIKE "%'.$palavra.'%" or 
                titulo LIKE "%'.$palavra.'%" limit '.$inicio.','.$final;

        $objLeiameDAO = new LeiameDAO();

        $retorno = $objLeiameDAO->selecionar($sql);

        $total_paginas = (int) (count($retorno)/2);

        if((count($retorno) % 2) > 0 ){
            $total_paginas++;    
        }

        if(($retorno != 0) && (count($retorno) > 0)){
            $dados['total_resultados'] = count($retorno);
            $dados['total_paginas'] = $total_paginas;
            $dados['resultados'] = $retorno;
        }else{
            $dados['total_resultados'] = 0;
            $dados['total_paginas'] = 0;
            $dados['resultados'] = [];
        }

        echo json_encode($dados);
    }else{
        $dados['quantidade'] = 0;
        $dados['total_paginas'] = 0;
        $dados['resultados'] = [];
        
        echo json_encode($dados);
    }
?>