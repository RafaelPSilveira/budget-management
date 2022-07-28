<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" href="./dashboard/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Righteous&family=Sarala:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="container">
            <img src="img/logo.png" class="logo">
            <!--div class="search-bar">
                <span class="material-icons-sharp">search</span>
                <input type="search" placeholder="Search">
            </div-->
            <div class="profile-area">
                <div class="theme-btn">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="profilePhoto">
                        <img src="./dashboard/img/profile-2.jpg">
                    </div>
                    <h5>Rafael</h5>
                    <span class="material-icons-sharp">expand_more</span>
                </div>
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
            </div>
        </div>
    </nav>
<!-- END OF NAVBAR-->
    <main>
        <aside>
                <button id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </button>
                <div class="sidebar">
                    <a href="#">
                        <span class="material-icons-sharp">dashboard</span>
                        <h4>Dashboard</h4>
                    </a>
                    <a href="relatorios.html "class="active" >
                        <span class="material-icons-sharp">pie_chart</span>
                        <h4>Relatórios</h4>
                    </a>
                    <a href="relatorios.html " >
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

            <!------------------------ END OF CARDS------------------------->

            <div class="monthly-report">
                <div class="report">
                    <h3>Receita no periodo</h3>
                    <div>
                        <details>
                            <h1>$29,023</h1>
                            <h6 class="success">+3.5%</h6>
                        </details>
                        <p class="text-muted">Compared to $26,938 last month</p>
                    </div>
                </div>
            <!------------------------ END OF INCOME REPORT------------------------->
                <div class="report">
                    <h3>Despesas no periodo</h3>
                    <div>
                        <details>
                            <h1>$9,005</h1>
                            <h6 class="danger">-6.5%</h6>
                        </details>
                        <p class="text-muted">Compared to $11,912 last month</p>
                    </div>
                </div>
                <div class="report">
                    <h3>Saldo no periodo</h3>
                    <div>
                        <details>
                            <h1>$118,224</h1>
                            <h6 class="danger">-17.8%</h6>
                        </details>
                        <p class="text-muted">Compared to $114,234 last month</p>
                    </div>
                </div>
                <!-- END OF TURNOVER REPORT-->
            </div>
            <!------------------------- END OF MONTLY REPORT ------------------------->

            <canvas id="chart"></canvas>

            <h1>Aqui vai a tabela</h1>

        </section>
        
        <!------------------------ END OF MIDDLE------------------------>

        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>Proximas despesas (Analizar)</h2>
                    <a href="#">More <span class="material-icons-sharp">chevron_right</span></a>
                </div>

                <div class="investment">
                    <img src="img/uniliver.png">
                    <h4>Unilever</h4>
                    <div class="data-time">
                        <p>7 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>                        
                    </div>
                    <div class="amount">
                        <h4>$20,033</h4>
                        <small class="danger">-4.27%</small>

                    </div>
                </div>
                <!-- END OF INVESTMENT-->
                <div class="investment">
                    <img src="img/tesla.png">
                    <h4>Tesla</h4>
                    <div class="data-time">
                        <p>1 Dec, 2021</p>
                        <small class="text-muted">11:54am</small>
                    </div>
                    <div class="bonds">
                        <p>5377</p>
                        <small class="text-muted">Bonds</small>                        
                    </div>
                    <div class="amount">
                        <h4>$720,110</h4>
                        <small class="success">+38.27%</small>

                    </div>
                </div>
                <!-- END OF INVESTMENT-->
                <div class="investment">
                    <img src="img/monster.png">
                    <h4>Unilever</h4>
                    <div class="data-time">
                        <p>1 Dec, 2021</p>
                        <small class="text-muted">4:02pm</small>
                    </div>
                    <div class="bonds">
                        <p>700</p>
                        <small class="text-muted">Bonds</small>                        
                    </div>
                    <div class="amount">
                        <h4>$13,110</h4>
                        <small class="success">+7.27%</small>

                    </div>
                </div>
                <!-- END OF INVESTMENT-->
                <div class="investment">
                    <img src="img/mcdonalds.png">
                    <h4>McDonalds</h4>
                    <div class="data-time">
                        <p>3 Dec, 2021</p>
                        <small class="text-muted">8:17pm</small>
                    </div>
                    <div class="bonds">
                        <p>5200</p>
                        <small class="text-muted">Bonds</small>                        
                    </div>
                    <div class="amount">
                        <h4>$20,033</h4>
                        <small class="danger">-1,02%</small>

                    </div>
                </div>
                <!-- END OF INVESTMENT-->
            </div>
            <!-- END OF INVESTMENTS-->

            <div class="recent-transactions">
                <div class="header">
                    <h2>Ultimos Registos (analizar)</h2>
                    <a href="#">More <span class="material-icons-sharp">chevron_right</span></a></a>
                </div>

                <div class="transactions">
                    <div class="service">
                        <div class="icon bg-purple-light">
                            <span class="material-icons-sharp purple">headphones</span></a>
                        </div>
                        <div class="details">
                            <h4>Music</h4>
                            <p>20.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="img/visa.png">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>-$20</h4>
                </div>
                 <!-- END OF TRANSACTION-->

                 <div class="transactions">
                    <div class="service">
                        <div class="icon bg-purple-light">
                            <span class="material-icons-sharp purple">shopping_bag</span></a>
                        </div>
                        <div class="details">
                            <h4>Shopping</h4>
                            <p>19.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="img/visa.png">
                        </div>
                        <div class="details">
                            <p>*1920</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>-$799</h4>
                </div>
                 <!-- END OF TRANSACTION-->

                 <div class="transactions">
                    <div class="service">
                        <div class="icon bg-success-light">
                            <span class="material-icons-sharp success">restaurant</span></a>
                        </div>
                        <div class="details">
                            <h4>Restaurant</h4>
                            <p>19.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="img/master card.png">
                        </div>
                        <div class="details">
                            <p>*8273</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>-$50</h4>
                </div>
                 <!-- END OF TRANSACTION-->

                 <div class="transactions">
                    <div class="service">
                        <div class="icon bg-danger-light">
                            <span class="material-icons-sharp danger">sports_esports</span></a>
                        </div>
                        <div class="details">
                            <h4>Games</h4>
                            <p>15.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="img/visa.png">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>-$44</h4>
                </div>
                 <!-- END OF TRANSACTION-->
                 <div class="transactions">
                    <div class="service">
                        <div class="icon bg-danger-light">
                            <span class="material-icons-sharp danger">medication</span></a>
                        </div>
                        <div class="details">
                            <h4>Pharmacy</h4>
                            <p>15.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="img/visa.png">
                        </div>
                        <div class="details">
                            <p>*1920</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>-$30</h4>
                </div>
                 <!-- END OF TRANSACTION-->
            </div>
            <!-- END OF RECENT TRANSACTIONS-->
        </section>
             <!------------------------- END OF RIGHT ------------------------->
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="main.js"></script>
</body>
</html>