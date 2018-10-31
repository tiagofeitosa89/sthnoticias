<?php

    class Conexao{

        public static $conn = NULL;

        public static function getConexao(){
            try{
                if(empty($conn)){
                    self::$conn = new PDO('mysql:host=localhost;dbname=leiame','root','');
                                          
                    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                return self::$conn;
            } catch(PDOException $e){
                echo $e->getMessage();
            }
            return self::$conn;
        }

        public static function closeConexao(){
            self::$conn = NULL;
        }

    }
 
?>