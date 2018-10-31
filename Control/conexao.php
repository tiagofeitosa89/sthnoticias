<?php

    class Conexao{

        public static $conn = NULL;

        public static function getConexao(){
            try{
                if(empty($conn)){
                    self::$conn = new PDO('mysql:host=mysql995.umbler.com;dbname=leiame','rootnoticias','root3110');
                    //self::$conn = new PDO('mysql:host=;dbname=leiame','rootnoticias','root3110');    
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