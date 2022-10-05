<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporary extends Model
{

    protected $table='temporary_passwords';
    protected $guarded=['id'];

    public $timestamps = false;
}
