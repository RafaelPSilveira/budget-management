<?php
    include('connectDB.php');
    


    $pdo = connectDB();
    $success = [
        'sugccess' => false,
        'msg' => 'Error'
    ];   
          
    switch($_REQUEST["type"]){
        case 'create_user':
            try{
                if(empty($_REQUEST)){
                    $success['success'] = false;
                    echo $success['msg'];
                }else{                             
                    $stmt = $pdo->prepare('INSERT INTO users(user,email,password) VALUES (:user,:email,:password)');
                    $stmt->execute([
                    'user' => $user,
                    'email' => $email,
                    'password' => $password,
                    ]);
                }
            }catch(PDOException $e){
                echo 'Error'.$e->getMessage();                
            }
    }

    header("Content-Type: application/json;");
    echo json_encode($result);
