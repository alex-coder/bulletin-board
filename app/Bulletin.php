<?php

    declare(strict_types = 1);

    namespace App;

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    /**
     * Class Bulletin
     * @package App
     *
     * @property User    $user
     * @property Offer[] $offers
     */
    class Bulletin extends Model
    {
        const STATUS_ACTIVE = 1;
        const STATUS_CLOSED = 0;

        public static function active() : Builder
        {
            return static::where(['status' => static::STATUS_ACTIVE]);
        }

        public function user() : BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function offers() : HasMany
        {
            return $this->hasMany(Offer::class);
        }

        public function isOfferCreated(User $user) : bool
        {
            return Offer::where([
                'user_id'     => $user->id,
                'bulletin_id' => $this->id,
            ])->count() > 0;
        }

        public function isActive() : bool
        {
            return $this->status === static::STATUS_ACTIVE;
        }
    }
