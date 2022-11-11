<?php
include("../controler/includes.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                <a href="#" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h4>Dashboard</h4>
                </a>
                <a href="../pages/reports.php">
                    <span class="material-icons-sharp">pie_chart</span>
                    <h4>Relatórios</h4>
                </a>
                <a href="../pages/releases.php">
                    <span class="material-icons-sharp">message</span>
                    <h4>Lançamentos</h4>
                </a>
            </div>
        </aside>
        <!------------------------END OF ASIDE------------------------>
        <section class="middle d-flex flex-column">

        <?php include ("../templates/cards.php"); ?>
           
            <div class="releases ">
                <div class=" newRelease d-flex d-inline justify-content-between align-items-center">
                    <h4>Ultimos Lançamentos</h4>
                    <button type="button" id="lancar" class="btn-several float-end" data-bs-toggle="modal"
                        data-bs-target="#myModal">Lançar</button>
                </div>

                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">Insira os dados</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <form method="POST" action="../model/releaseDB.php" id="form" class="was-validated">
                                    <input type="hidden" id="hdnSession" value='<?php echo $_SESSION['email'] ?>' />
                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="name" id="name" class="required" placeholder="Nome do lançamento" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Data</label>
                                        <input type="date" name="date" max="" id="date" class="required" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="type">Tipo de Lançamento: </label>
                                        <select class="required" id="balance" name="tipo" required>
                                            <option value="">Selecione</option>
                                            <option value="Receita">Receita</option>
                                            <option value="Despesa">Despesa</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category">Selecione a Categoria: </label>
                                        <select class="required" id="category" name="category" required>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Valor</label>
                                        <input type="text" name="value" id="money" class="required" placeholder="R$ 0,00" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Descrição</label>
                                        <input type="text" name="obs" id="description" class="required"placeholder="Descrição detalhada (Opcional)">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btn-NewReleases" class="btn btn-success disabled" data-bs-dismiss="modal">Salvar</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="dialog"  tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Excluir</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Tem certeza que deseja excluir? Após excluir não tera volta.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" id="delete" class="btn btn-danger">Excluir</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--END OF MODAL RELEASE-->
            <div class=recent-orders>
                <table id="releases">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Observações</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <a href="../pages/releases.php" class="btn-several">Ver Todas</a>
            </div>
        </section>
        <!-- <section class="right">
            <div class="grafic">
                <div class="header">
                    <h2>Investments</h2>
                </div>
                <div>
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                </div>
        </section> -->
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../plugins/jquery.maskMoney.min.js"></script>
    <source src="../plugins/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="../js/crudReleases.js"></script>
    <script src="../js/main.js"></script>

</body>

</html>