<?php
    class ClasseServeNoticias{
        private $metodo;
        private $json;
        private $body;
        private $pagina;
        private $path;
        private $id;

        private $totalPagina;
        private $totalResultados;

        public function ClasseServeNoticias($metodo, $json, $body, $pagina, $path, $id){
            $this->metodo = $metodo;
            $this->json = $json;
            $this->body = $body;
            $this->pagina = $pagina;
            $this->path = $path;
            $this->id = $id;
        }

        private function GET(){
            
            if(!$this->json[$this->path[0]]){
                header('Location: ../Views/404.html');
                exit;
            }

            if($this->pagina == ""){
                echo json_encode($this->json[$this->path[0]]);
                exit;
            }

            $encontrado = $this->FindByPagina($this->json[$this->path[0]], $this->pagina);

            if($encontrado >= 0){   
                //echo count($this->json[$this->path[0]][$encontrado]['resultados']);
                echo json_encode($this->json[$this->path[0]][$encontrado]);
                //echo json_encode($this->json[$this->path[0]][$encontrado]['resultados']);
            }else{
                header('Location: ../Views/404.html');
                exit;   
            }
        }

        private function POST(){
            $jsonBody = json_decode($this->body, true); 

            if(!$this->json[$this->path[0]]){
                $this->json[$this->path[0]] = [];
            }
            
            $ultimaPagina = -1;
            
            $inforBanco = FindByPagina($this->json[$this->path[0]], -1);
            
            if($inforBanco){
                $this->totalPagina = $this->json[$this->path[0]][$inforBanco]['total_paginas'];

                $ultimaPagina = FindByPagina($this->json[$this->path[0]], $this->totalPagina);    
                
                if (count($this->json[$this->path[0]][$ultimaPagina]['resultados']) == 20){
                    $this->CriarNovaPagina();
                    $ultimaPagina = FindByPagina($this->json[$this->path[0]], $this->totalPagina);    
                }
                
                $this->json[$this->path[0]][$ultimaPagina]['resultados'][] = $jsonbody;
                echo json_encode($jsonbody);
                file_put_contents('db.json', json_encode($json));
            }else{
                header('Location: ../Views/404.html');
                exit;
            }
        }

        private function PUT(){

        }

        private function DELETE(){
            if(!$this->json[$this->path[0]]){
                header('Location: ../Views/404.html');
                exit;
            }

            if($this->pagina == "" || $this->id == ""){
                header('Location: ../Views/404.html');
                exit;
            }

            $encontrado = $this->FindByPagina($this->json[$this->path[0]], $this->pagina);
            
            if($encontrado >= 0 ){
                foreach ($encontrado['resultados'] as $key => $objeto) {
                    if($objeto['id'] == $this->id){
                        echo json_encode($this->json[$this->path[0]][$encontrado['resultados']][$key]);

                        unset($this->json[$this->path[0]][$encontrado['resultados']][$key]);
                        
                        file_put_contents('DB.json', json_encode($this->json));    
                    }
                }
            }else{
                header('Location: ../Views/404.html');
                exit;
            }
        }

        public function FindByPagina($vetor, $pagina){
            $resultado = -1;

            foreach ($vetor as $key => $objeto) {
                if($objeto['pagina'] == $pagina){
                    $resultado = $key;
                    break;
                }
            }

            return $resultado;
        }

        public function CriarNovaPagina(){
            $this->totalPagina = $this->totalPagina + 1;

            $jsonPagina = '"pagina": '.$this->totalPagina.',"resultados": []';
            
            $this->json[$this->path[0]][] = $jsonPagina;
            file_put_contents('DB.json', json_encode($this->json));    
        }

        public function runRequisicao(){
            if($this->metodo === 'GET'){
                $this->GET();    
            }else if($this->metodo === 'POST'){
                $this->POST();    
            }else if($this->metodo === 'PUT'){
                $this->PUT();    
            }else if($this->metodo === 'DELETE'){
                $this->DELETE();    
            }
        }

    }

?>