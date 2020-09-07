<?php

require_once 'system/core.php'; // стартуем ядро двигателя
require_once 'system/functions.php'; // стартуем функции

$key = protect($_GET["k"]);

if ($key != "sovhome") { // Специальный код, например asREb25C
	exit;
}

$temp0 = protect($_GET["t0"]);
$temp1 = protect($_GET["t1"]);
$temp2 = protect($_GET["t2"]);
$ram = 1024;
//$ram = protect($_GET['ram']);
//$pir1 = protect($_GET['p1']);
//$pir2 = 0;
//$light = 0;
//$rele1 = 0;
//$reboot = protect($_GET['rb']);

# проверка температуры на критическое значение
$objekt = "температура";

if ($temp1 >= 120) {
	echo "ВНИМАНИЕ!";
	mailalarm();
}

$total = mysqli_fetch_row(mysqli_query($connect, "SELECT count(*) FROM `stat`"))[0];

if ($total > 15) {
	mysqli_query($connect, "DELETE FROM `stat` ORDER BY `id` ASC LIMIT 1");
}
mysqli_query($connect, "UPDATE `settings` SET `value`='".time()."' WHERE `id`= 'connection'");
mysqli_query($connect, "UPDATE `settings` SET `value`='".$ram."' WHERE `id`= 'ram'");
// if ($reboot == 1) {
//	 mysqli_query($connect, "UPDATE `settings` SET `value`='".time()."' WHERE `id`= 'reboot'");
// }
if ($temp0 !='') {
	mysqli_query($connect, "INSERT INTO `stat`(temp0, temp1, temp2, time) VALUES ($temp0, $temp1, $temp2, ".time().")");
} elseif ($pir1 !='') {
	mysqli_query($connect, "UPDATE `sensor` SET `pir1`='".$pir1."',`pir2`='".$pir2."',`rele1`='".$rele1."',`light`='".$light."'");
}
echo '<br>Data in Base is Ок';
?>