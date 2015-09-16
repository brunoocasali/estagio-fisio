<?php 
    session_start();
    require_once "modulos/conexao.php";
if (!isset($_SESSION['usuario_session']) && !isset($_SESSION['senha_session'])){
     echo "<meta http-equiv='refresh' content='0, ./'>";
}else{
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="sistema de gerenciamento para fisioterapia">
<meta name="author" content="erick sutil">
<!--<link rel="icon" href="">-->

<title>Physiotherapy - Efetuar Cadastro</title>
<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/sticky-footer-navbar.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php include('modulos/menu.php'); ?>
<div class="container">
  <h1>Efetuar Cadastro</h1>
  <p>Informações do Paciente</p>
  <br />
  <div id="cadastro">
    <form method="post" action="?go=cadastrar">
      <div class="row">
        <div class="col-xs-6 col-md-4">
          <div class="form-group">
            <label for="paciente">Nome:</label>
            <input type="text" class="form-control" id="paciente" name="paciente" maxlength="50" required>
          </div>
        </div>
        <div class="col-xs-6 col-md-2">
          <div class="form-group">
            <label for="nascimento">Nascimento:</label>
            <input type="date" class="form-control" id="nascimento" name="nascimento" required>
          </div>
        </div>
        <div class="col-xs-6 col-md-2">
          <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select class="form-control" name="sexo" required id="sexo">
              <option selected disabled>Selecionar</option>
              <option value="masculino">Masculino</option>
              <option value="feminino">Feminino</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6 col-md-4">
          <div class="form-group">
            <label for="profissao">Profissão:</label>
            <input type="text" class="form-control" id="profissao" name="profissao" maxlength="50" required>
          </div>
        </div>
        <div class="col-xs-6 col-md-4">
          <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="number" class="form-control" id="cpf" name="cpf" maxlength="50" required>
          </div>
        </div>
        <div class="col-xs-6 col-md-4">
          <div class="form-group">
            <label for="rg">RG:</label>
            <input type="number" class="form-control" id="rg" name="rg" maxlength="50" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6 col-md-4">
          <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" maxlength="50" required>
          </div>
        </div>
        <div class="col-xs-6 col-md-2">
          <div class="form-group">
            <label for="numero">Número:</label>
            <input type="number" class="form-control" id="numero" name="numero" maxlength="50" required>
          </div>
        </div>
        <div class="col-xs-6 col-md-2">
          <div class="form-group">
            <label for="bairro">Bairro:</label>
            <input type="text" class="form-control" id="bairro" name="bairro" maxlength="50" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6 col-md-1">
          <div class="form-group">
            <label for="uf">UF:</label>
            <input type="text" class="form-control" id="uf" name="uf" maxlength="50" required>
          </div>
        </div>
        <div class="col-xs-6 col-md-3">
          <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="number" class="form-control" id="cep" name="cep" maxlength="50" required>
          </div>
        </div>
        <div class="col-xs-6 col-md-4">
          <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" maxlength="50" required>
          </div>
        </div>
      </div>
      <div class="row">
        <button type="submit" class="btn center-block">Cadastrar</button>
      </div>
    </form>
  </div>
</div>
<?php include('modulos/footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script> 
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<?php
if(@$_GET['go'] == 'cadastrar'){
    $paciente = $_POST['paciente'];
	$nascimento = $_POST['nascimento'];
	$sexo = $_POST['sexo'];
	$profissao = $_POST['profissao'];
	$cpf = $_POST['cpf'];
	$rg = $_POST['rg'];
	$endereco = $_POST['endereco'];
	$numero = $_POST['numero'];
	$bairro = $_POST['bairro'];
	$uf = $_POST['uf'];
	$cep = $_POST['cep'];
	$cidade = $_POST['cidade'];
	
	mysql_query("insert into cadastro (paciente, nascimento, sexo, profissao, cpf, rg, endereco, numero, bairro, uf, cep, cidade) values 						               ('$paciente','$nascimento', '$sexo', '$profissao', '$cpf', '$rg', '$endereco', '$numero', '$bairro', '$uf', '$cep', '$cidade')");
	echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
	echo "<meta http-equiv='refresh' content='0, url=cadastrar_paciente.php'>";
}
?>
<?php 
    if(@$_GET['go'] == 'sair'){
    session_destroy();
    echo "<meta http-equiv='refresh' content='0, ./'>";
    }
?>
<?php
    }
?>