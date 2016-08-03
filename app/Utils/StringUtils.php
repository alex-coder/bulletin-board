<?php
    declare(strict_types = 1);

    namespace App\Utils;


    class StringUtils
    {
        public static function preview_text(string $str, int $length = 300) : string
        {
            return substr($str, 0, $length - 3) . '...';
        }
    }