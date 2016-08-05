<?php

    declare(strict_types = 1);

    use App\Constants\OffersConstants;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class CreateOffers extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('offers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->text('description');
                $table->decimal('cost')->unsigned();
                $table->integer('status')->default(OffersConstants::STATUS_ACTIVE);
                $table->timestamps();

                $table->integer('user_id')->unsigned();
                $table->integer('bulletin_id')->unsigned();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::drop('offers');
        }
    }
