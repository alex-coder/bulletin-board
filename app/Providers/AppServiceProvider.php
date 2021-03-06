<?php

    namespace App\Providers;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\ServiceProvider;

    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot()
        {
            DB::listen(function ($query) {
                $bindings = count($query->bindings) ? json_encode($query->bindings) : '';
                Log::debug("[SQL] {$query->sql} {$bindings} {$query->time}ms");
            });
        }

        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {
        }
    }
