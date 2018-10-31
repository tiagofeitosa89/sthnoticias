<?php
    include_once("../../../Control/LeiameDAO.php");

    function Gerar($pagina){
        $inicio = 0;
        $final = 4;
        $TotalRegistros = 0;
        $TotalPaginas = 0;
        $noticias = array();
        $sqlTotal = "Select count(*) as total from noticia";

        $objLeiameDAO = new LeiameDAO();
        
        $TotalRegistros = $objLeiameDAO->selecionar($sqlTotal); 
        
        $TotalPaginas = (int) ($TotalRegistros[0]['total'] / 4);
        
        if(($TotalRegistros[0]['total'] % 4) > 0){
            $TotalPaginas++; 
        }

        if($pagina > 2){
            $inicio = (($pagina * 4) - 4);
        }else if($pagina == 2){
            $inicio = 4;
        }

        $sql = "select * from noticia where status = 'S' order by id desc limit ".$inicio.",".$final;

        $dados['pagina'] = $pagina;
        $dados['total_registros'] = $TotalRegistros[0];
        $dados['total_paginas'] = $TotalPaginas;
        
        $resultados = $objLeiameDAO->selecionar($sql);

        if(($resultados != 0) && (count($resultados) > 0)){
            $dados['resultados'] = $resultados; 
        }else{
            $dados['resultados'] = []; 
        }
        
        array_push($noticias, $dados);
        
        unset($objLeiameDAO);
        
        return json_encode($noticias);
    }

    //echo Gerar(1);
?>