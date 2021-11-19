<?php

session_start();

?>


<?php
	
	print_r($_POST);

	include("conexao.php");
	
		 $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
	$sobrenome = mysqli_real_escape_string($conn, $_POST["sobrenome"]);
		$idade = mysqli_real_escape_string($conn, $_POST["idade"]);
	 $telefone = mysqli_real_escape_string($conn, $_POST["telefone"]);
		  $rua = mysqli_real_escape_string($conn, $_POST["rua"]);
	   $numero = mysqli_real_escape_string($conn, $_POST["numero"]);
	   $cidade = mysqli_real_escape_string($conn, $_POST["cidade"]);
	   $estado = mysqli_real_escape_string($conn, $_POST["estado"]);
	      $cep = mysqli_real_escape_string($conn, $_POST["cep"]);
	  $usuario = mysqli_real_escape_string($conn, $_POST["usuario"]);
	    $senha = mysqli_real_escape_string($conn, $_POST["senha"]);

 		echo $numero;
	
	 		$sql = "INSERT INTO tbpessoa
	 		(Nome,
	 		Sobrenome,
	 		Idade,
	 		Telefone,
	 		Rua,
	 		Numero,
	 		Cidade,
	 		Estado,
	 		CEP
	 		)
	 		VALUES
	 		(
	 		'".$nome."',
	 		'".$sobrenome."',
	 		'".$idade."',
	 		'".$telefone."',
	 		'".$rua."',
	 		'".$numero."',
	 		'".$cidade."',
	 		'".$estado."',
	 		'".$cep."'
	 		)
	 		";

	 		if(!mysqli_query($conn, $sql)){
	 			//echo("Erro: ". mysqli_errno($conn)." - " mysqli_error($conn));
	 			echo "Erro";
	 		}

	 		$id = mysqli_insert_id($conn);

	 		echo"<br><br>";
	 		echo ($id);


	 		$sqlLogin = "INSERT INTO tblogin
	 		(nome,
	 		login,
	 		senha,
	 		idPessoa_Login
	 		)
	 		VALUES
	 		(
	 		'".$nome."',
	 		'".$usuario."',
	 		'".$senha."',
	 		'".$id."'
	 		)
	 		";

	 		if(!mysqli_query($conn, $sqlLogin)){
	 			echo("Erro: ". mysqli_errno($conn));
	 			echo "Erro";
	 			echo("<br> SQL: ".$sqlLogin);
	 		}



	 		echo"<br><br>";
	 		echo ("OK,CADASTRADO");

	 		header("location:index.php");

?>