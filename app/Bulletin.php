<?php

    declare(strict_types = 1);

    namespace App;

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;

    class Bulletin extends Model
    {
        const STATUS_ACTIVE   = 1;
        const STATUS_INACTIVE = 0;

        public static function active() : Builder
        {
            return static::where(['status' => static::STATUS_ACTIVE]);
        }
    }
