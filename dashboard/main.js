var categorias = ["Alimentação", "Despesas Fixas", "Saude", "Lazer", "Outros"];
var valoresCat = [220 , 149, 644, 24, 15];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
	];

new Chart("categorias", {
  type: "pie",
  data: {
    labels: categorias,
    datasets: [{backgroundColor: barColors, data: valoresCat}]
  },
  options: {
    responsive:true,
    title: {
      display: true ,
      text: "Despesas por Categorias"
    }
  }
});


//     options:{
//         responsive:true
//     }
// })

// new Chart(chart, {
//     type: 'bar',
//     data: {
//         labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dez',],

//         datasets: [
//             {
//                 label: 'Receitas',
//                 data: [29374, 33537, 49631, 59095, 57828, 36684, 33572, 39774, 48847, 48116, 61004],
//                 backgroundColor:'red',
//                 borderWidth: 3
//             },
//             {
//                 label: 'Despesas',
//                 data: [31500, 41000, 88800, 26000, 46000, 32698, 5000, 3000, 18656, 24832, 36844],
//                 backgroundColor:'blue',
//                 borderWidth: 3
//             },
//             {
//                 label: 'Saldo',
//                 data: [10500, 5560, 8679, -1500, 9676, 6879, 1254, -4500, 250, 489, 2222],
//                 backgroundColor:'yellow',
//                 borderWidth: 3
//             },

//         ]
//     },
//     options:{
//         responsive:true
//     }
// })


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

