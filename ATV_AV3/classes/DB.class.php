<?php
    class DB{
        public static $conexao;
                
        public static function Conexao() {
            if (!isset(self::$conexao)) {
                try{
                    self::$conexao = new PDO('mysql:host=localhost;dbname=transportabrasil', 'root', '123456789' , array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$conexao->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
                }catch(PDOException $e){
                    mensagemAlerta('Atenção', $e->getMessage()); 
                } 
            }

            return self::$conexao;
        }    
    }
?>   