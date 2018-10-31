<?php   
    class Usuario{
        
        private $id;
		private $nome;
		private $sobrenome;
        private $usuario;
		private $senha;
        private $inativo;
        private $cargo;
        private $data_cadastro;
        
        public function Usuario($nome, $sobrenome, $usuario, $senha, $cargo, $inativo){
            $this->nome = $nome;
            $this->sobrenome = $sobrenome;
            $this->usuario = $usuario;
            $this->senha = $senha;
            $this->cargo = $cargo;
            $this->inativo = $inativo;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getNome(){
            return $this->nome;
        }   
        
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getSobreNome(){
            return $this->sobrenome;
        }   
        
        public function setSobreNome($sobrenome){
            $this->sobrenome = $sobrenome;
        }

        public function getUsuario(){
            return $this->usuario;
        }   
        
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }    

        public function getSenha(){
            return $this->senha;
        }   
        
        public function setSenha($senha){
            $this->senha = $senha;
        }
        
        public function getData_Cadastro(){
            return $this->data_Cadastro;
        }

        public function getInativo(){
            return $this->inativo;
        }   
        
        public function setInativo($inativo){
            $this->inativo = $inativo;
        }

        public function getCargo(){
            return $this->cargo;
        }   
        
        public function setCargo($cargo){
            $this->cargo = $cargo;
        }

    }

?>