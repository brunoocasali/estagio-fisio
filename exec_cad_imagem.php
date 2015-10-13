<?php

$imagem = $_FILES["imagem"];
$host = "localhost";
$username = "root";
$password = "";
$db = "fisio";
$identificacao = $_POST["identificacao"]; 


if($imagem != NULL) { 
	$nomeFinal = time().'.jpg';
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal); 

		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 

		mysql_connect($host,$username,$password) or die("Impossível Conectar"); 

		@mysql_select_db($db) or die("Impossível Conectar"); 

		mysql_query("INSERT INTO exames (exame, id_paciente) VALUES ('$mysqlImg', '$identificacao')") or die("O sistema não foi capaz de executar a query"); 

		unlink($nomeFinal);    
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
} 
else { 
	echo"Você não realizou o upload de forma satisfatória."; 
} 

?>