<?php
    include('controler/includes.php');
		
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Righteous&family=Sarala:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

	<div class="container">
			<div class="main">
				<div id="login-container" class="main-center margin-login">
					<div id="btns-layout">
						<button id="faz-login" class="btn-active" onclick="loginVisivel()">Faça seu Login</button>
						<button id="faz-cadastro"class="btn-desative" onclick="cadastroVisivel()">Faça seu cadastro</button>
					</div>					
					<form class="" method="post" action="./controler/function.php">
						<input type="hidden" name="login" value="true">
											
						<div class="form-group">
							<label for="email">Email</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" placeholder="Digite seu Email"/>
								</div>
						</div>

						<div class="form-group">
							<label for="password">Senha</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" placeholder="Digite sua senha"/>
								</div>
						</div>
						
						<input type="checkbox" name="lembrar-me" id="lembrar-me"> lembrar-me <a class="float-rigth" href="#">Esqueceu sua senha?</a>
						
						<button type="submit" class="btn-login">Entrar</button>
						
					</form>
				</div><!--end-login-->
				<div id="cadastro-container" class="main-center" style="display:none;">
					
				<div id="btns-layout">
						<button id="faz-login" class="btn-desative" onclick="loginVisivel()">Faça seu Login</button>
						<button id="faz-cadastro" class="btn-active" onclick="cadastroVisivel()">Faça seu cadastro</button>
					</div>					
					
					<form id="form-register" method="POST" action="./model/crudUser.php">
						
						<div class="form-group">
							<label for="user">Usuário</label>
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="user" id="user"  placeholder="Digite seu nome de usuário"/>
							</div>
						</div>	

						<div class="form-group">
							<label for="email">Seu Email</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="email" class="form-control" name="email" id="email" placeholder="Digite seu Email"/>
							</div>
						</div>					

						<div class="form-group">
							<label for="password">Sua senha</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password"/>
								</div>
						</div>

						<div class="form-group">
							<label for="confirm">Confirme sua senha</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="confirm" id="confirm" placeholder="Repita sua senha"/>
							</div>
						</div>

						<button type="submit" id="btn-register" class="btn-login">Cadastrar</button>
						
					</form>
				</div><!--main-center"-->
                
			</div><!--main-->
		</div><!--container-->
        
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
		<script src="js/loginRegister.js"></script>
</body>
</html>