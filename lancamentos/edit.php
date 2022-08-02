<?php
    
    include('../functions/includes.php')
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Righteous&family=Sarala:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
</head>
<body>
    <?php include ("../includes/navBar.php"); ?>
    <!-- END OF NAVBAR-->
    <main>
        <aside>
                <button id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </button>
                <div class="sidebar">
                    <a href="./dashboard/home.php">
                        <span class="material-icons-sharp">dashboard</span>
                        <h4>Dashboard</h4>
                    </a>
                    <a href="./relatorios.php" >
                        <span class="material-icons-sharp">pie_chart</span>
                        <h4>Relatórios</h4>
                    </a>
                    <a href="#"class="active" >
                        <span class="material-icons-sharp">pie_chart</span>
                        <h4>Lançamentos</h4>
                    </a>
                </div>   
        </aside>
        <div class="card-body">

        <?php
            if(isset($_GET['id'])){
                $register_id = mysqli_real_escape_string(mysqlConnection($connect),$_GET['id']);
                $query       = "SELECT * FROM releases WHERE id='$register_id'";
                $query_run   = mysqli_query(mysqlConnection($connect), $query);
                
                if(mysqli_num_rows($query_run) > 0){
                    $register = mysqli_fetch_array($query_run);
                    ?>
                    
                    <form action="../functions/functions.php" method="POST">
                        <input type="hidden" name="register_id" value="<?=$register['id'];?>">
                        <div class="mb-3">
                            <label>Nome</label>
                            <input type="text" name="name" value="<?=$register['name_include'];?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Tipo</label>
                            <input type="text" name="tipo" value="<?=$register['type'];?>"class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Categoria</label>
                            <input type="text" name="categoria" value="<?=$register['category'];?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Valor</label>
                            <input type="text" name="valor" value="<?=$register['value'];?>"class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Descrição</label>
                            <input type="text" name="obs" value="<?=$register['obs'];?>"class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="update_register" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>    

                    <?php
                }else{
                    echo '<h4>No such ID found</h4>';
                }
            }
        ?>
</div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>