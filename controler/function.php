<?php
    if(!empty($_REQUEST['login'])&& !empty($_REQUEST['email']) && !empty($_REQUEST['password'])){
        login($_REQUEST['email'], $_REQUEST['password']);
        header('Location: ../pages/dashboard.php');
    }
    if(!empty($_REQUEST['logout'])){
        logout();
        header('Location: ../index.php');
    }


    function login($email,$password){
        
       require('../model/connectDB.php');

        $retorno = [
            'success' => false,
            'msg'     => 'Você precisa estar logado para acessar está pagina!'
        ];


        $pdo = connectDB();

        $getLogin = $pdo->prepare("SELECT email,password FROM user WHERE email=:email AND password=:password");
        $getLogin->execute([
            ':email' => $email,
            ':password' => $password
        ]);

        if($getLogin->fetch() < 1){
            echo 'deu ruim';
            return $retorno;
        }else{
                       
            $arrLogin = [
                'email' => $email,
                'password' => $password
            ];
            
            montaSessao($arrLogin);

            return $retorno = [
                'success' => true,
                'msg'     => 'Login efetuado'
            ];
        }

    }

    function logout(){
        if(isset($_SESSION) <=0) return false;        
        
        session_destroy();
    }

    function montaSessao($arrLogin){
        if(count($arrLogin) <= 0) return false;

        if(!isset($_SESSION)){session_start();}

        foreach($arrLogin as $key => $value){
            $_SESSION[$key] = $value;
        }
    }
   
   