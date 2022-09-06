<?php
include("../controler/includes.php");
// echo $_SESSION['cookie'];


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body>
    <?php include ("../templates/navbar.php"); ?>

    <main class="text-decoration-none">
        <aside class="d-flex justify-content-between">
            <button id="close-btn">
                <span class="material-icons-sharp">close</span>
            </button>

            <div class="sidebar d-flex  flex-column">
                <a href="#" class="active" >
                    <span class="material-icons-sharp">dashboard</span>
                    <h4>Dashboard</h4>
                </a> 
                <a href="../pages/reports.php" >
                    <span class="material-icons-sharp">pie_chart</span>
                    <h4>Relatórios</h4>
                </a>
                <a href="../pages/releases.php" >
                    <span class="material-icons-sharp">message</span>
                    <h4>Lançamentos</h4>
                </a>           
            </div>                            
        </aside>
        <!------------------------END OF ASIDE------------------------>  
        <section  class="middle d-flex flex-column">
            
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

            <div class="releases ">
                    <div class=" newRelease d-flex d-inline justify-content-between align-items-center">
                        <h4>Ultimos Lançamentos</h4>
                        <button type="button" class="btn-several float-end" data-bs-toggle="modal" data-bs-target="#myModal">Lançar</button>
                    </div>

                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
        
                                <div class="modal-header">
                                    <h4 class="modal-title">Insira os dados</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <form method="POST" action="../model/releaseDB.php">
                                        <div class="mb-3">
                                            <label>Nome</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Nome da Despesa">
                                        </div>
                                        <div class="mb-3">
                                            <label for="type">Tipo de Lançamento:  </label>
                                            <select id="balance" name="tipo">
                                                <option value="receita">Receita</option>
                                                <option value="despesa">Despesa</option>
                                            </select> 
                                        </div> 
                                        <div class="mb-3">
                                            <label for="category">Selecione a Categoria:</label>
                                            <select id="category" name="category">
                                                <option value="receita">Despesas Fixas</option>
                                                <option value="despesa">Alimentação</option>
                                                <option value="despesa">Saúde</option>
                                                <option value="despesa">Lazer</option>
                                                <option value="despesa">Outros</option>
                                            </select> 
                                        </div>
                                        <div class="mb-3">
                                            <label>Valor</label>
                                            <input type="text" name="value" id="money" class="form-control" placeholder="R$ 0,00">
                                        </div>
                                        <div class="mb-3">
                                            <label>Descrição</label>
                                            <input type="text" name="obs" id="description" class="form-control" placeholder="Descrição detalhada (Opcional)">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btn-modal" class="btn btn-success" data-bs-dismiss="modal">Salvar</button>
                                        </div>
                                    </form>

                                </div>
        
                            </div>
                        </div>
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
                                // $getTransactions=  getTransactions ($connect);
                            
                            ?>
                        </tbody>
                    </table>
                    <a href="../pages/releases.php" class="btn-several">Ver Todas</a>
                </div> 
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- <script src="../js/main.js"></script> -->
</body>
</html>