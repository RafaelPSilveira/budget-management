<?php
    include('connectDB.php');    
    
    $success = [
        'sugccess' => false,
        'msg' => 'Error'
    ];   
    
   
    $user = $_REQUEST['user'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    try{
        if(empty($_REQUEST)){
            $success['success'] = false;
            echo $success['msg'];
        }else{                             
            $stmt = $pdo->prepare('INSERT INTO user(user,email,password) VALUES (:user,:email,:password)');
            $stmt->execute([
            'user' => $user,
            'email' => $email,
            'password' => $password,
            ]);
            header('location: ../index.php');
            return $success['succes'] = true;
        }
    }catch(PDOException $e){
        echo 'Error'.$e->getMessage();                
    }
    

    header("Content-Type: application/json;");
    echo json_encode($success);
