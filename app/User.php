<?php
    declare(strict_types = 1);

    namespace App;

    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    /**
     * Class User
     * @package App
     *
     * @property Offer[] $offers
     * @property int     $id
     * @property string  $name
     * @property string  $email
     * @property string  $password
     */
    class User extends Authenticatable
    {
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name',
            'email',
            'password',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        public function bulletins() : HasMany
        {
            return $this->hasMany(Bulletin::class);
        }

        public function offers() : HasMany
        {
            return $this->hasMany(Offer::class);
        }
    }
