<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Disciplinary;
use App\Model\Offence;
use App\Model\Natureofpunishment;
class DisciplinaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if($id==0){
            $data=Disciplinary::all();
            
        }else{
            $data=Disciplinary::where('employee_id',$id)->get();
        }
        return response()->json($data);
    }

   
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $dataoffence=Offence::where('offence_name',$request->offence)->get()->first();
        
        if(empty($dataoffence)){
            $offence= new Offence();
            $offence->offence_name=$request->offence;
            $offence->save();
        }
        $datanp=Natureofpunishment::where('punishment_type',$request->natureofpunishment)->get()->first();
        if(empty($datanp)){
            $punishmenttype= new Natureofpunishment();
            $punishmenttype->punishment_type=$request->natureofpunishment;
            $punishmenttype->save();
        }
        $disciplinary=new Disciplinary();

        $disciplinary->employee_id=$request->employee_id;
        $disciplinary->offence=$request->offence;
        $disciplinary->go_date=$request->go_date;
        $disciplinary->punishment_type=$request->natureofpunishment;
        $disciplinary->punishment_line_1=$request->pl1;
        $disciplinary->punishment_line_2=$request->pl2;
        $disciplinary->remarks=$request->remarks;
        $disciplinary->created_at=date('Y-m-d h:i:s');
        $disciplinary->created_by=1;
        $disciplinary->save();

        return response()->json('successfully added disciplinary');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Disciplinary::find($id);
        $value=array();
        $value=$data;
        $value->employee=$data->employee;
        return response()->json($value);
    }

   
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataoffence=Offence::where('offence_name',$request->offence)->get()->first();
        
        if(empty($dataoffence)){
            $offence= new Offence();
            $offence->offence_name=$request->offence;
            $offence->save();
        }
        $datanp=Natureofpunishment::where('punishment_type',$request->natureofpunishment)->get()->first();
        if(empty($datanp)){
            $punishmenttype= new Natureofpunishment();
            $punishmenttype->punishment_type=$request->natureofpunishment;
            $punishmenttype->save();
        }
        $disciplinary=Disciplinary::find($id);

        $disciplinary->employee_id=$request->employee_id;
        $disciplinary->offence=$request->offence;
        $disciplinary->go_date=$request->go_date;
        $disciplinary->punishment_type=$request->natureofpunishment;
        $disciplinary->punishment_line_1=$request->pl1;
        $disciplinary->punishment_line_2=$request->pl2;
        $disciplinary->remarks=$request->remarks;
        $disciplinary->created_at=date('Y-m-d h:i:s');
        $disciplinary->created_by=1;
        $disciplinary->save();

        return response()->json('successfully Update disciplinary');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disciplinary=Disciplinary::find($id);

        $disciplinary->delete();
        return response()->json('successfully deleted disciplinary');
    }
}
