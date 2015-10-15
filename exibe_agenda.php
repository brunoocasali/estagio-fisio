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

<title>Physio - Verificar Agenda</title>
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
<?php include('modulos/crumb.php'); ?>
  <h1>Verificar Agenda</h1>
  <?php

	$conexao = mysql_connect ("localhost", "root", "");
	
	mysql_select_db ("fisio");
	
	$resultado = mysql_query ("SELECT * FROM consulta ORDER BY data,horario ASC");
	$linhas = mysql_num_rows ($resultado);
		
	for ($i=0 ; $i<$linhas ; $i++){
	
	$reg = mysql_fetch_row($resultado);
	
	$data =  "$reg[4]";
	
	echo "Paciente: $reg[1]<br />";
	echo "Profissional: $reg[2]<br />";
	echo "Patologia: $reg[3]<br />";
	echo "Data: ";
	echo date('d/m/Y', strtotime($data));
	echo "<br />";
	echo "Horário: $reg[5]<br />";
	echo "<hr>";
		  
}
	mysql_close($conexao);

?>
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