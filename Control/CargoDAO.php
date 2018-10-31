<?php

    include_once("conexao.php");
    include_once("PadraoDAO.php");

    class CargoDAO implements PadraoDAO{

        private $sql = '';
        private $stmt = NULL;

        public function inserir($objeto){
            try{
                $this->sql = "insert into cargo(nome) value(:nome)";

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":nome", $objeto->getcargo(), PDO::PARAM_STR);

                $this->stmt->execute();

                return "";

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function alterar($objeto){
            try{

                $this->sql = 'update cargo set nome = :nome where id = :id';

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":nome", $objeto->getcargo(), PDO::PARAM_STR);    
                $this->stmt->bindValue(":id", $objeto->getId(), PDO::PARAM_INT);

                $this->stmt->execute();

                return "";

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function deletar($id){
            try{

                $this->sql = 'Delete from cargo where id = :id';

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":id", $id, PDO::PARAM_INT);

                $this->stmt->execute();

                return "";

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }

?>