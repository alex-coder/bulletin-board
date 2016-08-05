<?php
    declare(strict_types = 1);

    namespace App\Constants;


    class OffersConstants
    {
        /** @var int Offer created and active */
        const STATUS_ACTIVE = 1;

        /** @var int Offer applied */
        const STATUS_APPLIED = 2;

        /** @var int Offer canceled */
        const STATUS_CANCELED = 0;

        /** @var array Rules for validation offer request */
        public static $validationRules = [
            'title'       => 'required|filled|max:255',
            'description' => 'required|filled',
            'cost'        => 'required|filled|numeric|min:0',
        ];
    }