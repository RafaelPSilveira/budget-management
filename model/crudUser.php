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

    $pdo = connectDB();
    
    
    try{
        if(empty($_REQUEST)){
            $success['success'] = false;
            echo $success['msg'];
        }else{
            $success['data'] = $user;
        
            switch ($_REQUEST['type']){
                
                case 'create_user':
                    $getEmail = $pdo->prepare('SELECT email FROM user WHERE email=:email');
                    $getEmail->execute([
                        'email'=> $email
                    ]);
                    if($getEmail->fetch() >= 1){
                        echo json_encode($success['msg'] = 'Email já cadastrado!');
                    }else{
                        $stmt = $pdo->prepare('INSERT INTO user(user,email,password) VALUES (:user,:email,:password)');
                        $stmt->execute([
                        'user'     => $user,
                        'email'    => $email,
                        'password' => $password,
                        ]);
                        $success['success'] = true;
                        echo json_encode($success);                     
                    }
                    break; 
                    
                default:
                    return json_encode($success ['msg'] = 'REQUEST Type não foi igual a "creat_user"');
            }

        }
    }catch(PDOException $e){
        echo 'Error'.$e->getMessage();                
    }
    

