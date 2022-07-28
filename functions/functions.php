<?php
    
    session_start();

    function login($login,$password,$connect){
        $result = [];

        $sql = mysqli_query(mysqlConnection($connect),"SELECT email , password FROM user WHERE email = '$login' AND password = '$password'");

        if(mysqli_num_rows($sql) < 1){
            $result['success'] = false;
            $result['msg'] = 'Login incorreto!';
            header('location:../login-cadastro/index.php');
        }else{
            $result['success'] = true;
            $result['msg'] = 'Login efetuado com sucesso!';                        
        }

        

        return $result;
    }

//------------------------------------------------------------------\\

   function getTransactions ($connect){
    
    $sql = mysqli_query(mysqlConnection($connect),"SELECT  * FROM releases ORDER BY id DESC");

    while($user_data = mysqli_fetch_assoc($sql)){
        echo "<tr>";
        echo "<td>".$user_data['name_include']."</td>";
        echo "<td>".$user_data['type']."</td>";
        echo "<td>".$user_data['category']."</td>";
        echo "<td>".$user_data['value']."</td>";
        echo "<td>".$user_data['date_release']."</td>";
        echo "<td>".$user_data['obs']."</td>";   
        }
   } 
//--------------------------------SAVE----------------------------------\\

   if(isset($_POST['save_include'])){
    $name      = mysqli_real_escape_string($connect2, $_POST['name']);
    $tipo      = mysqli_real_escape_string($connect2, $_POST['tipo']);
    $categoria = mysqli_real_escape_string($connect2, $_POST['categoria']);
    $valor     = mysqli_real_escape_string($connect2, $_POST['value']);
    $obs       = mysqli_real_escape_string($connect2, $_POST['obs']);
    
    $query = "INSERT INTO releases (name_include,type,category,value,obs) VALUES ('$name','$tipo','$categoria','$valor','$obs')";

    $query_run = mysqli_query($connect2,$query);
    if($query_run){
        $_SESSION['message'] = "Salvo";
        header("Location: ../lancamentos/new-inclusion.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Erro";
        header("Location: ../dashboard/home.php");
        exit(0);
    }
}

//--------------------------------UPDATE----------------------------------\\

if(isset($_POST['update_register'])){
    $register_id = mysqli_real_escape_string($connect2, $_POST['register_id']);
    $name        = mysqli_real_escape_string($connect2, $_POST['name']);
    $tipo        = mysqli_real_escape_string($connect2, $_POST['tipo']);
    $categoria   = mysqli_real_escape_string($connect2, $_POST['categoria']);
    $valor       = mysqli_real_escape_string($connect2, $_POST['value']);
    $obs         = mysqli_real_escape_string($connect2, $_POST['obs']);

    $query = "UPDATE releases SET name_include='$name', type='$tipo', category='$categoria', value='$valor', obs='$obs' WHERE id='$register_id'";

    $query_run = mysqli_query($connect2, $query); 

    if($query_run){
        $_SESSION['message'] = "Registro atualizado com sucesso";
        header("Location: ./lancamentos.php");
        exit(0);
    }else{
        $_SESSION['message'] = "Não foi possivel atualizar este registro";
        header("Location: ./lancamentos.php");
        exit(0);
    }
    }

//--------------------------------DELETE----------------------------------\\

    if(isset($_POST['delete_release'])){
        $release_id = mysqli_real_escape_string($connect2, $_POST['delete_release']);
    
        $query = "DELETE FROM releases WHERE id='$release_id'";
        $query_run = mysqli_query($connect2, $query);
    
        if($query_run){
            $_SESSION['message'] = "Lançamento excluido com sucesso";
            header("Location: index.php");
            exit(0);
        }else{
            $_SESSION['message'] = "ERRO! Este lançamento não foi excluido";
            header("Location: index.php");
            exit(0);
        }
    }




   
   
