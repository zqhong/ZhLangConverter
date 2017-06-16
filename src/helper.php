<?php

use Zqhong\ZhLangConverter\ZhConverter;

if (!function_exists('simplified2Traditional')) {
    /**
     * 简体转繁体
     *
     * @param string $text 待转换的文本
     * @param string $variant 语种名称代码，可选值：zh-tw（台湾繁体）、zh-hk（香港繁体）、zh-mo（澳门繁体）
     * @return string 转换后的文本
     */
    function simplified2Traditional($text, $variant = 'zh-hk')
    {
        $text = ZhConverter::getInstance()->translate($text, $variant);
        $text = ZhConverter::getInstance()->translate($text, 'zh-hant');

        return $text;
    }
}

if (!function_exists('traditional2Simplified')) {
    /**
     * 繁体转简体
     *
     * @param string $text 待转换的文本
     * @param string $variant 语种名称代码，可选值：zh-cn（大陆简体）、zh-sg（新加坡简体）
     * @return string 转换后的文本
     */
    function traditional2Simplified($text, $variant = 'zh-cn')
    {
        $text = ZhConverter::getInstance()->translate($text, $variant);
        $text = ZhConverter::getInstance()->translate($text, 'zh-hans');

        return $text;
    }
}

