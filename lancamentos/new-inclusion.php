<?php
        include('../functions/includes.php')
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
<?php include ("../includes/navBar.php");?>
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
                    <a href="../lancamentos/lancamentos.php"class="active" >
                        <span class="material-icons-sharp">pie_chart</span>
                        <h4>Lançamentos</h4>
                    </a>
                </div>   
        </aside>
        <div class="container mt-5" >
        <?php include('message.php');?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Novo Lançamento
                            <a href="../lancamentos/lancamentos.php" class="btn-several float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="new-inclusion.php" method="POST">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="name" class="form-control" placeholder="Nome da Despesa">
                            </div>

                            <!-- <div class="mb-3">
                                <label for="type">Tipo de Lançamento:  </label>
                                <select id="type" name="tipo">
                                    <option value="receita">Receita</option>
                                    <option value="despesa">Despesa</option>
                                </select> 
                            </div> -->
                             <!-- <div class="mb-3">
                                <label for="category">Selecione a Categoria:</label>
                                <select id="category" name="category">
                                    <option value="receita">Despesas Fixas</option>
                                    <option value="despesa">Alimentação</option>
                                    <option value="despesa">Saúde</option>
                                    <option value="despesa">Lazer</option>
                                    <option value="despesa">Outros</option>
                                </select> 
                            </div> -->
                                
                            <div class="mb-3">
                                <label>Tipo</label>
                                <input type="text" name="tipo" class="form-control" placeholder="Receita ou Despesa">
                            </div>
                            <div class="mb-3">
                                <label>Categoria</label>
                                <input type="text" name="categoria" class="form-control" placeholder="Categoria">
                            </div>
                            <div class="mb-3">
                                <label>Valor</label>
                                <input type="text" name="value" class="form-control" placeholder="R$ 0,00">
                            </div>
                            <div class="mb-3">
                                <label>Descrição</label>
                                <input type="text" name="obs" class="form-control" placeholder="Descrição detalhada (Opcional)">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_include" class="btn-several"><b>SALVAR</b></button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>