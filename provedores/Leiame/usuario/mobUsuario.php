<?php   
    class mobUsuario{
        
        private $id;
		private $nome;
        private $usuario;
		private $senha;
        private $inativo;
        private $email;
        private $data_cadastro;
        private $data_alteracao;
        
        public function mobUsuario(){
            
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

        public function getData_Alteracao(){
            return $this->data_Alteracao;
        }

        public function getInativo(){
            return $this->inativo;
        }   
        
        public function setInativo($inativo){
            $this->inativo = $inativo;
        }

        public function getEmail(){
            return $this->email;
        }   
        
        public function setEmail($email){
            $this->email = $email;
        }

    }

?>