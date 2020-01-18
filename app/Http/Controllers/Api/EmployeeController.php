<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Employee;
class EmployeeController extends Controller
{
    public function searchEmployee(Request $request){
        
        $data=Employee::Where('employee_code', $request->search_employee)->get()->first();
        
        return response()->json($data);
    }
}
