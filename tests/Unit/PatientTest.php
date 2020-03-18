<?php

namespace Tests;


use App\Patient;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use PatientTableSeeder;


class PatientTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function testPatientCreation()
    {
        factory(Patient::class)->create([
            'status' => 2
        ]);

        $this->assertDatabaseHas('patients', ['status' => 2]);
    }

    public function testPatientWithSymptomCreation(){
        $this->seed(PatientTableSeeder::class);
        $this->assertEquals(2, Patient::count());
    }

}
