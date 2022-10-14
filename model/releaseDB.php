<?php

    include('connectDB.php');
    include('../controler/includes.php');

    $result = array();

        
    if (empty($_REQUEST["type"])){
        
        $result['success'] = false;
        $result['msg']     = "Falta uma parâmetro na requisição.";
        
    } else{

        $_POST = json_decode(file_get_contents("php://input"),true);
    
        
        $name_include = $_POST ? $_POST['name'] : "";
        $type         = $_POST ? $_POST['balance'] : "";
        $category     = $_POST ? $_POST['category'] : "";
        $value        = $_POST ? $_POST['value'] : "";
        $description  = $_POST ? $_POST['description'] : "";
        $email        = $_POST ? $_POST['sessionEmail'] : $_SESSION['email'];
             
        $pdo = connectDB();

        $getUserID =$pdo->query("SELECT id FROM `user` WHERE email='$email'")->fetch();
        $getID = $getUserID['id'];

            
        switch ($_REQUEST['type']){
    
            case 'create_release':
            
                $stmt = $pdo->prepare('INSERT INTO releases(name_include,type,category, value,obs,user_id) VALUES (:name_include,:type,:category, :value,:obs,:user_id)');
                $stmt->execute([
                'name_include' => $name_include,
                'type' => $type,
                'category' => $category,
                'value' => $value,
                'obs' => $description,
                'user_id' => $getID,
                
                ]);
                $result['msg'] = "Feito com sucesso";
                $result['success'] = true;
                echo json_encode($result);
                break;
    
            case 'read_releases':
                $limite="";
                if(!empty($_REQUEST['limite'])){
                    $limite = $_REQUEST['limite'];
                    $limite = $limite !=0 ? "LIMIT $limite" : "";
                }
                $getReleases = $pdo->query("SELECT id, name_include, type, category, value, obs FROM `releases` WHERE user_id='$getID' ORDER BY date_release DESC $limite");
                $releases = array();
    
                while ($row = $getReleases->fetch(PDO::FETCH_ASSOC)) {
                    array_push($releases, $row);
                }

                $result = $releases;
                break;

            case 'update_releases':
                $id = $_POST ? $_POST['id'] : "";
                break;
            case 'delete_releases':
                $stmt = $pdo->prepare("DELETE FROM releases WHERE id=:id");
                $stmt -> execute([
                    "id"=>$id
                ]);
                $result['msg'] = "Excluido com sucesso";
                $result['success'] = true;
                echo json_encode($result);
                break;
            }
            header("Content-Type: application/json;");
            echo json_encode($result);
    }
    


  

    
    