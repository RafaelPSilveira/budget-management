// btnRegister = document.getElementById('btn-modal');
// btnRegister.addEventListener('click', function() {


//     const createRelease = async() => {

//         try {
//             alert('aqui');
//             let name = document.getElementById('name').value;
//             let balance = document.getElementById('balance').value;
//             let category = document.getElementById('category').value;
//             let money = document.getElementById('money').value;
//             let description = document.getElementById('description').value;


//             var params = { 'name': name, 'balance': balance, 'category': category, 'money': money, 'description': description };


//             await axios.post("model/crudUser.php", params, { params: { type: 'create_releases' } }, { headers: { 'Content-type': 'application/json' } }).then(() => {

//             });

//         } catch (err) {
//             console.log(err);
//         }
//     }

//     createRelease();

// })

// function newRelease(idTable) {
//     var table = document.getElementById(idTable);
//     var numLines = table.rows.length;
//     var linha = table.insertRow(numLines);
//     var nome = linha.insertCell(0);
//     var tipo = linha.insertCell(1);
//     var categoria = linha.insertCell(2);
//     var valor = linha.insertCell(3);
//     var OBS = linha.insertCell(4);
//     var celula6 = linha.insertCell(5);
//     nome.innerHTML = document.getElementById('nome_lancamento').value;
//     tipo.innerHTML = document.getElementById('tipo').value;;
//     categoria.innerHTML = document.getElementById('categoria').value;;
//     valor.innerHTML = document.getElementById('valor').value;;
//     OBS.innerHTML = document.getElementById('obs').value;;
//     celula6.innerHTML = "<button onclick='removeLine(this)'>Remover</button>";

//     document.getElementById('nome_lancamento').value = "";
//     document.getElementById('tipo').value = "";
//     document.getElementById('categoria').value = "";
//     document.getElementById('valor').value = "";
//     document.getElementById('obs').value = "";



// }

// function removeLine(linha, idTable) {
//     var i = linha.parentNode.parentNode.rowIndex;
//     document.getElementById(idTable).deleteRow(i);
// }

// // Botão menu responsivo

// const menuBtn = document.querySelector('#menu-btn');
// const closeBtn = document.querySelector('#close-btn');
// const sidebar = document.querySelector('aside');

// menuBtn.addEventListener('click', () => {
//     sidebar.style.display = 'block';
// })

// closeBtn.addEventListener('click', () => {
//     sidebar.style.display = 'none';
// })

// Botão tema

const themeBtn = document.querySelector('.theme-btn');

themeBtn.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme');

    themeBtn.querySelector('span:first-child').classList.toggle('active');

    themeBtn.querySelector('span:last-child').classList.toggle('active');
})