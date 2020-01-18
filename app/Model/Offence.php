<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offence extends Model
{
    protected $fillable = ['id','offence_name'];
    protected $table="offence";


    public $timestamps = false;
}
