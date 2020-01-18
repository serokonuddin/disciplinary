<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Natureofpunishment extends Model
{
    protected $fillable = ['id','punishment_type'];
    protected $table="nature_of_punishment";


    public $timestamps = false;
}
