<?php

$contents = file_get_contents(
    "https://www.geospatial.jp/ckan/dataset/1bfb4f7d-c92b-4505-a6fe-452aaa220b0d/resource/73d9dc81-e3da-4e76-86fc-2ac4190e0d89/download/170301aed.csv"
);
$fp = fopen(__DIR__ . '/../../data/170301aed.csv', "w");
fwrite($fp, $contents);
fclose($fp);