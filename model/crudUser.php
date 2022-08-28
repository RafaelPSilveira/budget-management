<?php
    include('connectDB.php');    
    
    $success = [
        'sugccess' => false,
        'msg' => 'Error'
    ];   
    
   
    $user         = $_REQUEST['user'];
    $email        = $_REQUEST['email'];
    $password     = $_REQUEST['password'];
    $name_include = $_REQUEST['name'];
    $type         = $_REQUEST['balance'];
    $category     = $_REQUEST['category'];
    $value        = $_REQUEST['value'];
    

    try{
        if(empty($_REQUEST)){
            $success['success'] = false;
            echo $success['msg'];
        }else{
            
            switch ($_REQUEST['type']){
                
                case 'create_user':
                    $stmt = $pdo->prepare('INSERT INTO user(user,email,password) VALUES (:user,:email,:password)');
                    $stmt->execute([
                    'user' => $user,
                    'email' => $email,
                    'password' => $password,
                    ]);
                    header('location: ../index.php');
                    return $success['succes'] = true;
                
            }
        }
    }catch(PDOException $e){
        echo 'Error'.$e->getMessage();                
    }
    

    header("Content-Type: application/json;");
    echo json_encode($success);
