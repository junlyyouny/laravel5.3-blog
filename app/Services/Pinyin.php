<?php

namespace App\Services;

class Pinyin
{
    //中文字符串
    private static $string = '';
    //拼音
    private static $pinyin = '';
    private static $encoding = 'UTF-8';
    //短拼音
    private static $short_pinyin = '';
    //单个汉字拼音的字典
    private static $dic = [];
    
    /**
     * 字符串拆分成单个字的数组
     * @param $string
     * @return array
     */
    private static function mbStringToArray($string)
    {
        $stop   = mb_strlen($string, 'utf-8');
        $result = array();
        for ($idx = 0; $idx < $stop; $idx++) {
            $result[] = mb_substr($string, $idx, 1, 'utf-8');
        }
        return $result;
    }
    
    /**
     * 汉字转拼音
     * @param $string
     * @param $encoding
     */
    private static function chineseToPinyin($string, $encoding)
    {
        $words              = self::mbStringToArray(mb_convert_encoding($string, 'utf-8', $encoding));
        self::$dic = config('dic.pinyin');
        self::$string       = $string;
        self::$encoding     = $encoding;
        self::$pinyin       = '';
        self::$short_pinyin = '';
        foreach ($words as $v) {
            if (isset(self::$dic[$v])) {
                $tmp = ' ' . self::$dic[$v];
            } else {
                $tmp = $v;
            }
            self::$pinyin .= $tmp;
            self::$short_pinyin .= mb_substr($tmp, 0, 1, $encoding);
        }
    }
    
    /**
     * 获取拼音
     * @param $string
     * @param string $encoding
     * @return string
     */
    public static function getPinyin($string, $encoding = 'utf-8')
    {
        if ($string != self::$string || $encoding != self::$encoding) {
            self::chineseToPinyin($string, $encoding);
        }
        return self::$pinyin;
    }
    
    /**
     * 获取拼音缩写
     * @param $string
     * @param string $encoding
     * @return string
     */
    public static function getShortPinyin($string, $encoding = 'utf-8')
    {
        if ($string != self::$string || $encoding != self::$encoding) {
            self::chineseToPinyin($string, $encoding);
        }
        return self::$short_pinyin;
    }

}