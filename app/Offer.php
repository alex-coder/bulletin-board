<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    /**
     * Class Offer
     * @package App
     *
     * @property User     $user
     * @property Bulletin $bulletin
     */
    class Offer extends Model
    {
        const STATUS_APPLIED  = 2;
        const STATUS_ACTIVE   = 1;
        const STATUS_CANCELED = 0;

        public function user() : BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function bulletin() : BelongsTo
        {
            return $this->belongsTo(Bulletin::class);
        }

        public function isApplied() : bool
        {
            return $this->status === static::STATUS_APPLIED;
        }
    }
