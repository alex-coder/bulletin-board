<?php
    declare(strict_types = 1);

    namespace App\Utils;


    class ImagesUtils
    {
        const UPLOAD_DIR = 'upload';

        public static function uploadPath() : string
        {
            return public_path() . '/' . static::UPLOAD_DIR;
        }

        public static function buildUrl($filename) : string
        {
            return config('app.url') . '/' . static::UPLOAD_DIR . '/' . $filename;
        }
    }