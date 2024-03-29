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
        $releaseDate = $_POST ? $_POST['releaseDate'] : "";
        $email        = $_POST ? $_POST['sessionEmail'] : $_SESSION['email'];
             
        $pdo = connectDB();

        $getUserID =$pdo->query("SELECT id FROM `user` WHERE email='$email'")->fetch();
        $getID = $getUserID['id'];

        
         
        switch ($_REQUEST['type']){
    
            case 'create_release':
            
                $stmt = $pdo->prepare('INSERT INTO releases(name_include,type,category, value,obs,user_id, release_date) VALUES (:name_include,:type,:category, :value,:obs,:user_id,:release_date)');
                $stmt->execute([
                'name_include' => $name_include,
                'type' => $type,
                'category' => $category,
                'value' => $value,
                'obs' => $description,
                'user_id' => $getID,
                'release_date' => $releaseDate,
                
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
                    $getReleases = $pdo->query("SELECT id, name_include,release_date, type, category, value, obs FROM `releases` WHERE user_id='$getID' ORDER BY release_date DESC $limite");
                    $releases = array();
                    
                    while ($row = $getReleases->fetch(PDO::FETCH_ASSOC)) {
                        array_push($releases, $row);
                    }
                    
                    $result = $releases;
                    break;

                   
            case 'read_cards':  
                $year = $_GET ? $_GET['year'] : "";
                $month = $_GET ? $_GET['month'] : "";
                $fullDate = $_GET ? $_GET['fullDate'] : "";
              

                $receitas = $pdo->prepare("SELECT SUM(value) AS value_receitas FROM `releases` WHERE user_id=$getID AND type='Receita' AND release_date >= '$year-$month-01' AND release_date <= '$fullDate'");
                $receitas->execute();

                $despesas = $pdo->prepare("SELECT SUM(value) AS value_despesas FROM `releases` WHERE user_id=$getID AND type='Despesa' AND release_date >= '$year-$month-01' AND release_date <= '$fullDate'");
                $despesas->execute();

                $row = [$receitas->fetch(PDO::FETCH_ASSOC),
                        $despesas->fetch(PDO::FETCH_ASSOC),    
                ];
                
                // $sum = $row['value_receitas'];
                $result= $row;

               break;
    
            
            case 'update_releases':
                $id = $_POST ? $_POST['idRelease'] : "";
                $stmt = $pdo->prepare("UPDATE releases SET release_date=:release_date, name_include=:name_include, type=:type, category=:category, value=:value, obs=:obs WHERE id=:id");
                $stmt->execute([
                'release_date' => $releaseDate,
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




    


  

    
    