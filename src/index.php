<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Carbon\Carbon;

$fh = fopen(__DIR__ . '/../data/170301aed.csv', "r");
$line = fgetcsv($fh);
while ($line = fgetcsv($fh, 1000, ",", '"', "\\")) {
    $line = mb_convert_encoding($line, 'UTF-8', 'SJIS');
    echo Carbon::createFromFormat("Ymd", $line[8])->format("Y-m-d") . PHP_EOL;
    var_dump($line);
}

echo Carbon::now() . PHP_EOL;