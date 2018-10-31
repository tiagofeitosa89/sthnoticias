<?php   

    class Versao{
        
        private $id;
        private $versao;
        private $data_cadastro;
        
        public function Versao($versao){
            $this->versao = $versao;
        }

        public function getVersao(){
            return $this->versao;
        }   
        
        public function setVersao($versao){
            $this->versao = $versao;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getData_Cadastro(){
            return $this->data_Cadastro;
        }

    }

?>