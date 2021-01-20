<?php
	// Файлы phpmailer
	require 'lib/phpmailer/PHPMailer.php';
	require 'lib/phpmailer/SMTP.php';
	require 'lib/phpmailer/Exception.php';

	// Переменные, которые отправляет пользователь
	$name = 'name';
	$email = 'email';
	$text = 'text';
	$file = 'myfile';

	// Формирование самого письма
	$title = "Заголовок письма";
	$body = "
		<h2>Новое письмо</h2>
		<b>Имя:</b> $name<br>
		<b>Почта:</b> $email<br><br>
		<b>Сообщение:</b><br>$text";

	// Настройки PHPMailer
	$mail = new PHPMailer\PHPMailer\PHPMailer();

	try {
	    $mail->isSMTP();   
	    $mail->CharSet = "UTF-8";
	    $mail->SMTPAuth   = true;
	    //$mail->SMTPDebug = 2;
	    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

	    // Настройки вашей почты
	    $mail->Host       = 'smtp.mail.ru'; 					// SMTP сервера вашей почты
	    $mail->Username   = 'server-2020-86@mail.ru'; 		// Логин на почте
	    $mail->Password   = '';                     // Пароль на почте
	    $mail->SMTPSecure = 'ssl';
	    $mail->Port       = 465;
	    $mail->setFrom('server-2020-86@mail.ru', 'SovHome'); 	// Адрес самой почты и имя отправителя

	    // Получатель письма
	    $mail->addAddress('s3467585@gmail.com');  
	    $mail->addAddress('_chelovek_@mail.ru');    				// Ещё один, если нужен

	// Отправка сообщения
	$mail->isHTML(true);
	$mail->Subject = $title;
	$mail->Body = $body;    

	// Проверяем отравленность сообщения
	if ($mail->send()) {$result = "success";} 
	else {$result = "error";}

	} catch (Exception $e) {
	    $result = "error";
	    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
	}

	// Отображение результата
//	echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

?>





