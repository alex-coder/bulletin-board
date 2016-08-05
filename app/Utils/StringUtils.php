<?php
    declare(strict_types = 1);

    namespace App\Utils;


    class StringUtils
    {
        public static function preview_text(string $str, int $length = 200) : string
        {
            if (strlen($str) <= $length) {
                return $str;
            }

            return substr($str, 0, $length - 3) . '...';
        }

        public static function uuid() : string
        {
            return uniqid('', false);
        }
    }