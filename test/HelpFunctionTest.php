<?php

namespace Zqhong\ZhLangConverter\Test;

use PHPUnit\Framework\TestCase;

/**
 * Class HelpFunctionTest
 *
 * 测试用例参考 OpenCC
 *
 * @package Zqhong\ZhLangConverter\Test
 */
class HelpFunctionTest extends TestCase
{
    /**
     * 测试简体中文转繁体中文
     *
     * @dataProvider s2TDataProvider
     * @param string $simplifiedText 简体中文字符串
     * @param string $expectedText 期待得到的繁体中文字符串
     * @param string $variant 语种名称代码
     */
    public function testSimplified2Traditional($simplifiedText, $expectedText, $variant)
    {
        $translatedText = simplified2Traditional($simplifiedText, $variant);
        $this->assertEquals($expectedText, $translatedText);
    }

    /**
     * 测试繁体中文转简体中文
     *
     * @dataProvider t2SDataProvider
     * @param string $traditionalText 繁体中文字符串
     * @param string $expectedText 期待得到的简体中文字符串
     * @param string $variant 语种名称代码
     */
    public function testTraditional2Simplified($traditionalText, $expectedText, $variant)
    {
        $translatedText = traditional2Simplified($traditionalText, $variant);
        $this->assertEquals($expectedText, $translatedText);
    }

    /**
     * 简体转繁体测试数据提供者
     *
     * @return array
     */
    public function s2TDataProvider()
    {
        return [
            ['虚伪叹息', '虛偽嘆息', 'zh-hk'],
            ['潮湿灶台', '潮濕灶台', 'zh-hk'],
            ['沙河涌汹涌的波浪', '沙河涌洶湧的波浪', 'zh-hk'],

            ['夸夸其谈 夸父逐日', '誇誇其談 夸父逐日', 'zh-hk'],
            ['我干什么不干你事。', '我幹什麼不干你事。', 'zh-hk'],
            ['太后的头发很干燥。', '太后的頭髮很乾燥。', 'zh-hk'],
            ['燕燕于飞，差池其羽。之子于归，远送于野。', '燕燕于飛，差池其羽。之子于歸，遠送於野。', 'zh-hk'],
            [
                '请成相，世之殃，愚暗愚暗堕贤良。人主无贤，如瞽无相何伥伥！请布基，慎圣人，愚而自专事不治。主忌苟胜，群臣莫谏必逢灾。',
                '請成相，世之殃，愚暗愚暗墮賢良。人主無賢，如瞽無相何倀倀！請布基，慎聖人，愚而自專事不治。主忌苟勝，群臣莫諫必逢災。',
                'zh-hk'
            ],
            [
                '曾经有一份真诚的爱情放在我面前，我没有珍惜，等我失去的时候我才后悔莫及。人事间最痛苦的事莫过于此。如果上天能够给我一个再来一次得机会，我会对那个女孩子说三个字，我爱你。如果非要在这份爱上加个期限，我希望是，一万年。',
                '曾經有一份真誠的愛情放在我面前，我沒有珍惜，等我失去的時候我才後悔莫及。人事間最痛苦的事莫過於此。如果上天能夠給我一個再來一次得機會，我會對那個女孩子說三個字，我愛你。如果非要在這份愛上加個期限，我希望是，一萬年。',
                'zh-hk',
            ],
            ['新的理论被发现了。', '新的理論被發現了。', 'zh-hk'],
            ['鲶鱼和鲇鱼是一种生物。', '鮎魚和鮎魚是一種生物。', 'zh-hk'],
            ['金胄不是金色的甲胄。', '金胄不是金色的甲冑。', 'zh-hk'],

            ['着装污染虚伪发泄棱柱群众里面', '著裝污染虛偽發泄稜柱群眾裡面', 'zh-tw'],
            ['鲶鱼和鲇鱼是一种生物。', '鯰魚和鯰魚是一種生物。', 'zh-tw'],
        ];
    }

    /**
     * 繁体转简体测试数据提供者
     *
     * @return array
     */
    public function t2SDataProvider()
    {
        return [
            ['虛偽嘆息', '虚伪叹息', 'zh-cn'],
            ['潮濕灶台', '潮湿灶台', 'zh-cn'],
            ['沙河涌洶湧的波浪', '沙河涌汹涌的波浪', 'zh-cn'],

            [
                '曾經有一份真誠的愛情放在我面前，我沒有珍惜，等我失去的時候我才後悔莫及。人事間最痛苦的事莫過於此。如果上天能夠給我一個再來一次得機會，我會對那個女孩子說三個字，我愛你。如果非要在這份愛上加個期限，我希望是，一萬年。',
                '曾经有一份真诚的爱情放在我面前，我没有珍惜，等我失去的时候我才后悔莫及。人事间最痛苦的事莫过于此。如果上天能够给我一个再来一次得机会，我会对那个女孩子说三个字，我爱你。如果非要在这份爱上加个期限，我希望是，一万年。',
                'zh-cn',
            ],

            ['滑鼠裡面的矽二極體壞了，導致游標解析度降低。', '鼠标里面的硅二极管坏了，导致游标分辨率降低。', 'zh-sg'],
            ['我們在寮國的伺服器的硬碟需要使用網際網路演算法軟體解決非同步的問題。', '我们在老挝的服务器的硬盘需要使用互联网算法软件解决异步的问题。', 'zh-sg'],
            ['為什麼你在床裡面睡著？', '为什么你在床里面睡着？', 'zh-sg'],
        ];
    }
}