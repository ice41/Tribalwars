<?php
require 'mysql.php';

$connection = mysql_connect($conf['db_host'], $conf['db_user'], $conf['db_pass']) or die ('</br>Não pode se conectar com o servidor MySQL.</br> Tudo está bem inscrito?</br>'.mysql_error());
mysql_select_db($conf['db_name']) or die ('Erro de seleção de banco de dados.');
?>