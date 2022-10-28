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
                $result['msg'] = "Lançado com sucesso";
                $result['success'] = true;
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
                    
                    // SELECT * FROM releases WHERE date_release >= '2022-10-01 00:00:00' and date_release <= '2022-10-31 23:59:59' and user_id=1;
            case 'read_cards':
                // $year = $_POST ? $_POST['year'] : "";
                // $month = $_POST ? $_POST['month'] : "";
                // $fullDate = $_POST ? $_POST['fullDate'] : "";
                
                $receitas = $pdo->prepare("SELECT SUM(value) AS value_receitas FROM `releases` WHERE user_id='$getID' AND type='Receita'");
                $receitas->execute();

                $despesas = $pdo->prepare("SELECT SUM(value) AS value_despesas FROM `releases` WHERE user_id='$getID' AND type='Despesa'");
                $despesas->execute();

                $row = [$receitas->fetch(PDO::FETCH_ASSOC),
                        $despesas->fetch(PDO::FETCH_ASSOC),
    
                ];
                
                // $sum = $row['value_receitas'];
                $result= $row;

               break;
    

            case 'update_releases':
                $id = $_POST ? $_POST['idRelease'] : "";
                $stmt = $pdo->prepare("UPDATE releases SET name_include=:name_include, type=:type, category=:category, value=:value, obs=:obs WHERE id=:id");
                $stmt->execute([
                'name_include' => $name_include,
                'type' => $type,
                'category' => $category,
                'value' => $value,
                'obs' => $description,
                'id' => $id
                ]);
                
                $result['msg'] = "Atualizado com sucesso";
                $result['success'] = true;
                break;

            case 'delete_releases':
                $id = $_POST ? $_POST['idRelease'] : "";
                $stmt = $pdo->prepare("DELETE FROM releases WHERE id=:id");
                $stmt -> execute([
                    "id"=>$id
                ]);
                $result['msg'] = "Excluido com sucesso";
                $result['success'] = true;
                break;
        }


            header("Content-Type: application/json;");
            echo json_encode($result);


    }


    


  

    
    