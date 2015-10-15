<?php

$paciente = $_POST["paciente"];
$profissional = $_POST["profissional"];
$patologia = $_POST["patologia"];
$data = $_POST["data"];
$horario = $_POST["horario"];

require_once "modulos/conexao.php";

$basedados = mysql_select_db("fisio");
$cadastrar = mysql_query("INSERT INTO consulta (paciente, profissional, patologia, data, horario) VALUES 
						                       ('$paciente', '$profissional', '$patologia', '$data', '$horario')", $con);

if ($cadastrar == 1){
}else{ 
	echo "ERRO";
}

echo "<script>alert('Consulta cadastrada com sucesso.');";
echo "location.href='exibe_agenda.php'</script>";

?>