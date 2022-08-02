<?php
   
    include('../functions/includes.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lançamentos  </title>
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
                    <a href="../dashboard/home.php">
                        <span class="material-icons-sharp">dashboard</span>
                        <h4>Dashboard</h4>
                    </a>
                    <a href="../relatorios/relatorios.php" >
                        <span class="material-icons-sharp">pie_chart</span>
                        <h4>Relatórios</h4>
                    </a>
                    <a href="#"class="active" >
                        <span class="material-icons-sharp">pie_chart</span>
                        <h4>Lançamentos</h4>
                    </a>
                </div>   
        </aside>

        <!------------------------- END OF ASIDE------------------------>

        <section class="middle">
            <div class="header">
                <h2>Período de: </h2>
                <input type="date">
                <h2>a</h2>
                <input type="date">
            </div>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cards">
                            <div class="card-header">
                                <h4>Lançamentos</h4>
                                <a href="./new-inclusion.php" class=" btn-several float-end">Novo Lançamento</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Tipo</th>
                                        <th>Categoria</th>
                                        <th>Valor</th>
                                        <th>Data de Lançameto</th>
                                        <th>Descrição</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM releases";
                                    $query_run =  mysqli_query(mysqlConnection($connect),$query);

                                    if(mysqli_num_rows($query_run) > 0){
                                            foreach($query_run as $release){
                                                ?>
                                                <tr>
                                                    <td><?= $release['name_include']?></td>
                                                    <td><?= $release['type']?></td>
                                                    <td><?= $release['category']?></td>
                                                    <td><?= $release['value']?></td>
                                                    <td><?= $release['date_release']?></td>
                                                    <td><?= $release['obs']?></td>
                                                    <td>
                                                        <a href="<?=$release['id'];?>" class="btn btn-info btn-sm"><span class="material-icons-sharp">visibility</span></a>
                                                        <a href="edit.php?id=<?=$release['id'];?>" class="btn btn-success btn-sm"><span class="material-icons-sharp">edit</span></a>
                                                        <form action="../functions/functions.php" method="POST" class="d-inline">
                                                            <button type="submit" name="delete_release" value="<?=$release['id'];?>" class="btn btn-danger btn-sm"><span class="material-icons-sharp">delete_forever</span></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php

                                            }
                                    }else{
                                            echo "<h5> Registros não encontrados!!! </h5>";
                                    }
                                    ?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        
        <!------------------------ END OF MIDDLE------------------------>

        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>Receitas X Despesas</h2>
                </div>

                
                <div class="header">
                    <canvas id="saldo" style="width:100%;max-width:600px"></canvas>
                </div>
                
                
            <!-- END OF INVESTMENTS-->

            
        </section>
             <!------------------------- END OF RIGHT ------------------------->
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>