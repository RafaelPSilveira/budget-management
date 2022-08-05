btnlogin = document.querySelectorAll('.btn-login');
btnCadastro = document.querySelector('.btn-cadastro');
mainLogin = document.getElementById('main-login');
mainCadastro = document.getElementById('main-cadastro');

btnlogin[1].addEventListener('click', () => {
    mainCadastro.style.display = 'none';
    mainLogin.style.display = 'block';

})

btnCadastro.addEventListener('click', () => {
    mainLogin.style.display = 'none';
    mainCadastro.style.display = 'block';
})