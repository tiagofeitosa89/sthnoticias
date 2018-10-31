<?php

    include_once("conexao.php");
    include_once("PadraoDAO.php");

    class UsuarioDAO implements PadraoDAO{

        private $sql = '';
        private $stmt = NULL;

        public function inserir($objeto){
            try{
                $this->sql = "insert into usuario(nome, sobrenome, usuario, senha, cargo, inativo) 
                             values(:nome, :sobrenome, :usuario, :senha, :cargo, :inativo)";

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":nome", $objeto->getNome(), PDO::PARAM_STR);
                $this->stmt->bindValue(":sobrenome", $objeto->getSobreNome(), PDO::PARAM_STR);
                $this->stmt->bindValue(":usuario", $objeto->getUsuario(), PDO::PARAM_STR);
                $this->stmt->bindValue(":senha", $objeto->getSenha(), PDO::PARAM_STR);
                $this->stmt->bindValue(":cargo", $objeto->getCargo(), PDO::PARAM_INT);
                $this->stmt->bindValue(":inativo", $objeto->getInativo(), PDO::PARAM_STR);

                $this->stmt->execute();

                return "";

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function alterar($objeto){
            try{

                $this->sql = 'update Usuario set nome = :nome, sobrenome = :sobrenome, usuario = :usuario, 
                              cargo = :cargo, inativo = :inativo where id = :id';

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":nome", $objeto->getNome(), PDO::PARAM_STR);
                $this->stmt->bindValue(":sobrenome", $objeto->getSobreNome(), PDO::PARAM_STR);
                $this->stmt->bindValue(":usuario", $objeto->getUsuario(), PDO::PARAM_STR);
                $this->stmt->bindValue(":cargo", $objeto->getCargo(), PDO::PARAM_INT);
                $this->stmt->bindValue(":inativo", $objeto->getInativo(), PDO::PARAM_STR);
                
                $this->stmt->bindValue(":id", $objeto->getId(), PDO::PARAM_INT);

                $this->stmt->execute();

                return "";

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function deletar($id){
            try{

                $this->sql = 'Delete from Usuario where id = :id';

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":id", $id, PDO::PARAM_INT);

                $this->stmt->execute();

                return "";

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }
        
        public function updateInativo($id, $inativo){
            try{

                $this->sql = 'Update Usuario set inativo = :inativo where id = :id';

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":inativo", $inativo, PDO::PARAM_STR);
                $this->stmt->bindValue(":id", $id, PDO::PARAM_INT);

                $this->stmt->execute();

                return "";

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }

?>