<?php
require_once 'system/core.php'; // стартуем ядро двигателя
require_once 'system/functions.php'; // стартуем функции
$key = protect($_GET['k']);

if ($key != 'sovhome') { // Специальный код, например asREb25C
	exit;
}

$temp = protect($_GET['t']);
$hum = protect($_GET['h']);
$ram = 1024;
//$ram = protect($_GET['ram']);
//$pir1 = protect($_GET['p1']);
//$pir2 = 0;
//$light = 0;
//$rele1 = 0;
//$reboot = protect($_GET['rb']);

$total = mysqli_fetch_row(mysqli_query($connect, "SELECT count(*) FROM `stat`"))[0];

if ($total > 15) {
	mysqli_query($connect, "DELETE FROM `stat` ORDER BY `id` ASC LIMIT 1");
}
mysqli_query($connect, "UPDATE `settings` SET `value`='".time()."' WHERE `id`= 'connection'");
mysqli_query($connect, "UPDATE `settings` SET `value`='".$ram."' WHERE `id`= 'ram'");
if ($reboot == 1) {
	mysqli_query($connect, "UPDATE `settings` SET `value`='".time()."' WHERE `id`= 'reboot'");
}
if ($temp !='') {
	mysqli_query($connect, "INSERT INTO `stat`(temp, hum, time) VALUES ($temp, $hum, ".time().")");
} elseif ($pir1 !='') {
	mysqli_query($connect, "UPDATE `sensor` SET `pir1`='".$pir1."',`pir2`='".$pir2."',`rele1`='".$rele1."',`light`='".$light."'");
}
echo 'Data in Base is Ок';
?>
