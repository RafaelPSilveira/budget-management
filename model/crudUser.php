<?php
    include('connectDB.php');    
    
    $success = [
        'success' => false,
        'data'    => '',
        'msg'     => 'Error'
    ];   
    
    $_POST = json_decode(file_get_contents("php://input"),true);
    
    
    $user         = $_POST['user'];
    $email        = $_POST['email'];
    $password     = $_POST['password'];
    // $name_include = $_POST['name'];
    // $type         = $_POST['balance'];
    // $category     = $_POST['category'];
    // $value        = $_POST['value'];
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PASSWORD);
    
    try{
        if(empty($_POST)){
            $success['success'] = false;
            echo $success['msg'];
        }else{
            $success['data'] = $user;
        
            switch ($_REQUEST['type']){
                
                case 'create_user':
                    $stmt = $pdo->prepare('INSERT INTO user(user,email,password) VALUES (:user,:email,:password)');
                    $stmt->execute([
                    'user'     => $user,
                    'email'    => $email,
                    'password' => $password,
                    ]);
                    ;
                    $success['success'] = true;
                    echo json_encode($success);
                    // header('location: ../index.php'); 
                    
                    return;

                    break; 
                    
                default:
                    return json_encode($success ['msg'] = 'REQUEST Type não foi igual a "creat_user"');
            }

        }
    }catch(PDOException $e){
        echo 'Error'.$e->getMessage();                
    }
    

