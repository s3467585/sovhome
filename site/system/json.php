<?php
	header('Content-Type: text/html; charset=utf-8');
	/* Константы БД */

	define ('DBHOST', 'localhost');
	define ('DBUSER', 's92243jz_sovhome'); // Пользователь базы
	define ('DBPASS', 'k78ay%Cl'); // Пароль БД
	define ('DBNAME', 's92243jz_sovhome'); // Имя базы данных

	date_default_timezone_set( 'UTC' );
	//echo date('Y-m-d H:i:s');

	$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
	 
	$query = "SELECT `time`, `temp0`, `temp1`,`temp2` FROM `stat`;";

	$result = $mysqli->query($query);
	 
	while ($record = $result->fetch_row()){
	    $all[] =  array($record[0], (float)$record[1], (float)$record[2], (float)$record[3]);
	}

	//vardump($all);

	echo json_encode($all);
	 
	$mysqli->close();




	function vardump($var) {
	  echo '<pre>';
	  var_dump($var);
	  echo '</pre>';
	}

?>


