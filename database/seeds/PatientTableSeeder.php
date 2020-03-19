<?php

use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Patient::class, 200)->create()->each(function($u) {
            $u->symptoms()->saveMany(factory(App\Symptom::class,4)->make());
        });
    }
}
