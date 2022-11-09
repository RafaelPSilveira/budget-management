// var xValues = ["Receitas", "Despesas", "Saldo"];
// var yValues = [55, 49, 44];
// var barColors = ["red", "green", "blue", ];

// new Chart("myChart", {
//     type: "bar",
//     data: {
//         labels: xValues,
//         datasets: [{
//             backgroundColor: barColors,
//             data: yValues
//         }]
//     },
//     options: {
//         legend: { display: false },
//         title: {
//             display: false,
//             text: "World Wine Production 2018"
//         }
//     }
// });


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

// Validação campos do formulario

const form = document.getElementById('form');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');

form.addEventListener('submit', (event) => {
    event.preventDefault()
    nameValidate();
    // valueValidate();
    // typeValidate();
    // categoryValidate();
})

function setError(index) {
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';
}

function removeError(index) {
    campos[index].style.border = '';
    spans[index].style.display = 'none';
}

function nameValidate() {
    if (campos[0].value.length < 4) {
        setError(0)
    } else {
        removeError(0);
    }
}

function typeValidate() {
    if (campos[1].value == "") {
        setError(1)
    } else {
        removeError(1);
    }
}

function categoryValidate() {
    if (campos[2].value == '') {
        setError(2)
    } else {
        removeError(2);
    }
}

function valueValidate() {
    if (campos[3].value.length == "") {
        setError(3)
    } else {
        removeError(3);
    }
}

const selectInput = document.querySelectorAll('[required]')
    .forEach(function(form) {
        form.addEventListener('blur', () => {
            validatedForm()
            form.classList.add('form-control')
        })
    })

function validatedForm() {
    const inputSelect = document.querySelectorAll('[required]')

    const btnSave = document.getElementById('btn-NewReleases')
    if (inputSelect[0].value != "" && inputSelect[1].value != "" && inputSelect[2].value != "" && inputSelect[3].value != "" && inputSelect[4].value != "") {
        btnSave.classList.remove('disabled')
        console.log('teste');
    } else {
        btnSave.classList.add('disabled')
        console.log('aqui');
    }

}

// rray.prototype.slice.call(forms)
//     .forEach(function (form) {
//       form.addEventListener('submit', function (event) {
//         if (!form.checkValidity()) {
//           event.preventDefault()
//           event.stopPropagation()
//         }

//         form.classList.add('was-validated')
//       }, false)