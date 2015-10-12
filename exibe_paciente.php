<?php 
    session_start();
    require_once "modulos/conexao.php";
if (!isset($_SESSION['usuario_session']) && !isset($_SESSION['senha_session'])){
     echo "<meta http-equiv='refresh' content='0, ./'>";
}else{
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM cadastro where id=$id;";
$query = mysql_query($sql);
while($sql = mysql_fetch_array($query)){
$paciente = $sql["paciente"];
}
    
function UrlAtual(){
 $dominio= $_SERVER['HTTP_HOST'];
 $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
 return $url;
 }
    
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

<title>Physio - Paciente</title>
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
  <h1><?php echo "$paciente"; ?></h1>
  <form action="exec_cad_imagem.php" method="POST" enctype="multipart/form-data">
    <strong>Anexar exames:</strong>
    <input type="file" class="" name="imagem"/>
    <input type="text" name="identificacao" class="hidden" value="<?php echo $id ?>">
    <br/>
    <input type="submit" class="btn" value="Enviar"/>
  </form>
  <br />
  <h4>Anexos:</h4>
  <?php

$host = "localhost";
$username = "root";
$password = "";
$db = "fisio";

mysql_connect($host,$username,$password) or die("Impossível conectar ao banco."); 

@mysql_select_db($db) or die("Impossível conectar ao banco"); 

$result=mysql_query("SELECT * FROM PESSOA WHERE IDUSUARIO LIKE $id") or die("Impossível executar a query"); 

while($row=mysql_fetch_object($result)) { 
	echo "
          <div class='col-md-3' style='margin-bottom:10px;'>
            <a href='getImagem.php?PicNum=$row->PES_ID' target=_blank>
                <img src='getImagem.php?PicNum=$row->PES_ID' class='img-responsive img-rounded'\">
            </a>
          </div>"; 
} 

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