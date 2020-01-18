<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['id','employee_name','employee_code','ranks','designation','organization','location','spds','lpds','	image'];
    protected $table="employees";
}
