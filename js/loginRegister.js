btnRegister = document.getElementById('btn-register');
btnRegister.addEventListener('click', function() {


    const register = async() => {

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

    register();

})

const btnLogin = document.querySelector('#faz-login');
const btnCadastrar = document.querySelector('#faz-cadastro');
const containerLogin = document.querySelector('#login-container');
const containerCadastro = document.querySelector('#cadastro-container');



function loginVisivel() {
    containerLogin.style.display = 'block';
    containerCadastro.style.display = 'none';
}

function cadastroVisivel() {
    containerCadastro.style.display = 'block';
    containerLogin.style.display = 'none';
}