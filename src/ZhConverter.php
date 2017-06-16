<?php

namespace Zqhong\ZhLangConverter;

/**
 * 简体繁体中文转换类
 *
 * 参考：
 * http://www.cnblogs.com/Robert-huge/p/5481515.html
 * http://www.ruanyifeng.com/blog/2008/02/codes_for_language_names.html
 *
 * @package Zqhong\ZhLangConverter
 */
class ZhConverter
{
    /**
     * @var array
     */
    public $mTables;

    /**
     * @var static
     */
    protected static $instance;

    public function __construct()
    {
        $this->loadDefaultTables();
    }

    /**
     * @return ZhConverter
     */
    public static function getInstance()
    {
        if (empty(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     *
     * @param string $text
     * @param string $variant
     * @return string
     */
    public function translate($text, $variant)
    {
        if (trim($text) && isset($this->mTables[$variant])) {
            // 做一些兼容处理，有些语种名称代码可能是 zh_cn，而不是 zh-cn
            $variant = str_replace('_', '-', $variant);

            $text = strtr($text, $this->mTables[$variant]);
        }
        return $text;
    }

    protected function loadDefaultTables()
    {
        // 注：zh-Hans 表示简体中文、zh-Hant 表示繁体中文
        $this->mTables = [
            // 简体中文 -> 繁体中文
            'zh-hant' => ZhConversion::$zh2Hant,
            // 简体中文 -> 繁体中文（台湾）
            'zh-tw' => ZhConversion::$zh2TW,
            // 简体中文 -> 繁体中文（香港）
            'zh-hk' => ZhConversion::$zh2HK,
            // 简体中文 -> 繁体中文（澳门）
            'zh-mo' => ZhConversion::$zh2HK,

            // 繁体中文 -> 简体中文
            'zh-hans' => ZhConversion::$zh2Hans,
            // 繁体中文 -> 简体中文（大陆）
            'zh-cn' => ZhConversion::$zh2CN,
            // 繁体中文 -> 简体中文（新加坡）
            'zh-sg' => ZhConversion::$zh2CN,
        ];
    }

}