<?php

    declare(strict_types = 1);

    use App\Bulletin;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class CreateBulletinTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('bulletins', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->text('description');
                $table->text('image');
                $table->decimal('cost')->unsigned();
                $table->integer('status')->default(Bulletin::STATUS_ACTIVE);
                $table->timestamps();

                $table->integer('user_id')->unsigned();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::drop('bulletins');
        }
    }
