<?php
/* Функция отфильтровки чисел */
function int($int) {
	return abs((int)$int);
}

/* Функция защиты от нежелательных действий */
function protect($text) {
	//return trim(mysqli_real_escape_string($connect, htmlspecialchars($text, ENT_QUOTES, 'utf-8')));
	return $text;
}

/* Функция отображения времени */
function clock($time) {
	$time = $time;
	$timep= date("j M Y в H:i", $time);
	$time_p[0]=date("j n Y", $time);
	$time_p[1]=date("H:i", $time);
	if ($time_p[0]==date("j n Y", time()))$timep='Сегодня в '.$time_p['1'];
	if ($time_p[0]==date("j n Y", time()-86400))$timep='Вчера в '.$time_p['1'];
	$months_eng = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
	$months_rus = array('Января','Февраля','Марта','Апреля','Мая','Июня','Июля','Августа','Сентября','Октября','Ноября','Декабря');
	$timep = str_replace($months_eng,$months_rus,$timep);
	return $timep;
}
function datediff($date1, $date2)
{
	$diff = $date2 - $date1;
	$d=floor($diff/3600/24);
	$h=floor($diff/3600)%24;
	$m=floor(($diff%3600)/60);
	$s=($diff%3600)%60;
	//$s=($diff%60);

	if($d>0) {
		return $d.' д. '.$h.' ч. '.$m.' мин.';
	} elseif ($h>0) {
		return $h.' ч. '.$m.' мин.';
	} else
		return $m.' мин. '.$s.' сек.';
	
	
}

function head() {
	require './style/head.php';
}

# Низ
function foot() {
	require './style/foot.php';
}

# Отправка сообщения на Mail
function mailalarm(){   
    
	// Формирование самого письма
	$title = "Критическая температура котла";
	$body = "
		<h2>Новое письмо</h2>
		<b>Имя: </b>SovHome<br>
		<b>Почта: </b>people.ifo@mail.ru<br><br>
		<b>Сообщение:</b><br><a href='http://sovhome.ru'>Проверить состояние котла</a>";

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
	    $mail->Username   = 'people.ifo@mail.ru'; 		        // Логин на почте
	    $mail->Password   = 'AOriOUpty*64';                     // Пароль на почте
	    $mail->SMTPSecure = 'ssl';
	    $mail->Port       = 465;   
	    $mail->setFrom('people.ifo@mail.ru', 'SovHome'); 	    // Адрес самой почты и имя отправителя
 
	    // Получатель письма
	    $mail->addAddress('s3467585@gmail.com');  
	    $mail->addAddress('_chelovek_@mail.ru');    			// Ещё один, если нужен

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
}
?>