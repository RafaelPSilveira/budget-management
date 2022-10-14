btnReleases = document.getElementById("btn-NewReleases");
btnReleases.addEventListener("click", function(e) {
    e.preventDefault();


    const newRelease = async() => {
        try {
            let name = document.getElementById("name").value;
            let balance = document.getElementById("balance").value;
            let category = document.getElementById("category").value;
            let value = document.getElementById("money").value;
            let description = document.getElementById("description").value;
            let sessionEmail = document.getElementById("hdnSession").value;

            var params = { name: name, balance: balance, category: category, value: value, description: description, sessionEmail: sessionEmail };

            await axios
                .post(
                    "../model/releaseDB.php",
                    params, { params: { type: "create_release" } }, { headers: { "Content-type": "application/json" } }
                )
                .then((response) => {
                    // alert(response.data);
                    document.location.reload(true);
                }).catch(e => {
                    console.log(e);
                })

        } catch (err) {
            console.log(err);
        }
    };
    newRelease();

});

const readRelease = async() => {
    try {
        let limite = window.location.href == "http://localhost/budget-management/pages/dashboard.php" ? 5 : 0
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
                        valor.innerHTML = releases[release].value;
                        OBS.innerHTML = releases[release].obs;
                        opcoes.innerHTML = "<div class='dropdown'><button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown'><span class='material-icons-sharp'>add_circle</span></button><ul class='dropdown-menu'><li><button type='button' class='btn-primary' data-bs-toggle='modal' data-bs-target='#myModal' onclick='updateRelease(this)'>Editar</button>'</li><button type='button' class='btn-danger' data-bs-toggle='modal' data-bs-target='#myModal' onclick='updateRelease(this)'>Excluir</button></ul></div>";
                    }
                }

            })
    } catch (err) {
        console.error(err)
    }
}

readRelease();

function updateRelease(element) {

    var idRelease = $(element).closest("tr").find("td:first").text();
    var nomeRelease = $(element).closest("tr").find("td:nth-child(2)").text();
    var tipoRelease = $(element).closest("tr").find("td:nth-child(3)").text();
    var categoriaRelease = $(element).closest("tr").find("td:nth-child(4)").text();
    var valorRelease = $(element).closest("tr").find("td:nth-child(5)").text();
    var obsRelease = $(element).closest("tr").find("td:nth-child(6)").text();

    var campo = document.getElementById('name');
    console.log(campo);
    campo.value = nomeRelease.toString();
    console.log(campo);
}

function deleteRelease(element) {
    var idRelease = $(element).closest("tr").find("td:first").text();
}