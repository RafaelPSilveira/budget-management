<?php
    define('HOST', '127.0.0.1');
    define('DATABASE','budget-management');
    define('USER', 'root');
    define('PASSWORD', 'root');

    function connectDB(){
        
        $success = []; 
        $success['success'] = false;
        $success['msg'] = 'Error';    

        try{
            $pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
            return $pdo;
        }catch(PDOException $e){
            echo $success['msg'].$e->getMessage();
        }
    }


    
    
