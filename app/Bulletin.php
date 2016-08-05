<?php

    declare(strict_types = 1);

    namespace App;

    use App\Utils\ImagesUtils;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
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

        public function scopeActive(Builder $query) : Builder
        {
            return $query->where(['status' => static::STATUS_ACTIVE]);
        }

        public function user() : BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function offers() : HasMany
        {
            return $this->hasMany(Offer::class);
        }

        public function offerByUser(User $user) : Offer
        {
            return Offer::where([
                'user_id'     => $user->id,
                'bulletin_id' => $this->id,
            ])->first();
        }

        public function isOfferCreated(User $user) : bool
        {
            return count($this->offerByUser($user)) > 0;
        }

        public function isActive() : bool
        {
            return $this->status === static::STATUS_ACTIVE;
        }

        public function isClosed() : bool
        {
            return $this->status === static::STATUS_CLOSED;
        }

        public function getImageUrl() : string
        {
            if ($this->image === null) {
                return '';
            }

            if (filter_var($this->image, FILTER_VALIDATE_URL)) {
                return $this->image;
            }

            return ImagesUtils::buildUrl($this->image);
        }
    }
