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
            $pdo = new PDO('mysql:host=localhost,dbname='.DATABASE, USER, PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            // echo $success['msg'] = 'deu bom';
            return $pdo;
        }catch(PDOException $e){
            echo $success['msg'].$e->getMessage();
        }
    }


    
    
