<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function ($user) {
            $user->activities()->saveMany(factory(App\Activity::class, 10)->make());
            $user->activities()->each(function ($activities) {
                $activities->times()->saveMany(factory(App\Time::class, 4)->make());
            });
        });
    }
}
