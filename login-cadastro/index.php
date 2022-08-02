<?php
    include('../functions/includes.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Righteous&family=Sarala:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
			<div class="main">
				<div class="main-center margin-login">
					<div id="btns-layout">
						<button id="faz-login" class="btn-active" onclick="">Faça seu Login</button>
						<button id="faz-cadastro"class="btn-desative" onclick="">Faça seu cadastro</button>
					</div>					
					<form class="" method="post" action="../dashboard/./home.php">
											
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
				<div class="main-center" style="display: none;">
					
				<div id="btns-layout">
						<button id="faz-login" class="btn-desative" onclick="">Faça seu Login</button>
						<button id="faz-cadastro" class="btn-active" onclick="">Faça seu cadastro</button>
					</div>					
					
					<form class="" method="post" action="#">
						
						<div class="form-group">
							<label for="name">Seu Nome</label>
								<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="name" id="name"  placeholder="Digite seu Name"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="lastname">Seu sobrenome</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Digite seu sobrenome"/>
							</div>
						</div>

						<div class="form-group">
							<label for="email">Seu Email</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="email" placeholder="Digite seu Email"/>
							</div>
						</div>

						<div class="form-group">
							<label for="CPF">Seu CPF</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="CPF" placeholder="Digite seu CPF"/>
							</div>
						</div>

						<div class="form-group">
							<label for="password">Sua senha</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" placeholder="Enter your Password"/>
								</div>
						</div>

						<div class="form-group">
							<label for="confirm">Confirme sua senha</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="confirm" placeholder="Repita sua senha"/>
							</div>
						</div>

						<button type="submit" class="btn-login">Cadastrar</button>
						
					</form>
				</div><!--main-center"-->
                
			</div><!--main-->
		</div><!--container-->
        
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>