<?php
/* Константы БД */

define ('DBHOST', 'localhost');
define ('DBUSER', 'sovhomec_sovhome'); // Пользователь базы
define ('DBPASS', 'L3SrbfuAI'); // Пароль БД
define ('DBNAME', 'sovhomec_sovhome'); // Имя базы данных


//Подключаемся к БД Хост, Имя пользователя MySQL, его пароль, имя нашей базы
$connect = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME );

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}

//Кодировка данных получаемых из базы
mysqli_query("SET NAMES 'utf8' ");


?>