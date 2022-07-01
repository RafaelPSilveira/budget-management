<?php
    
    function login($login,$password,$connect){
        $result = [];

        $sql = mysqli_query(mysqlConnection($connect),"SELECT email , password FROM user WHERE email = '$login' AND password = '$password'");

        if(mysqli_num_rows($sql) < 1){
            $result['success'] = false;
            $result['msg'] = 'Login incorreto!';            
        }else{
            $result['success'] = true;
            $result['msg'] = 'Login efetuado com sucesso!';           
        }

        return $result;
    }