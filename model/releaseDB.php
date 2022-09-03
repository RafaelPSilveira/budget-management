<?php

    // include('connectDB.php');
    

    $pdo = new PDO('mysql:host=localhost;dbname=budget-management;','root','');

   print_r($_REQUEST);
    $name_include = $_REQUEST['name'];
    $type         = $_REQUEST['tipo'];
    $category     = $_REQUEST['category'];
    $value        = $_REQUEST['value'];
    $description  = $_REQUEST['obs'];
    // $email        = $_REQUEST['email'];



    // $getUserID = (int) $pdo->query("SELECT id FROM `user` WHERE email='$email';");
    $stmt = $pdo->prepare('INSERT INTO releases(name_include,type,category, value,obs,user_id) VALUES (:name_include,:type,:category, :value,:obs,:user_id)');
    $stmt->execute([
    'name_include' => $name_include,
    'type' => $type,
    'category' => $category,
    'value' => $value,
    'obs' => $description,
    'user_id' => $getUserID,
    
    ]);
    
    