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

                await axios.post("../model/crudUser.php", params, { params: { type: 'create_user' } }, { headers: { 'Content-type': 'application/json' } });

            }


        } catch (err) {
            console.log(err);
        }
    }

    register();

})

// async function register() {



//     try {

//         let user = document.getElementById('user').value;
//         let email = document.getElementById('email').value;
//         let password = document.getElementById('password').value;
//         var params = { user: user, email: email, password: password };

//         await axios.post("../model/crudUser.php", params, { params: { type: "create_user" } }, { headers: { 'Content-type': 'application/json' } });

//     } catch (err) {
//         console.log(err);
//     }
// }
// register()