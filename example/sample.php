<?php
require __DIR__ . '/../vendor/autoload.php';

$simplifiedText = '夸夸其谈';
echo sprintf("简体转繁体：%s -> %s\n", $simplifiedText, simplified2Traditional($simplifiedText));

$traditionalText = '我幹什麼不干你事';
echo sprintf("繁体转简体：%s -> %s\n", $traditionalText, traditional2Simplified($traditionalText));

// 输出结果：
// 简体转繁体：夸夸其谈 -> 誇誇其談
// 繁体转简体：我幹什麼不干你事 -> 我干什么不干你事
