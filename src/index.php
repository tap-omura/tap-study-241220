<?php

require_once __DIR__ . '/../vendor/autoload.php';

use League\Csv\Reader;
use League\Csv\Statement;


// CSVファイルを読み込み、Shift-JISからUTF-8に変換
$csvContent = file_get_contents(__DIR__ . '/../data/27OSAKA.csv');
$csvContent = mb_convert_encoding($csvContent, 'UTF-8', 'SJIS-win');
$tempCsvPath = __DIR__ . '/../data/temp_27OSAKA.csv';
file_put_contents($tempCsvPath, $csvContent);

// CSVファイルを読み込む
$csv = Reader::createFromPath($tempCsvPath, 'r');

// 件数を取得
$records = (new Statement())->process($csv);
$count = $records->count();

// 最終更新日を取得（例として、最終行の特定の列に最終更新日があると仮定）
$lastRecord = iterator_to_array($records->getRecords())[$count - 1];
$lastUpdated = $lastRecord['updated_at']; // 'updated_at'は最終更新日が記載されている列名に置き換えてください

// 結果をテキストとして出力
$result = "件数: $count\n最終更新日: $lastUpdated\n";
file_put_contents(__DIR__ . '/../artifacts/result.txt', $result);

echo $result;