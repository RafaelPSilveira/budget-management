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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php 
    if(empty( $dados['email']) && empty($dados['password'])){
        header('location:../login-cadastro/index.php');
        echo "voce precisa estar logado!";
    }
    else {?>

<?php include ("../includes/navBar.php"); ?>

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
                <a href="../relatorios/relatorios.php" >
                    <span class="material-icons-sharp">pie_chart</span>
                    <h4>Relatórios</h4>
                </a>
                <a href="../lancamentos/lancamentos.php" >
                    <span class="material-icons-sharp">message</span>
                    <h4>Lançamentos</h4>
                </a>           
            </div>
                <!------------------------END OF SIDEBAR------------------------>
               
        </aside>

        <!------------------------- END OF ASIDE------------------------>

        <section class="middle">
            <div class="header">
                <h1>Visão Geral</h1>
                
            </div>

            <div class="cards">

                <div class="card">
                    <div class="top">
                        <div class="left">
                        <span class="material-icons-sharp">monetization_on</span>
                            <h2>Receitas</h2>
                        </div>
                    </div>                   
                    <div class="middle">
                        <h1>R$ 3.000,00</h1>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Mês de referência</small>
                            <h5>JULHO</h5>
                        </div>
                    </div>                
                </div>

                <!-- END OF CARD 1-->

                <div class="card">
                    <div class="top">
                        <div class="left">
                            <span class="material-icons-sharp">add_shopping_cart</span>
                            <h2>Despesas</h2>
                        </div>           
                    </div>
                    <div class="middle">
                        <h1>R$ 1.800,00</h1>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Mês de referência</small>
                            <h5>JULHO</h5>
                        </div>
                    </div>                
                </div>

                <!-- END OF CARD 2-->

                <div class="card">
                    <div class="top">
                        <div class="left">
                            <span class="material-icons-sharp">account_balance</span>
                            <h2>Saldo</h2>
                        </div>
                    </div>
                    <div class="middle">
                        <h1>R$ 1.200,00</h1>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Mês de referência</small>
                            <h5>JULHO</h5>
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
            <!-------------------- END OF INCOME REPORT--------------------->
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
            <!-- <div class="card-header">
                <h4>Novo Lançamento
                    <a href="../lancamentos/lancamentos.php" class="btn-several float-end">Lançar</a>
                </h4>
            </div> 
            </br> -->

            <!-- <button id="newTrans" class="btn-new">Novo Lançamento</button> -->
           
            <!--div class="recent-orders">
       
                <div id="tableTrans" style="display: block;" class="recent-orders">
                    <table id="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Categoria</th>
                                <th>Valor</th>
                                <th>Observações</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" id="nome_lancamento" placeholder="Nome da Despesa"></td>
                                <td>
                                    <select id="tipo">
                                    <option value="">--Selecione--</option>   
                                    <option value="receita">Receita</option>
                                    <option value="despesa">Despesa</option>
                                    </select>
                                </td>
                                <td>
                                    <select id="categoria">
                                        <option value="">--Selecione--</option>   
                                        <option value="alimentacao">Alimentação</option>
                                        <option value="transporte">Transporte</option>
                                        <option value="educacao">Educação</option>
                                        <option value="saude">Saúde</option>
                                        <option value="diversao">Diversão</option>
                                        <option value="outros">Outros</option>
                                    </select> 
                                </td>
                                    <td><input type="number" id="valor" placeholder="R$ 0,00"></td>
                                    <td><input type="text" id="obs" placeholder="Observação(Opcional)"></td>
                                    <td><button onclick="newRelease('table')"><span class="material-icons-sharp">add</span></button></td>
                                </tr>
                        </tbody>
                    </table>

                    <button id="close" class="btn-table" style="float: left;">Fechar</button>
                    <div id="save">
                        <input type="submit" id="save" class="btn-table" style="float: right;" value="Salvar"></input>
                    </div>
                   
                </div>
                
                    
                
            </div>  -->
            

            <!------------------------ END OF FAST REGISTER ------------------------->
           
            <div class="card-header">
                <div>
                    <h4>Novo Lançamento
                        <a href="../lancamentos/new-inclusion.php" class="btn-several float-end">Lançar</a>
                    </h4>
                </div>
            </div>
            <div class = recent-orders>
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
                        <?php
                       $getTransactions=  getTransactions ($connect);
                        
                        ?>

                    </tbody>
                </table>
                <a href="../lancamentos/lancamentos.php" class="btn-several">Ver Todas</a>
            </div> 

        </section>
        
        <!------------------------ END OF MIDDLE------------------------>
        <div class="recent-transactions">
            <h2>Despesas por Categorias</h2>

                <div class="header">
                    <canvas id="categorias" style="width:100%;max-width:600px"></canvas>
                </div>

        </div>
            <!-- END OF RECENT TRANSACTIONS-->
        </section>
             <!------------------------- END OF RIGHT ------------------------->
    </main>
    <?php
        }
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>