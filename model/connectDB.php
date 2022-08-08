<?php
    define('HOST', 'localhost');
    define('DATABASE','budget-management');
    define('USER', 'root');
    define('PASSWORD', '');

    function connectDB(){
        
        $success = [];
        $success['success'] = false;
        $success['msg'] = 'Error';    

        try{
            $pdo = new PDO('mysql:host='.HOST.';dbname'.DATABASE, USER, PASSWORD);
            echo $success['msg'] = 'deu bom';
            return $pdo;
        }catch(PDOException $e){
            echo $success['msg'].$e->getMessage();
        }        
    }