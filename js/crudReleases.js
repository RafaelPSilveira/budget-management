$('#money').maskMoney({ prefix: 'R$ ', allowNegative: false, thousands: '.', decimal: ',', affixesStay: true });

function tiraMasc(maskInput) {
    maskInput = $(maskInput)
    return maskInput.maskMoney('unmasked')[0]
}

btnLancar = document.getElementById('lancar');
btnLancar.addEventListener("click", function(e) {
    e.preventDefault();
    clearModal();

    btnSalvar = document.getElementById('btn-NewReleases');
    btnSalvar.classList.add('btn-NewReleases');

    if (document.getElementsByClassName("btn-NewReleases")) {
        btnReleases = document.getElementsByClassName("btn-NewReleases");
        btnReleases[0].addEventListener("click", function(e) {
            e.preventDefault();


            const newRelease = async() => {
                try {
                    let name = document.getElementById("name").value;
                    let release_date = document.getElementById("date").value;
                    console.log(release_date);
                    let balance = document.getElementById("balance").value;
                    let category = document.getElementById("category").value;
                    let value = tiraMasc('#money');
                    let description = document.getElementById("description").value;
                    let sessionEmail = document.getElementById("hdnSession").value;

                    var params = { name: name, releaseDate: release_date, balance: balance, category: category, value: value, description: description, sessionEmail: sessionEmail };

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
        let limite = window.location.href == "http://localhost:8000/pages/dashboard.php" ? 5 : 10
        await axios.get('../model/releaseDB.php?limite=' + limite, { params: { type: "read_releases" }, }, { headers: { 'Content-Type': 'application/json' } })
            .then(function(response) {
                releases = response.data;

                if (releases) {
                    for (const release in releases) {

                        var table = document.getElementById('releases');

                        var numLines = table.rows.length;
                        var linha = table.insertRow(numLines);
                        var idRelease = linha.insertCell(0);
                        var date = linha.insertCell(1);
                        var nome = linha.insertCell(2);
                        var tipo = linha.insertCell(3);
                        var categoria = linha.insertCell(4);
                        var valor = linha.insertCell(5);
                        var OBS = linha.insertCell(6);
                        var opcoes = linha.insertCell(7);
                        idRelease.innerHTML = releases[release].id;
                        nome.innerHTML = releases[release].name_include;
                        date.innerHTML = new Date(releases[release].release_date).toLocaleDateString('pt-BR')
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
    var releaseDate = $(element).closest("tr").find("td:nth-child(2)").text();
    var nomeRelease = $(element).closest("tr").find("td:nth-child(3)").text();
    var tipoRelease = $(element).closest("tr").find("td:nth-child(4)").text();
    var categoriaRelease = $(element).closest("tr").find("td:nth-child(5)").text();
    var valorRelease = $(element).closest("tr").find("td:nth-child(6)").text();
    var obsRelease = $(element).closest("tr").find("td:nth-child(7)").text();

    var inputName = document.getElementById('name');
    inputName.value = nomeRelease.toString();

    var inputDate = document.getElementById('date');
    inputDate.value = convertDate(releaseDate.toString());
    console.log(releaseDate);

    var inputType = document.getElementById('balance');
    inputType.value = tipoRelease.toString();

    var inputCategory = document.getElementById('category');
    createOpt();
    inputCategory.value = categoriaRelease.toString();

    var inputValue = document.getElementById('money');
    inputValue.value = valorRelease.toString();

    var inputObs = document.getElementById('description');
    inputObs.value = obsRelease.toString();



    btnSalvar = document.getElementById('btn-NewReleases');
    btnSalvar.classList.add('update');
    if (document.getElementsByClassName("update")) {
        btnReleases = document.getElementsByClassName("update");
        btnReleases[0].addEventListener("click", function(e) {
            e.preventDefault();
            updateRelease(idRelease);
        })
    }
}

async function updateRelease(element) {
    try {
        let idRelease = element;
        let name = document.getElementById("name").value;
        let releaseDate = document.getElementById("date").value;
        let balance = document.getElementById("balance").value;
        let category = document.getElementById("category").value;
        let value = tiraMasc('#money');
        let description = document.getElementById("description").value;

        var params = { idRelease: idRelease, name: name, releaseDate: releaseDate, balance: balance, category: category, value: value, description: description };

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
    createOpt();
})

function createOpt() {
    var receita = [];
    receita[0] = 'Salário';
    receita[1] = 'Renda extra';
    receita[2] = 'Rendimento';
    receita[3] = 'Outros';

    var despesas = [];
    despesas[0] = 'Despesas Fixas';
    despesas[1] = 'Alimentação';
    despesas[2] = 'Saúde';
    despesas[3] = 'Lazer';
    despesas[4] = 'Outros';

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
}

const cardReceitas = async() => {
    try {
        let year = await getLastDay()[0];
        let month = await getLastDay()[1].toString();
        let fullDate = await getLastDay()[2];


        var params = { year: year, month: month, fullDate: fullDate }

        await axios.get('../model/releaseDB.php?type=read_cards', { params: params }, { headers: { 'Content-Type': 'application/json' } })
            .then((response) => {

                var valorReceitas = isNaN(response.data[0].value_receitas) ? 0 : response.data[0].value_receitas
                var valorDespesas = isNaN(response.data[1].value_despesas) ? 0 : response.data[1].value_despesas

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
    return arr;

}

function clearModal() {

    let name = document.getElementById("name");
    let date = document.getElementById("date");
    let balance = document.getElementById("balance");
    let category = document.getElementById("category");
    let value = document.getElementById("money");
    let description = document.getElementById("description");

    name.value = '';
    date.value = '';
    balance.value = '';
    category.value = '';
    value.value = '';
    description.value = '';
}

// function converteDate(date) {
//     let d = new Date(date);
//     let ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
//     let da = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(d);
//     let mo = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
//     let fullDate = `${ye}-${mo}-${da}`;
//     console.log(fullDate);
//     return fullDate;
// }

var todaysDate = new Date();

function convertDate(date) {
    var yyyy = new Date(date).getFullYear().toString();
    var mm = (new Date(date).getMonth() + 1).toString();
    var dd = new Date(date).getDate().toString();
    console.log('mes:' + mm, "dia:" + dd);
    var mmChars = mm.split('');
    var ddChars = dd.split('');

    return yyyy + '-' + (mmChars[1] ? mm : "0" + mmChars[0]) + '-' + (ddChars[1] ? dd : "0" + ddChars[0]);
}

console.log(convertDate(todaysDate));