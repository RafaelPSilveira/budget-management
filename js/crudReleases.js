btnLancar = document.getElementById('lancar');
btnLancar.addEventListener("click", function(e) {
    e.preventDefault();

    btnSalvar = document.getElementById('btn-NewReleases');
    btnSalvar.classList.add('btn-NewReleases');

    if (document.getElementsByClassName("btn-NewReleases")) {
        btnReleases = document.getElementsByClassName("btn-NewReleases");
        btnReleases[0].addEventListener("click", function(e) {
            e.preventDefault();


            const newRelease = async() => {
                try {
                    let name = document.getElementById("name").value;
                    let balance = document.getElementById("balance").value;
                    let category = document.getElementById("category").value;
                    let value = document.getElementById("money").value;
                    value = converter(value);
                    console.log(value);
                    let description = document.getElementById("description").value;
                    let sessionEmail = document.getElementById("hdnSession").value;

                    var params = { name: name, balance: balance, category: category, value: value, description: description, sessionEmail: sessionEmail };

                    await axios
                        .post(
                            "../model/releaseDB.php",
                            params, { params: { type: "create_release" } }, { headers: { "Content-type": "application/json" } }
                        )
                        .then((response) => {
                            // alert(response.data.msg);
                            document.location.reload(true);
                        }).catch(e => {
                            console.log(e);
                        })

                } catch (err) {
                    console.log(err);
                }
            };
            newRelease();

        }, false);
    }
})


const readRelease = async() => {
    try {
        let limite = window.location.href == "http://localhost:8000/pages/dashboard.php" ? 5 : 0
        await axios.get('../model/releaseDB.php?limite=' + limite, { params: { type: "read_releases" }, }, { headers: { 'Content-Type': 'application/json' } })
            .then(function(response) {
                releases = response.data;

                if (releases) {
                    for (const release in releases) {

                        var table = document.getElementById('releases');

                        var numLines = table.rows.length;
                        var linha = table.insertRow(numLines);
                        var idRelease = linha.insertCell(0);
                        var nome = linha.insertCell(1);
                        var tipo = linha.insertCell(2);
                        var categoria = linha.insertCell(3);
                        var valor = linha.insertCell(4);
                        var OBS = linha.insertCell(5);
                        var opcoes = linha.insertCell(6);
                        idRelease.innerHTML = releases[release].id;
                        nome.innerHTML = releases[release].name_include;
                        tipo.innerHTML = releases[release].type;
                        categoria.innerHTML = releases[release].category;
                        valor.innerHTML = parseFloat(releases[release].value).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                        OBS.innerHTML = releases[release].obs;
                        opcoes.innerHTML = "<div class='dropdown'><button type='button' id='chose' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown'><span class='material-icons-sharp'>add_circle</span></button><ul class='dropdown-menu'><li><button type='button' id='editar' class='btn-primary' data-bs-toggle='modal' data-bs-target='#myModal' onclick='btnUpdate(this)'>Editar</button>'</li><li><button type='button' class='btn-danger' data-bs-toggle='modal' data-bs-target='#dialog' onclick='deleteRelease(this)'>Excluir</button></li></ul></div>";
                    }
                }

            })
    } catch (err) {
        console.error(err)
    }

}

readRelease();

function btnUpdate(element) {

    var idRelease = $(element).closest("tr").find("td:first").text();
    var nomeRelease = $(element).closest("tr").find("td:nth-child(2)").text();
    var tipoRelease = $(element).closest("tr").find("td:nth-child(3)").text();
    var categoriaRelease = $(element).closest("tr").find("td:nth-child(4)").text();
    var valorRelease = $(element).closest("tr").find("td:nth-child(5)").text();
    var obsRelease = $(element).closest("tr").find("td:nth-child(6)").text();
    console.log(idRelease);
    var campo = document.getElementById('name');
    campo.value = nomeRelease.toString();
    var campo = document.getElementById('balance');
    campo.value = tipoRelease.toString();
    var campo = document.getElementById('category');
    campo.value = categoriaRelease.toString();
    var campo = document.getElementById('money');
    campo.value = valorRelease.toString();
    var campo = document.getElementById('description');
    campo.value = obsRelease.toString();



    btnSalvar = document.getElementById('btn-NewReleases');
    btnSalvar.classList.add('update');
    if (document.getElementsByClassName("update")) {
        btnReleases = document.getElementsByClassName("update");
        btnReleases[0].addEventListener("click", function(e) {
            e.preventDefault();
            console.log('chguei aqui')
            updateRelease(idRelease);
        })
    }
}

async function updateRelease(element) {
    try {
        let idRelease = element;
        let name = document.getElementById("name").value;
        let balance = document.getElementById("balance").value;
        let category = document.getElementById("category").value;
        let value = document.getElementById("money").value;
        let description = document.getElementById("description").value;

        var params = { idRelease: idRelease, name: name, balance: balance, category: category, value: value, description: description };

        await axios
            .post(
                "../model/releaseDB.php",
                params, { params: { type: "update_releases" } }, { headers: { "Content-type": "application/json" } }
            )
            .then((response) => {
                // alert(response.data.msg);
                document.location.reload(true);
            }).catch(e => {
                console.log(e);
            })

    } catch (err) {
        console.log(err);
    }

}


function deleteRelease(element) {

    var idRelease = $(element).closest("tr").find("td:first").text();

    btnDelete = document.getElementById('delete');
    btnDelete.addEventListener('click', async() => {

        try {
            var params = { idRelease: idRelease }

            await axios
                .post(
                    "../model/releaseDB.php",
                    params, { params: { type: "delete_releases" } }, { headers: { "Content-type": "application/json" } }
                )
                .then((response) => {
                    // alert(response.data.msg);
                    document.location.reload(true);
                }).catch(e => {
                    console.log(e);
                })

        } catch (err) {
            console.log(err);
        }
    })
}

listenCategory = document.getElementById('balance')
listenCategory.addEventListener('click', async() => {
    var receita = [];
    receita[0] = 'salario';
    receita[1] = 'Renda extra';
    receita[2] = 'Rendimento';
    receita[3] = 'Outros';

    var despesas = [];
    despesas[0] = 'Despesas Fixas';
    despesas[1] = 'Alimentação';
    despesas[2] = 'Saúde';
    despesas[3] = 'Lazer';
    despesas[4] = 'Outros';


    let btnBalance = document.getElementById('balance').value
    console.log(btnBalance);
    let campCategory = document.getElementById('category')



    if (document.getElementById('balance').value == 'Receita') {

        if (campCategory.childElementCount < 4)
            for (let i = 0; i < receita.length; i++) {
                opt = document.createElement('option');
                opt.value = receita[i];
                opt.innerHTML = receita[i];
                campCategory.appendChild(opt);
            } else {

                $("#category option").each(function() {
                    $(this).remove();
                });

                for (let i = 0; i < receita.length; i++) {
                    opt = document.createElement('option');
                    opt.value = receita[i];
                    opt.innerHTML = receita[i];
                    campCategory.appendChild(opt);
                }

            }

    } else {

        if (campCategory.childElementCount < 4)
            for (let i = 0; i < despesas.length; i++) {
                opt = document.createElement('option');
                opt.value = despesas[i];
                opt.innerHTML = despesas[i];
                campCategory.appendChild(opt);
            } else {

                $("#category option").each(function() {
                    $(this).remove();
                });

                for (let i = 0; i < despesas.length; i++) {
                    opt = document.createElement('option');
                    opt.value = despesas[i];
                    opt.innerHTML = despesas[i];
                    campCategory.appendChild(opt);
                }

            }
    }
})

const cardReceitas = async() => {
    try {

        await axios.get('../model/releaseDB.php', { params: { type: "read_cards" }, }, { headers: { 'Content-Type': 'application/json' } })
            .then((response) => {

                var valorReceitas = response.data[0].value_receitas
                var valorDespesas = response.data[1].value_despesas


                var receitas = document.getElementById('receitas')
                var receitasH1 = document.createElement('h1')
                receitasH1.innerHTML = parseFloat(valorReceitas).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                receitas.appendChild(receitasH1)

                var month = document.querySelectorAll('.bottom .left')
                for (let i = 0; i < month.length; i++) {
                    monthH5 = document.createElement('h5')
                    monthH5.innerHTML = new Date().toLocaleDateString('pt-BR', { month: 'long' }).toUpperCase()
                    month[i].appendChild(monthH5)
                }

                var despesas = document.getElementById('despesas')
                var despesasH1 = document.createElement('h1')
                despesasH1.innerHTML = parseFloat(valorDespesas).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                despesas.appendChild(despesasH1)

                var saldo = document.getElementById('saldo')
                var saldoH1 = document.createElement('h1')
                saldoH1.innerHTML = parseFloat(valorReceitas - valorDespesas).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                saldo.appendChild(saldoH1)


            })

    } catch (err) {
        console.log(err);
    }
}

cardReceitas();

function converter(valor) {
    var numero = valor.toString().split('.').join('').replace(',', '.');
    return numero
}

const moneyConverter = document.getElementById('description')
moneyConverter.addEventListener('focus', () => {
    money = document.getElementById('money')
    console.log(money.value);

    if (money.value) {
        money.value.split(',').join('.').replace('R$', '');
        converterM = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(parseFloat(money.value))
    } else {
        money.value.split(',').join('.').replace('R$', '');
        converterM = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(parseFloat(money.value))
    }

    console.log(converterM);

    money.value = converterM;
    console.log(converterM);
})

// const teste = async (valor) => {
//     teste2 = parseInt(valor);
//     document.getAnimations('money').value = teste2;
//     console.log(teste2.toFixed(2));
// console.log(new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(teste2));
// if (teste2.length >= 3) {
//     teste2[teste2.length - 3];
//     console.log(teste2[teste2.length - 3].to.join(','))
// }

// console.log(new Date(new Date().getTime() - (new Date().getTimezoneOffset() * 60000))
//     .toISOString()
//     .split("T")[0])

function getLastDay() {
    var month = new Date().toLocaleDateString('pt-BR', { month: 'numeric' }) - 1;
    var year = new Date().toLocaleDateString('pt-BR', { year: 'numeric' });
    var date = new Date(Date.UTC(year, month, 1));
    var days = [];
    while (date.getUTCMonth() == month) {
        days.push(new Date(date));
        date.setUTCDate(date.getUTCDate() + 1);

    }
    month += 1
    var fullDate = `${year}-${month}-${days.length}`
    var arr = [year, month, fullDate]
    return

}

getLastDay()