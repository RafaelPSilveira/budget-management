<?php
    include('function.php');
    if(!isset($_SESSION)){session_start();}
    if(!isset($_SESSION['email'])){
        logout();
    }           