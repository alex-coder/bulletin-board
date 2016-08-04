<?php
    declare(strict_types = 1);

    use App\Bulletin;
    use App\Offer;
    use App\User;
    use Faker\Factory;
    use Illuminate\Database\Seeder;

    class OffersSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $faker     = Factory::create();
            $users     = User::all();
            $bulletins = Bulletin::all();

            Offer::truncate();
            for ($i = 0; $i < 100; ++$i) {
                Offer::create([
                    'title'       => $faker->sentence,
                    'description' => implode(' ', $faker->sentences(10)),
                    'cost'        => $faker->randomFloat(8),
                    'status'      => $faker->boolean ? Bulletin::STATUS_ACTIVE : Bulletin::STATUS_CLOSED,
                    'user_id'     => $users[ array_rand($users->toArray()) ]->id,
                    'bulletin_id' => $bulletins[ array_rand($bulletins->toArray()) ]->id,
                ]);
            }
        }
    }
