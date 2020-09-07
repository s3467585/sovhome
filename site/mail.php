<?php
	$mail = protect($_GET['mail']);
	echo $mail;
	if ($mail == 1){
		$to = 's3467585@gmail.com';
	} else {
		$to = '_chelovek_@mail.ru';
	}

	$objekt = 'Температура';
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
	} 
?>