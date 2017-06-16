# ZhLangConverter - 简体繁体转换库

## 使用
```php
<?php
require __DIR__ . '/vendor/autoload.php';

// 参数二为可选值，默认为 zh-hk。取值范围：zh-tw、zh-hk、zh-mo
echo simplified2Traditional('夸夸其谈', 'zh-hk') . PHP_EOL;

// 参数二为可选值，默认为 zh-cn。取值范围：zh-cn、zh-sg
echo traditional2Simplified('我幹什麼不干你事', 'zh-cn') . PHP_EOL;

// 输出结果：
// 誇誇其談
// 我干什麽不干你事
```