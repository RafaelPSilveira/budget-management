<?php
    include('../functions/includes.php');
    $dados = $_REQUEST;
    
    $login = login($dados['email'],$dados['password'],$connect); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Righteous&family=Sarala:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    if(empty( $dados['email']) && empty($dados['password'])){
        header('location:../login-cadastro/index.php');
        echo "voce precisa estar logado!";
    }
    else {?>
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
                        <img src="img/profile-2.jpg">
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
                    <a href="#" class="active" >
                        <span class="material-icons-sharp">dashboard</span>
                        <h4>Dashboard</h4>
                    </a> 
                    
                    <!--a href="#" >
                        <span class="material-icons-sharp">account_balance_wallet</span>
                        <h4>Wallet</h4>
                    </a-->
                    <!--a href="#" >
                        <span class="material-icons-sharp">payment</span>
                        <h4>Lançamentos</h4>
                    </a-->
                    <a href="../relatorios.php" >
                        <span class="material-icons-sharp">pie_chart</span>
                        <h4>Relatórios</h4>
                    </a>
                    <!--a href="#" >
                        <span class="material-icons-sharp">message</span>
                        <h4>Messagens</h4>
                    </a> 
                        <a href="#" >
                            <span class="material-icons-sharp">help_center</span>
                            <h4>Help Center</h4>
                        </a>
                        <a href="#" >
                                <span class="material-icons-sharp">settings</span>
                                <h4>Settings</h4>
                        </a-->
                </div>
                <!------------------------END OF SIDEBAR------------------------>
                <!--div class="updates">
                    <span class="material-icons-sharp">update</span>
                    <h4>Updates Availabre</h4>
                    <p>Security Updates</p>
                    <p>General Updates</p>
                    <a href="#">Update Now</a>
                </div-->    
        </aside>

        <!------------------------- END OF ASIDE------------------------>

        <section class="middle">
            <div class="header">
                <h1>Visão Geral</h1>
                <input type="date">
            </div>

            <div class="cards">

                <div class="card">
                    <div class="top">
                        <div class="left">
                            <img src="img/BTC.png">
                            <h2>Receitas</h2>
                        </div>
                        <img src="img/visa.png" class="right">
                    </div>

                    <div class="middle">
                        <h1>$827,199</h1>
                        <!--img src="img/card chip.png" class="chip"-->
                    </div>

                    <div class="bottom">
                        <div class="left">
                            <small>Card Holder</small>
                            <h5>RAFAEL</h5>
                        </div>
                        <!--div class="right">
                           <div class="expiry">
                            <small>Expiry</small>
                            <h5>08/23</h5>
                           </div> 
                           <div class="cvv">
                            <small>CVV</small>
                            <h5>123</h5>
                           </div>
                        </div-->


                    </div>                

                </div>

                <!-- END OF CARD 1-->

                <div class="card">
                    <div class="top">
                        <div class="left">
                            <img src="img/ETH.png">
                            <h2>Despesas</h2>
                        </div>
                        <img src="img/master card.png" class="right">
                    </div>

                    <div class="middle">
                        <h1>$95,623</h1>
                        <div class="chip">
                            <!--img src="img/card chip.png"-->
                        </div>
                    </div>

                    <div class="bottom">
                        <div class="left">
                            <small>Card Holder</small>
                            <h5>RAFAEL</h5>
                        </div>
                        <div class="right">
                           <!--div class="expiry">
                            <small>Expiry</small>
                            <h5>08/23</h5>
                           </div> 
                           <div class="cvv">
                            <small>CVV</small>
                            <h5>123</h5>
                           </div-->
                        </div>


                    </div>                

                </div>

                <!-- END OF CARD 2-->

                <div class="card">
                    <div class="top">
                        <div class="left">
                            <img src="img/BTC.png">
                            <h2>Saldo</h2>
                        </div>
                        <img src="img/visa.png" class="right">
                    </div>

                    <div class="middle">
                        <h1>$74,384</h1>
                        <!--img src="img/card chip.png" class="chip"-->
                    </div>

                    <div class="bottom">
                        <div class="left">
                            <small>Card Holder</small>
                            <h5>RAFAEL</h5>
                        </div>
                        <!--div class="right">
                           <div class="expiry">
                            <small>Expiry</small>
                            <h5>08/24</h5>
                           </div> 
                           <div class="cvv">
                            <small>CVV</small>
                            <h5>123</h5>
                           </div-->
                        </div>


                    </div>                

                </div>

                <!-- END OF CARD 3-->

            </div>

            <!------------------------ END OF CARDS------------------------->
            <div class="monthly-report">
                <div class="report">
                    <h3>Receita Mês anterior</h3>
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
                    <h3>Despesas Mês anterior</h3>
                    <div>
                        <details>
                            <h1>$9,005</h1>
                            <h6 class="danger">-6.5%</h6>
                        </details>
                        <p class="text-muted">Compared to $11,912 last month</p>
                    </div>
                </div>
                <!-- END OF EXPENSES REPORT-->
                <!--div class="report">
                    <h3>Cashback</h3>
                    <div>
                        <details>
                            <h1>$9.004</h1>
                            <h6 class="success">+7.1%</h6>
                        </details>
                        <p class="text-muted">Compared to $3,028 last month</p>
                    </div>
                </div-->
                <!-- END OF CASHBACK REPORT-->
                <div class="report">
                    <h3>Saldo anterior</h3>
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

            <div class="fast-register">
                <h2>Novo Registro</h2>
                <div class="badges">
                    <div class="badge">
                        <span class="material-icons-sharp">add</span>
                    </div>
                    <!--div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Training</h5>
                            <h4>$50</h4>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="bg-success"></span>
                        <div>
                            <h5>Internet</h5>
                            <h4>$40</h4>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Gas</h5>
                            <h4>$190</h4>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Movies</h5>
                            <h4>$35</h4>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Education</h5>
                            <h4>$999</h4>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="bg-danger"></span>
                        <div>
                            <h5>Eletricity</h5>
                            <h4>$109</h4>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Food</h5>
                            <h4>$399</h4>
                        </div>
                    </div-->
                </div>
            </div>

            <!------------------------ END OF FAST REGISTER ------------------------->
            <?php


            ?>
            <div class = recent-orders>
                <h2>Lançamentos Recentes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Data de Lançamento</th>
                            <th>Observações</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Conta de Luz</td>
                            <td>Despesas</td>
                            <td>Fixas</td>
                            <td>R$145,66</td>
                            <td>10/05/2022</td>
                            <td>Sem OBS</td>
                        </tr>
                        <tr>
                            <td>Conta de agua</td>
                            <td>Despesas</td>
                            <td>Fixas</td>
                            <td>R$55,66</td>
                            <td>12/05/2022</td>
                            <td>Sem OBS</td>
                        </tr>
                        <tr>
                            <td>Mercado</td>
                            <td>Despesa</td>
                            <td>Variavel</td>
                            <td>R$559,37</td>
                            <td>10/05/2022</td>
                            <td>Sem OBS</td>
                        </tr>
                        <tr>
                            <td>Salario</td>
                            <td>Receita</td>
                            <td>Salario</td>
                            <td>R$2.500,00</td>
                            <td>10/05/2022</td>
                            <td>Sem OBS</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#">Ver Todas</a>
            </div> 

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
    <?php
        }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="main.js"></script>
</body>
</html>