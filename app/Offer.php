<?php

    declare(strict_types = 1);

    namespace App;

    use App\Constants\OffersConstants;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    /**
     * Class Offer
     * @package App
     *
     * @property User     $user
     * @property Bulletin $bulletin
     * @property int      $id
     * @property string   $title
     * @property string   $description
     * @property float    $cost
     * @property int      $status
     * @property int      $user_id
     * @property int      $bulletin_id
     */
    class Offer extends Model
    {
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
            return $this->status === OffersConstants::STATUS_APPLIED;
        }
    }
