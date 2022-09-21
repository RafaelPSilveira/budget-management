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
                    alert(response.data);
                }).then(document.location.reload(true))
        } catch (err) {
            console.log(err);
        }
    };
    newRelease();

});

const readRelease = async() => {
    try {
        await axios.get('../model/releaseDB.php', { params: { type: "read_releases" }, }, { headers: { 'Content-Type': 'application/json' } })
            .then(function(response) {
                releases = response.data;

                if (releases) {
                    if (window.location.href == "http://localhost/budget-management/pages/releases.php") {

                        for (const release in releases) {

                            var table = document.getElementById('releasesAll');

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
                            opcoes.innerHTML = "<div class='dropdown'><button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown'><span class='material-icons-sharp'>add_circle</span></button><ul class='dropdown-menu'><li><a class='dropdown-item' href='#'>Editar</a></li><li><a class='dropdown-item' href='#'>Excluir</a></li></ul></div>";
                        }

                    }
                    if (window.location.href == "http://localhost/budget-management/pages/dashboard.php")
                        for (let release = 0; release < 5; release++) {
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
                            opcoes.innerHTML = "<div class='dropdown'><button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown'><span class='material-icons-sharp'>add_circle</span></button><ul class='dropdown-menu'><li><a class='dropdown-item' href='#'>Editar</a></li><li><a class='dropdown-item' href='#'>Excluir</a></li></ul></div>";
                        }
                }
            })
    } catch (err) {
        console.error(err)
    }
}
readRelease();