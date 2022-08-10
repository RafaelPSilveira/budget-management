<?php
    // include ('connectDB.php');
    $data = $_REQUEST;
    $userDB = 'root';
    $passwordDB = '';    

    $pdo = new PDO("mysql:host=localhost;dbname=budget-management", $userDB, $passwordDB);
    $user = $_REQUEST['user'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];  


    try{
        if(empty($data)){
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