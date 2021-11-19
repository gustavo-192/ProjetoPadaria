<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>


	<title>Padaria do João</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="topo">
		<div id="topo-texto">
			<div id="topo-texto-nome">Padaria do João</div>
			<div id="topo-texto-saudacao"> Seja Bem-Vindo</div>
		</div>
	</div>	
	<div id="conteudo">
		<br><br><br><br><br>
		
		<form action="back.php" method="POST">
			<h2>Login:</h2><br><br><br><br>

				<label>Email:</label>
				<?php
					if(isset($_SESSION['email']))
					{
						echo ("<input type='text' name='email' value='".$_SESSION['email']. " '>");
						unset($_SESSION['email']);
					}else{
						echo ('<input type="text" name="email">');
					}
					
				?>
				<br><br>
				<label>Senha:</label>
				<?php
					if(isset($_SESSION['pass']))
					{
						echo ("<input type='password' name='pass' value='".$_SESSION['pass']. " '>");
						unset($_SESSION['pass']);
					}else{
						echo ('<input type="password" name="pass">');
					}
				?>
				<br><br><br>
				<input type="submit" value="ENTRAR">
				<br><br>
				<?php
					if(isset($_SESSION["ERRO"])){
						echo ($_SESSION["ERRO"]);
						unset($_SESSION["ERRO"]);
					}
				?>
				<a href="cadastro.php">Crie sua conta</a>
		</form><br><br><br><br>

		<h2>Venha conhecer a padaria do João!</h2>
	</div>
</body>
</html>
