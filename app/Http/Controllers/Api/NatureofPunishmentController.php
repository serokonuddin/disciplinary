<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NatureofPunishment;
class NatureofPunishmentController extends Controller
{
    public function searchPunishmentType(Request $request){
        $data=NatureofPunishment::Where('punishment_type', 'like', '%' . $request->punishment . '%')->get();
        return response()->json($data);
    }
}
