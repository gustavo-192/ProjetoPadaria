<?php
	$servidor = "den1.mysql4.gear.host";
	$usuario = "bd95padariajoao";
	$senha = "Rd5Y0~Bw2W!7";
	$db = "bd95padariajoao";

	$conn = mysqli_connect($servidor,$usuario,$senha,$db);

	if(!$conn){
		die("Erro MySQL connect: " . mysqli_connect_error() . " - " . mysqli_connect_errno());
	}else
	{
		// echo ("Conexão criada com sucesso");
	}
?>