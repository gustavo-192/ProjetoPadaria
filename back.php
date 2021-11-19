<?php
	session_start();
	
	include("conexao.php");

	//escape em caracteres que podem ser danosos(\)
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$psw = mysqli_real_escape_string($conn, $_POST["pass"]);

	$_SESSION['email'] = $email;
	$_SESSION['pass'] = $psw;

	
	//Montando a SQL para enviar ao banco
	$sql = "SELECT * FROM tblogin WHERE login = '".$email."' and senha = '".$psw. "'";

	//Executando a SQL e pegando o retorno do banco
	$retorno_login = mysqli_query($conn, $sql);

	//print_r($retorno_login);

	//Verificando a quantidade de linhas que retornaram, se for difetente de 0 então encontrou alguma coisa ao Email e Senha Digitado
	if(mysqli_num_rows($retorno_login) !=0){
		//echo "Login Encontrado";

		//Lendo os Conteúdos que estão vindo do banco
		$dados_de_Retorno = mysqli_fetch_array($retorno_login);
		echo "<br><br>";
		//print_r($dados_de_Retorno);
		echo "<br><br>";
		foreach ($dados_de_Retorno as $key => $value) 
		{	//Se a chave não for numérica ele imprime
			if(!is_numeric($key))
			{
				echo ($key . "  -> " .$value . "<br>");
				$_SESSION[$key] = $value;
			}	
			header("location:paginaInterna.php");
		}
		
	}else{
		//echo "Login Não encontrado";
		$_SESSION["ERRO"] = "Usuário ou Senha inválido!!!";
		header("location:index.php");
	}

?>