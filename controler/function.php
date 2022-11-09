<?php

if(!empty($_REQUEST['login']) && empty($_REQUEST['email']) && empty($_REQUEST['passwrod'])){
     header('Location: ../index.php');
}
if(!empty($_REQUEST['login'])&& !empty($_REQUEST['email']) && !empty($_REQUEST['password'])){
    login($_REQUEST['email'], $_REQUEST['password']);         
}
// if(!empty($_REQUEST['login']) && !empty($_REQUEST['lembrar-me'])){
//     validateCookie($_COOKIE);    
// }
if(!empty($_REQUEST['logout'])){
    logout();
    header('Location: ../index.php');
}    

    function login($email,$password){
        
       include_once('../model/connectDB.php');

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
            header('Location: ../index.php');
            return $retorno;
        }else{

            $arrLogin = [
                'email' => $email,
                'password' => $password,
                'name'=> getName($email),          
            ];
           
            montaSessao($arrLogin);                     
            
            if($_REQUEST['lembrar-me'] == 'on'){
                
                if(empty($_COOKIE['lembrar-me'])){

                    $token = md5(time());
                    $expire = time()+60*60*24*30;            
                    montaCookie($token,$expire);

                    $getToken = $pdo->prepare('UPDATE user SET token=:token WHERE email=:email AND password=:password');
                    $getToken->execute([
                        ':token'=>$token,
                        ':email' => $email,
                        ':password' => $password
                    ]);         
                                        
                }              
                     
            }
            
            header('Location: ../pages/dashboard.php');
            
            
            return $retorno = [
                'success' => true,
                'msg'     => 'Login efetuado',                
            ];
        }

    }

    function existsCookies (){
        $pdo = new PDO('mysql:host=localhost;dbname=budget-management', 'root', '123456');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        $getEmail = $pdo -> query("SELECT email FROM user WHERE token='".$_COOKIE['lembrar-me']."'")->fetch();
        $arrLogin = [
            'email' => $getEmail['email'] ,
            'name'=> getName($getEmail['email'])
                 
        ];
        
        montaSessao($arrLogin);

    }
    

    function logout(){
        setCookie('lembrar-me',null,1,'/','localhost');        
        session_destroy();
    }

    function validateCookie($getCookie){
        if(!isset($getCookie['lembrar-me']) && empty($getCookie['lembrar-me'])) {return false;}
        include_once('../model/connectDB.php');
                
        $pdo = connectDB();

        $getLogin = $pdo->query("SELECT email,user, password FROM user WHERE token='".$getCookie['lembrar-me']."'")->fetch();
        $getEmail = $getLogin['email'];
        $getPassword = $getLogin['password'];       

        // resolver problema de acesso no cookie, validar usuario com o token;
               
        if($getLogin < 1){
            echo 'token invalido';            
        }else{
            login($getEmail,$getPassword);
        }

    }

    function montaSessao($arrLogin){
        if(count($arrLogin) <= 0) return false;

        if(!isset($_SESSION)){session_start();}

        foreach($arrLogin as $key => $value){
            $_SESSION[$key] = $value;
        }
    }

    function montaCookie($token,$expire){
        
        setCookie('lembrar-me',$token,$expire,'/','localhost');            
                    
    }

    function getName($email){
        $pdo = new PDO('mysql:host=localhost;dbname=budget-management', 'root', '123456');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $getName = $pdo->query("SELECT name FROM user WHERE email='$email' ")->fetch();
        return $getName['name'];
    }

    

        
    

    



    
   
   