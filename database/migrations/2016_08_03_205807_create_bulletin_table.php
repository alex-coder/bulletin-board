<?php

    declare(strict_types = 1);

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class CreateBulletinTable extends Migration
    {
        /**
         * @return string
         */
        private function tableName() : string
        {
            return 'bulletins';
        }

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create($this->tableName(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->text('description');
                $table->text('image');
                $table->decimal('cost');
                $table->integer('status')->index();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists($this->tableName());
        }
    }
