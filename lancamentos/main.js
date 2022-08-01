const chart = document.querySelector("#saldo").getContext('2d');

new Chart(chart, {
    type: 'bar',
    data: {
        labels: ['Jan'],

        datasets: [
            {
                label: 'Receitas',
                data: [3000],
                backgroundColor:'blue',
                borderWidth: 3
            },
            {
                label: 'Despesas',
                data: [1200],
                backgroundColor:'red',
                borderWidth: 3
            },
            {
                label: 'Saldo',
                data: [1800],
                backgroundColor:'green',
                borderWidth: 3
            },
            
        ]
    },
    options:{
        responsive:true
    }
})


// show or hide sidebar

const menuBtn = document.querySelector('#menu-btn');
const closeBtn = document.querySelector('#close-btn');
const sidebar = document.querySelector('aside');

menuBtn.addEventListener('click', () =>{
    sidebar.style.display = 'block';
})

closeBtn.addEventListener('click', () =>{
    sidebar.style.display = 'none';
})

//change theme

const themeBtn = document.querySelector('.theme-btn');

themeBtn.addEventListener('click', () =>{
    document.body.classList.toggle('dark-theme');

    themeBtn.querySelector('span:first-child').classList.toggle('active');

    themeBtn.querySelector('span:last-child').classList.toggle('active');
})

// Novo Lançamento

const menuNew      = document.querySelector('#newTrans'); 
const closeRelease = document.querySelector('#close');  
const nLanc        = document.querySelector('#tableTrans');

menuNew.addEventListener('click', () =>{
    nLanc.style.display = 'block';
})

closeRelease.addEventListener('click', () =>{
    nLanc.style.display = 'none';
})



function newRelease(idTable){
    var table = document.getElementById(idTable);
        var numLines        = table.rows.length;
        var linha           = table.insertRow(numLines);
        var nome            = linha.insertCell(0);
        var tipo            = linha.insertCell(1);   
        var categoria       = linha.insertCell(2);
        var valor           = linha.insertCell(3);
        var OBS             = linha.insertCell(4);   
        var celula6         = linha.insertCell(5); 
        nome.innerHTML      = document.getElementById('nome_lancamento').value; 
        tipo.innerHTML      = document.getElementById('tipo').value; ; 
        categoria.innerHTML =  document.getElementById('categoria').value; ;
        valor.innerHTML     = document.getElementById('valor').value; ;
        OBS.innerHTML       =  document.getElementById('obs').value; ;
        celula6.innerHTML   =  "<button onclick='removeLine(this)'>Remover</button>";

        document.getElementById('nome_lancamento').value = "";
        document.getElementById('tipo').value = "";
        document.getElementById('categoria').value = "";
        document.getElementById('valor').value = "";
        document.getElementById('obs').value = "";

       

}

function removeLine(linha) {
    var i=linha.parentNode.parentNode.rowIndex;
    document.getElementById('table').deleteRow(i);
}

