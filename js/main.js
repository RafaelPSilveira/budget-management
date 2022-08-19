btnRegister = document.getElementById('btn-register');
btnRegister.addEventListener('click', function() {


    const showRelease = async() => {

        try {
            let user = document.getElementById('user').value;
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let confirmPass = document.getElementById('confirm').value

            if (password != confirmPass) {

                console.log('senhas diferentes!!')

            } else {


                var params = { 'user': user, 'email': email, 'password': password };

                await axios.post("model/crudUser.php", params, { params: { type: 'create_user' } }, { headers: { 'Content-type': 'application/json' } }).then(() => {

                });

            }


        } catch (err) {
            console.log(err);
        }
    }

    showRelease();

})

function newRelease(idTable) {
    var table = document.getElementById(idTable);
    var numLines = table.rows.length;
    var linha = table.insertRow(numLines);
    var nome = linha.insertCell(0);
    var tipo = linha.insertCell(1);
    var categoria = linha.insertCell(2);
    var valor = linha.insertCell(3);
    var OBS = linha.insertCell(4);
    var celula6 = linha.insertCell(5);
    nome.innerHTML = document.getElementById('nome_lancamento').value;
    tipo.innerHTML = document.getElementById('tipo').value;;
    categoria.innerHTML = document.getElementById('categoria').value;;
    valor.innerHTML = document.getElementById('valor').value;;
    OBS.innerHTML = document.getElementById('obs').value;;
    celula6.innerHTML = "<button onclick='removeLine(this)'>Remover</button>";

    document.getElementById('nome_lancamento').value = "";
    document.getElementById('tipo').value = "";
    document.getElementById('categoria').value = "";
    document.getElementById('valor').value = "";
    document.getElementById('obs').value = "";



}

function removeLine(linha, idTable) {
    var i = linha.parentNode.parentNode.rowIndex;
    document.getElementById(idTable).deleteRow(i);
}