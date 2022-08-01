<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
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
                    <a href="#"class="active" >
                        <span class="material-icons-sharp">pie_chart</span>
                        <h4>Relatórios</h4>
                    </a>
                    <a href="../lancamentos/lancamentos.php" >
                        <span class="material-icons-sharp">pie_chart</span>
                        <h4>Lançamentos</h4>
                    </a>
                </div>   
        </aside>

        <!------------------------- END OF ASIDE------------------------>

        <section class="middle">
            <div class="header">
                <h1>Período de: </h1>
                <input type="date">
                <h2>a</h2>
                <input type="date">
            </div>

            <canvas id="chart"></canvas>

        </section>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="main.js"></script>
</body>
</html>