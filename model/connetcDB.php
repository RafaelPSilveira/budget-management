<?php
    
    function configDB(){
        
        $connect['host'] = 'localhost';
        $connect['user'] = 'root';
        $connect['password'] = '';
        $connect['db'] = 'budget-management';

        return $connect;
    }

    function mysqlConnection($connect){        

        return mysqli_connect($connect['host'],$connect['user'],$connect['password'],$connect['db']);
    }

    $connect2 = mysqli_connect("localhost","root","","budget-management");

    if(!$connect2){
        die ('Connection Failed'.mysqli_connect_errno());
    }



    

    

    

    