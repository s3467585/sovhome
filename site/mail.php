<?php
	
	header('Content-Type: text/html; charset=utf-8');
	$key = protect($_GET["k"]);
	
	echo '<br>' . $key;
	echo 'test';
	if ($key == 1){
		$to = "s3467585@gmail.com";
	} else {
		$to = "_chelovek_@mail.ru";
	}
	echo $to;

	/*$objekt = 'Температура';
	$int = '10';

	$subject = 'SovHome - Внимание';
	$message = 'Внимание!';
	echo '<br>'.$message;
	$headers = array(
	    'From' => 'sovhomec@sovhome.cu.ma',
	    'Reply-To' => 'sovhomec@sovhome.cu.ma',
	    'X-Mailer' => 'PHP/'.phpversion()
	);

	$success = mail($to, $subject, $message, $headers);
	if (!$success){
		$errorMessage = error_get_last()['message'];
		echo '<br>Ошибка отправки Mail';
	} */
?>