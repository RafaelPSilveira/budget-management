const chart = document.querySelector("#chart").getContext('2d');

// create a new chart instance

new Chart(chart, {
    type: 'bar',
    data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dez',],

        datasets: [
            {
                label: 'Profile',
                data: [29374, 33537, 49631, 59095, 57828, 36684, 33572, 39774, 48847, 48116, 61004],
                backgroundColor:'red',
                borderWidth: 3
            },
            {
                label: 'Expenses',
                data: [31500, 41000, 88800, 26000, 46000, 32698, 5000, 3000, 18656, 24832, 36844],
                backgroundColor:'blue',
                borderWidth: 3
            },
            {
                label: 'Balance',
                data: [10500, 5560, 8679, -1500, 9676, 6879, 1254, -4500, 250, 489, 2222],
                backgroundColor:'yellow',
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