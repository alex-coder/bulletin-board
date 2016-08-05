<?php
    declare(strict_types = 1);

    namespace App\Constants;


    class BulletinsConstants
    {
        /** @var int Bulletin created and active */
        const STATUS_ACTIVE = 1;

        /** @var int Bulletin closed and offer is applied */
        const STATUS_CLOSED = 0;

        /** @var array Rules for request validation */
        public static $validationRules = [
            'title'       => 'required|filled|max:255',
            'description' => 'required|filled',
            'cost'        => 'required|filled|numeric|min:0',
            'image'       => 'image|max:3145728', // 3mb
            'image_url'   => 'url',
        ];
    }