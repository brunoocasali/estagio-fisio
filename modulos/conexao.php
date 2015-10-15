<?php

header('Content-Type:text/html; charset=utf-8');

$con = @mysql_connect("mysql2.000webhost.com", "a2671977_root", "5Util2012") or die("Não foi possível conectar com o servidor de dados!");
mysql_select_db("a2671977_fisio", $con) or die("Banco de dados não localizado!");
    
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

?>
