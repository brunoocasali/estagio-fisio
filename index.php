<?php 
    session_start();
    require_once "modulos/conexao.php";
if (!isset($_SESSION['usuario_session']) && !isset($_SESSION['senha_session'])){
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!--<link rel="icon" href="imagens/favicon.ico">-->
<title>Physio - Login</title>

<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/signin.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
    
    
<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
  <form method="post" action="?go=logar" class="form-signin">
    <label for="usuario" class="sr-only">Usuário</label>
    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário" required autofocus>
    <label for="senha" class="sr-only">Senha</label>
    <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
    <button class="btn btn-lg btn-success btn-block" type="submit" value="Entrar" id="btnLogin">Acessar</button>
  </form>
</div>
<!-- /container --> 

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<?php
}else{
    echo "<meta http-equiv='refresh' content='0, url=painel.php'>";
}
?>
<?php

if(@$_GET['go'] == 'logar'){
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
        $query1 = mysql_num_rows(mysql_query("SELECT * FROM acesso_painel WHERE USUARIO = '$usuario' AND SENHA = '$senha'"));
    
        if($query1 == 1){
        $_SESSION['usuario_session'] = $usuario;
        $_SESSION['senha_session'] = $senha;
        echo "<meta http-equiv='refresh' content='0, url=painel.php'>";

        } else {
    
            echo "<div class='container'>
                    <div class='col-md-4'></div>
                    <div class='col-md-4'>
                        <div class='alert alert-danger' role='alert'>Dados incorretos!</div>
                    </div>
                    <div class='col-md-4'></div>
              </div>";
        }
    }

?>