<?php
    class connect{
        var $db = null;
        function __construct(){
            $dsn = "mysql:host=localhost;dbname=cosmetic";
            $user = 'root';
            $pass = '';
            $this->db = new PDO($dsn, $user, $pass, array(PDO ::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this ->db-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        function getList ($select){
            $result = $this -> db -> query($select);
            $result = $result -> fetchAll();
            return $result;
        }
        function getInstance ($select){
            $result = $this -> db -> query($select);
            $result = $result -> fetch();
            return $result;
        }
        function exec($query){
            $result = $this -> db -> exec($query);
            return $result;
        }
        function lastInsertId(){
            return $this -> db ->lastInsertId(); 
        }
    }
?>