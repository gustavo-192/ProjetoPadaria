<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pagina Interna</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="topo">
		<div id="topo-texto">
			<div id="topo-texto-nome">Padaria do João</div>
			<div id="topo-texto-saudacao"><?php echo ("Seja Bem-Vindo ".$_SESSION['nome']). "!";?> </a> </div>
		</div>
	</div>
		<div id="navegacao">
		<nav>
			<ul>
  				<li><a class="active" href="#Paes">Pães</a></li>
  				<li><a href="#Doces">Doces</a></li>
 				<li><a href="#Variedades">Variedades</a></li>
			</ul>
		</nav>
	</div>
	<div id="conteudo">
		<br><br><br>
		<img src="padariaJoao.jpg">
		<br><br><br><br><br><br><br><br>
		<a  href="index.php">LOGOUT</a><br><br>
		<a  href="cadastro.php">ATUALIZAR</a><br>
		<?php

		 $_SESSION["atualiza"] = "Atualizar";

		?>

	</div>
</body>
</html>