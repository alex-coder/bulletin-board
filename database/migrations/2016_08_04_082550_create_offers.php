<?php

    declare(strict_types = 1);

    use App\Offer;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

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
                $table->integer('status')->default(Offer::STATUS_ACTIVE);
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
