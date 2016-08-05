<?php
    declare(strict_types = 1);

    use App\Bulletin;
    use App\User;
    use Faker\Factory;
    use Illuminate\Database\Seeder;

    class BulletinsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $count = 100;
            $faker = Factory::create();
            $users = User::all();

            Bulletin::truncate();
            for ($i = 0; $i < $count; ++$i) {
                Bulletin::create([
                    'title'       => $faker->sentence,
                    'description' => implode(' ', $faker->sentences(10)),
                    'image'       => "https://unsplash.it/800/600?image={$i}",
                    'cost'        => $faker->randomFloat(8),
                    'status'      => $faker->boolean ? Bulletin::STATUS_ACTIVE : Bulletin::STATUS_CLOSED,
                    'user_id'     => $users[ array_rand($users->toArray()) ]->id,
                ]);
            }
        }
    }
