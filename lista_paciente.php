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

<title>Physio - Buscar Paciente</title>
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
  <h1>Resultados</h1>
  <?php
if (!isset($_GET['consulta'])) {
  header("Location: /");
  exit;
}
require_once "modulos/conexao.php";
$busca = mysql_real_escape_string($_GET['consulta']);
$por_pagina = 5;
$condicoes = "((`nome` LIKE '%{$busca}%') OR ('%{$busca}%'))";

//$sql = "SELECT COUNT(*) AS total FROM `paciente` WHERE {$condicoes}";
//$sql = "SELECT COUNT(*) AS total FROM paciente p INNER JOIN usuario u on u.id = p.id_usuario WHERE u.nome = {$condicoes}";
$sql = "SELECT COUNT(*) AS total FROM paciente p INNER JOIN usuario u on u.id = p.id_usuario WHERE {$condicoes}";

$query = mysql_query($sql);
$total = mysql_result($query, 0, 'total');
$paginas =  (($total % $por_pagina) > 0) ? (int)($total / $por_pagina) + 1 : ($total / $por_pagina);
if (isset($_GET['pagina'])) {
  $pagina = (int)$_GET['pagina'];
} else {
  $pagina = 1;
}
$pagina = max(min($paginas, $pagina), 1);
$offset = ($pagina - 1) * $por_pagina;

//$sql = "SELECT * FROM `paciente` WHERE {$condicoes} ORDER BY `nome` DESC LIMIT {$offset}, {$por_pagina}";
$sql = "SELECT * FROM paciente p INNER JOIN usuario u on u.id = p.id_usuario WHERE {$condicoes} ORDER BY `nome` DESC LIMIT {$offset}, {$por_pagina}";

$query = mysql_query($sql);
echo "Resultados ".min($total, ($offset + 1))." - ".min($total, ($offset + $por_pagina))." de ".$total." resultados encontrados para '".$_GET['consulta']."'";
echo "<br />";echo "<br />";
//echo "<ul>";

while ($resultado = mysql_fetch_assoc($query)) {
  $nome = $resultado['nome'];
  $link = '/estagio-fisio/exibe_paciente.php?id=' . $resultado['id'];
 
 // echo "<li>";
    echo "<a href='{$link}'>";
      echo "<p><span class='glyphicon glyphicon-user' aria-hidden='true'></span> {$nome}</p>";
    echo "</a>";
 // echo "</li>";
}
//echo "</ul>";

echo '<nav>';
echo   '<ul class="pagination">';

if ($total > 0) {
  for ($n = 1; $n <= $paginas; $n++) {
    echo "<li><a href='pesq_paciente.php?consulta={$_GET['consulta']}&pagina={$n}'>{$n}</a></li>";
  }
}

echo  '</ul>';
echo '</nav>';

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