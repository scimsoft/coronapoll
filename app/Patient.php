<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Symptom;


class Patient extends Model
{
    //
    public function symptoms()
    {
        return $this->hasMany('App\Symptom');
    }
}
