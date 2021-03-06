<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class, 500)->create()->each(function($u) {
            $u->symptoms()->saveMany(factory(App\Symptom::class,2)->make());
        });
    }
}
