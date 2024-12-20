<?php

$contents = file_get_contents("https://www.post.japanpost.jp/zipcode/dl/oogaki/zip/27osaka.zip");
$fp = fopen(__DIR__ . '/../../data/27osaka.zip', "w");
fwrite($fp, $contents);
fclose($fp);

$zipFile = __DIR__ . '/../../data/27osaka.zip';
$extractTo = __DIR__ . '/../../data/';

$zip = new ZipArchive;
if ($zip->open($zipFile) === true) {
    $zip->extractTo($extractTo);
    $zip->close();
} else {
    echo '解凍に失敗しました。';
}