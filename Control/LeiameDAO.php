<?php

    include_once("conexao.php");
    include_once("PadraoDAO.php");

    class LeiameDAO implements PadraoDAO{

        private $sql = '';
        private $stmt = NULL;

        public function inserir($objeto){
            try{
                $this->sql = "insert into noticia(titulo, versao, relator, programador, teste, caso, solucao, status) 
                              values(:titulo, :versao, :relator, :programador, :teste, :caso, :solucao, :status)";

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":titulo", $objeto->getTitulo(), PDO::PARAM_STR);
                $this->stmt->bindValue(":versao", $objeto->getVersao(), PDO::PARAM_STR);
                $this->stmt->bindValue(":relator", $objeto->getRelator(), PDO::PARAM_STR);
                $this->stmt->bindValue(":programador", $objeto->getProgramador(), PDO::PARAM_STR);
                $this->stmt->bindValue(":teste", $objeto->getTeste(), PDO::PARAM_STR);
                $this->stmt->bindValue(":caso", $objeto->getCaso(), PDO::PARAM_STR);
                $this->stmt->bindValue(":solucao", $objeto->getSolucao(), PDO::PARAM_STR);
                $this->stmt->bindValue(":status", $objeto->getStatus(), PDO::PARAM_STR);

                $this->stmt->execute();

                return "";
            } catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function alterar($objeto){
            try{

                $this->sql = "update noticia set titulo = :titulo, versao = :versao, relator = :relator, programador = :programador, 
                              teste = :teste, caso = :caso, solucao = :solucao, status = :status where id = :id";

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":titulo", $objeto->getTitulo(), PDO::PARAM_STR);
                $this->stmt->bindValue(":versao", $objeto->getVersao(), PDO::PARAM_STR);
                $this->stmt->bindValue(":relator", $objeto->getRelator(), PDO::PARAM_STR);
                $this->stmt->bindValue(":programador", $objeto->getProgramador(), PDO::PARAM_STR);
                $this->stmt->bindValue(":teste", $objeto->getTeste(), PDO::PARAM_STR);
                $this->stmt->bindValue(":caso", $objeto->getCaso(), PDO::PARAM_STR);
                $this->stmt->bindValue(":solucao", $objeto->getSolucao(), PDO::PARAM_STR);
                $this->stmt->bindValue(":status", $objeto->getStatus(), PDO::PARAM_STR);

                $this->stmt->bindValue(":id", $objeto->getId(), PDO::PARAM_INT);

                $this->stmt->execute();

                return "";

            } catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function deletar($id){
            try{
                $this->sql = 'Delete from noticia where id = :id';

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":id", $id, PDO::PARAM_INT);

                $this->stmt->execute();
                
                return "";
            } catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function updatePublicar($id, $status){
            try{

                $this->sql = 'update noticia set status = :status where id = :id';

                $this->stmt = Conexao::getConexao()->prepare($this->sql);

                $this->stmt->bindValue(":status", $status, PDO::PARAM_STR);
                $this->stmt->bindValue(":id", $id, PDO::PARAM_INT);

                $this->stmt->execute();

                return "";

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
                echo $e->getMessage();
                return 0;
            }
        }
    }

?>