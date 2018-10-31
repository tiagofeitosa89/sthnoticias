<?php   

    class Leiame{
        
        private $id;
        private $titulo;
        private $versao;
        private $data_publicacao;
        private $relator;
        private $programador;
        private $teste;
        private $caso;
        private $solucao;
        private $status;
        private $data_cricao;
        
        public function Leiame(){
            
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getTitulo(){
            return $this->titulo;
        }   
        
        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function getVersao(){
            return $this->versao;
        }

        public function setVersao($versao){
            $this->versao = $versao;
        }

        public function getData_publicao(){
            return $this->data_publicacao;
        }   
        
        public function setRelator($relator){
            $this->relator = $relator;
        }
        public function getRelator(){
            return $this->relator;
        }

        public function setProgramador($programador){
            $this->programador = $programador;
        }

        public function getProgramador(){
            return $this->programador;
        }   
        
        public function setTeste($teste){
            $this->teste = $teste;
        }
        public function getTeste(){
            return $this->teste;
        }

        public function setCaso($caso){
            $this->caso = $caso;
        }

        public function getCaso(){
            return $this->caso;
        }   
        
        public function setSolucao($solucao){
            $this->solucao = $solucao;
        }
        
        public function getSolucao(){
            return $this->solucao;
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function getStatus(){
            return $this->status;
        }

        public function getData_Criacao(){
            return $this->data_criacao;
        }

    }

?>