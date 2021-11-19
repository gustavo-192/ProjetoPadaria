<?php

  session_start();
  include_once("conexao.php");

      if(isset($_SESSION['atualiza'])){
          //echo("Atualizar");
          //unset($_SESSION['atualiza']);
          $sql = "SELECT * FROM tbpessoa WHERE idPessoa = ".$_SESSION['idPessoa_login'];
          //echo ($sql);
          if(!$resultado = mysqli_query($conn, $sql))
          {
            echo("erro");
          }
          $dados_de_Retorno = mysqli_fetch_array($resultado);
      }else{
        //echo("cadastre-se");
      }
?>

<!DOCTYPE html>
<html>
<head>

	<title>Cadastro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container-fluid card">

<span class="h1" >
    <?php
      if(isset($_SESSION['atualiza'])){
          echo("Atualizar");

          
      }else{
          echo("Cadastre-se");
      }
    ?>
   
</span>
   <?php
      if(isset($_SESSION['atualiza'])){
          echo('<form action="atualiza.php" method="POST" class="needs-validation" novalidate>');
         // unset($_SESSION['atualiza']);
      }else{
          echo('<form action="InserirCadastro.php" method="POST" class="needs-validation" novalidate>');
      }
    ?>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltipNome">Primeiro nome</label>
      <?php
      if(isset($_SESSION['atualiza'])){
        echo('<input type="text" name="nome" class="form-control" id="alidationTooltipNome" placeholder="Nome" value="'.$dados_de_Retorno['Nome'].'" required>');
        //unset($_SESSION["nome"]);
      
      }else{
          echo ('<input type="text" name="nome" class="form-control" id="alidationTooltipNome" placeholder="Nome" value="'.'" required>');
      }
      ?>
      
      <div class="valid-tooltip">
        Tudo certo!
      </div>
    </div>
    <div class="col-md-6 mb-3">

      <label for="validationTooltipSobrenome">Sobrenome</label>
      <?php
      
      if(isset($_SESSION['atualiza'])){
        echo ('<input type="text" name="sobrenome" class="form-control" id="validationTooltipSobrenome" placeholder="Sobrenome" value="'.$dados_de_Retorno['Sobrenome'].'" required>');
        //unset($_SESSION["Sobrenome"]);
      }else{
          echo ('<input type="text" name="sobrenome" class="form-control" id="alidationTooltipSobrenome" placeholder="Sobrenome" value="'.'" required>');
      }
      ?>
    
      <div class="valid-tooltip">
        Tudo certo!
      </div>
    </div>
  </div>
  <div class="form-row">

    <div class="col-md-6 mb-3">
      <label for="validationTooltipIdade">Idade</label>
      <?php
      if(isset($_SESSION['atualiza'])){
        echo ('<input type="text" name="idade" class="form-control" id="validationTooltipIdade" placeholder="Idade" value="'.$dados_de_Retorno["Idade"].'" required>');
      }else{
          echo ('<input type="text" name="idade" class="form-control" id="alidationTooltipIdade" placeholder="Idade" value="'.'" required>');
      }
      ?>
      <div class="valid-tooltip">
        Tudo certo!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationTooltipTelefone">Telefone</label>
      <?php
      if(isset($_SESSION['atualiza'])){
        echo('<input type="text" name="telefone" class="form-control" id="alidationTooltipTelefone" placeholder="Telefone" value="'.$dados_de_Retorno['Telefone'].'" required>');      
      }else{
          echo ('<input type="text" name="telefone" class="form-control" id="alidationTooltipTelefone" placeholder="Telefone" value="'.'" required>');
      }
      ?>
      <div class="valid-tooltip">
        Tudo certo!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltipRua">Rua</label>
      <?php
      if(isset($_SESSION['atualiza'])){
        echo('<input type="text" name="rua" class="form-control" id="alidationTooltipRua" placeholder="Rua" value="'.$dados_de_Retorno['Rua'].'" required>');

      }else{
          echo ('<input type="text" name="rua" class="form-control" id="alidationTooltipRua" placeholder="Rua" value="'.'" required>');
      }
      ?>
      <div class="invalid-tooltip">
        Por favor, informe uma rua válida.
      </div><br>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationTooltipNumero">Numero</label>
      <?php
      if(isset($_SESSION['atualiza'])){
        echo('<input type="text" name="numero" class="form-control" id="alidationTooltipNumero" placeholder="Numero" value="'.$dados_de_Retorno['Numero'].'" required>');

      }else{
          echo ('<input type="text" name="numero" class="form-control" id="alidationTooltipNumero" placeholder="Numero" value="'.'" required>');
      }
      ?>
      <div class="invalid-tooltip">
        Por favor, informe uma rua válida.
      </div><br>
    </div>
    
  </div>
  <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationTooltipEstado">Estado</label>
      
          <select name="estado" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <option value="0">Escolha</option>
            <?php
              mysqli_num_rows($conn,"utf8");

              $sql = "
                  SELECT * FROM tbestado
                ORDER BY Sigla
                    ";

              $retornoEstados = mysqli_query($conn, $sql);

              if(mysqli_num_rows($retornoEstados) !=0){
                 
                 while ($todosEstados = mysqli_fetch_array($retornoEstados))
                  {
                    echo(" <option value= '".$todosEstados["Sigla"]."'>".$todosEstados["Nome"]."</option>");
                  }
              }
            ?>
          </select>
           <!-- <option value="1">SP</option>
            <option value="2">RJ</option>
            <option value="3">MG</option>
          </select> -->

      </div>
      <div class="col-md-4 mb-3">
        <label for="validationTooltipCidade">Cidade</label>
        <?php
        if(isset($_SESSION['atualiza'])){
          echo('<input type="text" name="cidade" class="form-control" id="alidationToolCidade" placeholder="Cidade" value="'.$dados_de_Retorno['Cidade'].'" required>');

        }else{
          echo ('<input type="text" name="cidade" class="form-control" id="alidationTooltipCidade" placeholder="Cidade" value="'.'" required>');
        }
        ?>
        <div class="invalid-tooltip"> 
         Por favor, informe uma cidade válida.
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationTooltipCEP">CEP</label>
        <?php
        if(isset($_SESSION['atualiza'])){
          echo('<input type="text" name="cep" class="form-control" id="alidationTooltipCEP" placeholder="CEP" value="'.$dados_de_Retorno['CEP'].'" required>');
          //unset($_SESSION["nome"]);
      
        }else{
           echo ('<input type="text" name="cep" class="form-control" id="alidationTooltipCep" placeholder="CEP" value="'.'" required>');
        }
        ?>
        <div class="invalid-tooltip">
        Por favor, informe um CEP válido.
        </div>  
      </div>
  </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationTooltipUsuario">Usuário</label>
        <div class="input-group">
         <div class="input-group-prepend">
           <span class="input-group-text" id="validationTooltipUsuarioPrepend">@</span>
          </div>
         <?php
          if(isset($_SESSION['atualiza'])){
              echo('<input type="text" name="usuario" class="form-control" id="alidationTooltipLogin" placeholder="Login" value="'.$_SESSION['login'].'" required>');
          //unset($_SESSION["nome"]);
      
          }else{
             echo ('<input type="text" name="usuario" class="form-control" id="alidationTooltipLogin" placeholder="Login" value="'.'" required>');
          }
      ?>
          <div class="invalid-tooltip">
            Por favor, escolha um usuário válido e único.
          </div>
        </div>
    </div>
      <div class="col-md-6 mb-3">
        <label for="validationTooltipSenha">Senha</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="validationTooltipSenhaPrepend">*</span>
          </div>
          <input type="password" name="senha" class="form-control" id="validationTooltipSenha" placeholder="Senha" aria-describedby="validationTooltipSenhaPrepend" required>
        <div class="invalid-tooltip">
           Por favor, escolha um usuário válido e único.
          </div>
        </div>
      </div>
  </div>
  <button class="btn btn-primary" type="submit">Enviar</button>

</form>
</div>
</body >
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
<?php
    unset($_SESSION['atualiza']);
?>