<?php
session_start();
$path = "";
$pieces = explode("/", $_SERVER['SCRIPT_FILENAME']);
for($i=0;$i<count($pieces)-1;$i++)
    $path = $path . $pieces[$i] ."/";
$files = scandir($path . "csv_files/"); // отображение всех файлов в директории
echo json_encode($files);// отправка их в json



