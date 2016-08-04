<?php
    declare(strict_types = 1);

    use App\User;
    use Illuminate\Database\Seeder;

    class UsersSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            if (User::count() === 0) {
                for ($i = 0; $i < 10; ++$i) {
                    User::create([
                        'name'     => "user{$i}",
                        'email'    => "user{$i}@users.com",
                        'password' => bcrypt("user{$i}"),
                    ]);
                }
            }
        }
    }
