<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Offence;
class OffenceController extends Controller
{
    public function searchOffence(Request $request){
        $data=Offence::Where('offence_name', 'like', '%' . $request->offence . '%')->get();
        return response()->json($data);
    }
}
