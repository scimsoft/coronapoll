<?php

namespace Tests;

use App\Symptom;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SymptomsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function testSymptomsCreation()
    {
        factory(Symptom::class)->create([
            'ip' => '192.168.1.1',
            'patient_id' => 123213,
        'coX' => '100',
        'coY' => '101',
        'location' => 1,
        'temp' => 23,
        'caugh' => 3,
        'musclePain' => 3,
        'breathShortness' => 3,
        ]);

        $this->assertDatabaseHas('symptoms', ['ip' => '192.168.1.1']);
    }

}
