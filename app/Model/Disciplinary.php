<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Employee;
class Disciplinary extends Model
{
    protected $fillable = ['id','employee_id','go-date','offence','punishment_type','punishment_line_1','punishment_line_2','remarks'];
    protected $table="disciplinary";



    public $timestamps = false;


    public function employee(){

        return $this->belongsTo(Employee::class,'employee_id');
    }
}
