<?php

    include_once("../../../Control/conexao.php");

    class mobUsuarioDAO{

        private $sql = '';
        private $stmt = NULL;

        public function inserir($objeto){
            try{
                $this->sql = "insert into mobusuario(nome, usuario, senha, email) 
                             values(:nome, :usuario, :senha, :email)";

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":nome", $objeto->getNome(), PDO::PARAM_STR);
                $this->stmt->bindValue(":usuario", $objeto->getUsuario(), PDO::PARAM_STR);
                $this->stmt->bindValue(":senha", $objeto->getSenha(), PDO::PARAM_STR);
                $this->stmt->bindValue(":email", $objeto->getEmail(), PDO::PARAM_STR);

                $this->stmt->execute();

                return json_encode(array('mensagem' => 'Cadastro realizado com sucesso!'));

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function alterar($objeto){
            try{

                $this->sql = 'update mobusuario set nome = :nome, usuario = :usuario, 
                              email = :email, inativo = :inativo where id = :id';

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":nome", $objeto->getNome(), PDO::PARAM_STR);
                $this->stmt->bindValue(":usuario", $objeto->getUsuario(), PDO::PARAM_STR);
                $this->stmt->bindValue(":email", $objeto->getEmail(), PDO::PARAM_STR);
                $this->stmt->bindValue(":inativo", $objeto->getInativo(), PDO::PARAM_STR);
                
                $this->stmt->bindValue(":id", $objeto->getId(), PDO::PARAM_INT);

                $this->stmt->execute();

                return json_encode(array('mensagem' => 'Alteração realizada com sucesso!'));

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function deletar($id){
            try{

                $this->sql = 'Delete from mobusuario where id = :id';

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":id", $id, PDO::PARAM_INT);

                $this->stmt->execute();

                return json_encode(array('mensagem' => 'Exclusão realizada com sucesso!'));

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }
        
        public function updateInativo($id, $inativo){
            try{

                $this->sql = 'Update mobusuario set inativo = :inativo where id = :id';

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":inativo", $inativo, PDO::PARAM_STR);
                $this->stmt->bindValue(":id", $id, PDO::PARAM_INT);

                $this->stmt->execute();

                return json_encode(array('mensagem' => 'Operaçao realizada com sucesso!'));

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function selecionar($sql){
            try{
                $this->sql = $sql;

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->execute();

                return $this->stmt->fetchAll();

            } catch(PDOException $e){
                return [];
            }
        } 
    }

?>