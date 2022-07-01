<?php
    
?>

<!DOCTYPE html>
<html lang="en">
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
				<div class="main-center">
					<div id="btns-layout">
						<button id="faz-login" class="btn-active" onclick="#">Faça seu Login</button>
						<button id="faz-cadastro"class="btn-desative" onclick="#">Faça seu cadastro</button>
					</div>
					<h5>Sign up once and watch any of our free demos.</h5>
					<form class="" method="post" action="#">
						
						<div class="form-group">
							<label for="name">Your Name</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
							</div>
						</div>

						<div class="form-group">
							<label for="email">Your Email</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" placeholder="Enter your Email"/>
							</div>
						</div>

						<div class="form-group">
							<label for="username">Username</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" placeholder="Enter your Username"/>
								</div>
						</div>

						<div class="form-group">
							<label for="password">Password</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" placeholder="Enter your Password"/>
								</div>
						</div>

						<div class="form-group">
							<label for="confirm">Confirm Password</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" placeholder="Confirm your Password"/>
								</div>
						</div>

						<button type="submit" class="btn-login">SUBMIT</button>
						
					</form>
				</div><!--end-login-->
				<div class="main-center" style="display: none;">
					<div id="btns-layout">
						<button id="faz-login" class="btn-desative" onclick="#">Faça seu Login</button>
						<button id="faz-cadastro" class="btn-active" onclick="#">Faça seu cadastro</button>
					</div>
					<h5>Sign up once and watch any of our free demos.</h5>
					<form class="" method="post" action="#">
						
						<div class="form-group">
							<label for="name">Your Name</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
							</div>
						</div>

						<div class="form-group">
							<label for="email">Your Email</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" placeholder="Enter your Email"/>
							</div>
						</div>

						<div class="form-group">
							<label for="username">Username</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" placeholder="Enter your Username"/>
								</div>
						</div>

						<div class="form-group">
							<label for="password">Password</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" placeholder="Enter your Password"/>
								</div>
						</div>

						<div class="form-group">
							<label for="confirm">Confirm Password</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" placeholder="Confirm your Password"/>
								</div>
						</div>

						<button type="submit" class="btn-login">SUBMIT</button>
						
					</form>
				</div><!--main-center"-->
                
			</div><!--main-->
		</div><!--container-->
        
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>