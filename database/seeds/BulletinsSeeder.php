<?php
    declare(strict_types = 1);

    use App\Bulletin;
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

            Bulletin::truncate();
            for ($i = 0; $i < $count; ++$i) {
                Bulletin::create([
                    'title'       => $faker->sentence,
                    'description' => implode(' ', $faker->sentences(10)),
                    'image'       => $faker->imageUrl(),
                    'cost'        => $faker->randomFloat(8),
                    'status'      => $faker->boolean ? Bulletin::STATUS_ACTIVE : Bulletin::STATUS_INACTIVE,
                ]);
            }
        }
    }
