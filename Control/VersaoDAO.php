<?php

    include_once("conexao.php");
    include_once("PadraoDAO.php");

    class VersaoDAO implements PadraoDAO{

        private $sql = '';
        private $stmt = NULL;

        public function inserir($objeto){
            try{
                $this->sql = "insert into versao(nome) value(:nome)";

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":nome", $objeto->getVersao(), PDO::PARAM_STR);

                $this->stmt->execute();

                return "";

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function alterar($objeto){
            try{

                $this->sql = 'update versao set nome = :nome where id = :id';

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":nome", $objeto->getVersao(), PDO::PARAM_STR);    
                $this->stmt->bindValue(":id", $objeto->getId(), PDO::PARAM_INT);

                $this->stmt->execute();

                return "";

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function deletar($id){
            try{

                $this->sql = 'Delete from versao where id = :id';

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