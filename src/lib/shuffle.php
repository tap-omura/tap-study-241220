<?php

// 選択肢を入力
$options = [];
echo "選択肢を入力してください（終了するには空行を入力）：\n";
while (true) {
    $input = trim(fgets(STDIN));
    if ($input === '') {
        break;
    }
    $options[] = $input;
}

// 選択肢をランダムにシャッフル
shuffle($options);

echo "ドラムロール...\n";
$totalTime = count($options) * 1000000; // 全体の秒数をマイクロ秒に変換
$iterations = 5 * count($options); // ループの総回数
$initialDelay = $totalTime / ($iterations * ($iterations + 1) / 2); // 初期遅延時間を計算

$delay = $initialDelay;
for ($i = 0; $i < 5; $i++) {
    foreach ($options as $option) {
        echo $option . "\r";
        usleep((int)$delay);
        $delay += $initialDelay; // 遅延時間を増やす
    }
}

// ランダムな順番で選択肢を表示
echo "\n今日の発表順はこちら！：\n";
foreach ($options as $i => $option) {
    echo ($i + 1) . '. ' . $option . "\n";
}
?>