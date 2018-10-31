<?php   

    class Cargo{
        
        private $id;
        private $cargo;
        private $data_cadastro;
        
        public function Cargo($cargo){
            $this->cargo = $cargo;
        }

        public function getCargo(){
            return $this->cargo;
        }   
        
        public function setCargo($cargo){
            $this->cargo = $cargo;
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