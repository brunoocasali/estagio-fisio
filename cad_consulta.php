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

<title>Physio - Marcar consulta</title>
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
  <h1>Marcar Consulta</h1>
  <form action="exec_cad_agenda.php" method="post" enctype="multipart/form-data" id="form1">
<div class="row">
  <div class="col-md-6">
     <label for="patologia">Patologia:</label>
    <input type="text" class="form-control" name="patologia" />
    </div>
  <div class="col-md-6">
    
     <label for="profissional">Profissional:</label>
    <input type="text" class="form-control" name="profissional" />
  </div>
   </div>
<br />
<div class="row">
  <div class="col-md-3">

     <label for="data">Data:</label>
    <input type="date" class="form-control" maxlength="10" name="data"/>
</div>
  <div class="col-md-3">
     <label for="horario">Horário</label>
    <input type="time" class="form-control" maxlength="10" name="horario"/>
</div>
</div>
    <br />
    <input type="submit" class="btn center-block" name="enviar" value="Enviar" />
  </form>
</div>
<?php include('modulos/footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script> 
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<?php 
    if(@$_GET['go'] == 'sair'){
    session_destroy();
    echo "<meta http-equiv='refresh' content='0, ./'>";
    }
?>
<?php
    }
?>