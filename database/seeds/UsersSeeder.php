<?php
    declare(strict_types=1);

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
                User::create([
                    'id'       => 1,
                    'name'     => 'user',
                    'email'    => 'user@users.com',
                    'password' => bcrypt('user'),
                ]);
            }
        }
    }
