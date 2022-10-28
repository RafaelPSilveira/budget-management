<?php
    include('function.php');
    if(!isset($_SESSION)){session_start();}
    if(!isset($_COOKIE['lembrar-me']) && empty($_COOKIE['lembrar-me'])){return false;}   
    else if($_COOKIE['lembrar-me'] && $_SERVER['PHP_SELF'] == '/index.php'){
        existsCookies();
        header('Location: ./pages/dashboard.php');


    }
    if(!isset($_SESSION['email'])){
        logout();
    }