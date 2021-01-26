<?php

namespace App\Http\Controllers\Cecy;

use App\Http\Controllers\Controller;
use App\Models\Cecy\SchoolPeriod;
use App\Models\Ignug\State;
use App\Models\Cecy\Catalogue;
use Illuminate\Http\Request;

class SchoolPeriodController extends Controller
{
    public function index(Request $request)
    {
        $schoolPeriods = SchoolPeriod::with('status')->get();


//        $schoolPeriods = SchoolPeriod::paginate($request->page);

        return response()->json([
            'data' => $schoolPeriods,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
        /*return response()->json([
                'data' => [
                    'type' => 'school_period',
                    'attributes' => $school_period
                ]]
            , 200);*/
    }
    public function show( $id)
    { 
        $schoolPeriods=SchoolPeriod::find($id);
        return response()->json([
            'data' => $schoolPeriods,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
  
    }


    public function filter(Request $request)
    {
        $schoolPeriods = SchoolPeriod::where('name', $request->name)->orderBy('name')->get();
        return response()->json([
            'data' => $schoolPeriods,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function store(Request $request)
    {


        /*$data = $request->all();
        $dataSchoolPeriod = $data['school_period'];

        $school_period = new SchoolPeriod( $dataSchoolPeriod );
        
        $school_period-> state()->associate(State::where('code', '1')->first());
        $school_period -> save();
        return response()->json([
            'data' => [
                'attributes' => $data,
                'type' => 'school_period'
            ]
        ], 201);*/



        
         $data = $request->json()->all();
         $dataStatus = $data['status'];
         $dataSchoolPeriod = $data['schoolPeriods'];

        $schoolPeriods = new SchoolPeriod();
        $schoolPeriods->code=$dataSchoolPeriod['code'];
        $schoolPeriods->name=$dataSchoolPeriod['name'];
        $schoolPeriods->start_date=$dataSchoolPeriod['start_date'];
        $schoolPeriods->end_date=$dataSchoolPeriod['end_date'];
        $schoolPeriods->ordinary_start_date=$dataSchoolPeriod['ordinary_start_date'];
        $schoolPeriods->ordinary_end_date=$dataSchoolPeriod['ordinary_end_date'];
        $schoolPeriods->extraordinary_start_date=$dataSchoolPeriod['extraordinary_start_date'];
        $schoolPeriods->extraordinary_end_date=$dataSchoolPeriod['extraordinary_end_date'];
        $schoolPeriods->especial_start_date=$dataSchoolPeriod['especial_start_date'];
        $schoolPeriods->especial_end_date=$dataSchoolPeriod['especial_end_date'];

        $schoolPeriods-> status()->associate(Catalogue::findorfail($dataStatus['id']));
        $schoolPeriods->state()->associate(State::where('code', '1')->first());
        $schoolPeriods -> save();
        return response()->json([
            'data' => [
                'attributes' => $data,
                'type' => 'school_period'
            ]
        ], 201);
        
        
        
        
    
    }

    public function update(Request $request, $id, SchoolPeriod $schoolPeriod)
    {
        $data = $request->json()->all();
       
        $dataSchoolPeriod = $data['schoolPeriods'];

        $schoolPeriods = SchoolPeriod::findOrfail($id);
        $schoolPeriods->code=$dataSchoolPeriod['code'];
        $schoolPeriods->name=$dataSchoolPeriod['name'];
        $schoolPeriods->start_date=$dataSchoolPeriod['start_date'];
        $schoolPeriods->end_date=$dataSchoolPeriod['end_date'];
        $schoolPeriods->ordinary_start_date=$dataSchoolPeriod['ordinary_start_date'];
        $schoolPeriods->ordinary_end_date=$dataSchoolPeriod['ordinary_end_date'];
        $schoolPeriods->extraordinary_start_date=$dataSchoolPeriod['extraordinary_start_date'];
        $schoolPeriods->extraordinary_end_date=$dataSchoolPeriod['extraordinary_end_date'];
        $schoolPeriods->especial_start_date=$dataSchoolPeriod['especial_start_date'];
        $schoolPeriods->especial_end_date=$dataSchoolPeriod['especial_end_date'];

     
        
        $schoolPeriods -> save();

        return response()->json([
            'data' => [
                'type' => 'school_period',
                'attributes' => $data
            ]
        ], 200);
    }

    public function destroy($id)
    {
        $state = State::where('code', '2')->first();
        $schoolPeriods = SchoolPeriod::findOrFail($id);
        $schoolPeriods->state_id = 2;
        $schoolPeriods->save();
        return response()->json([
            'data' => $schoolPeriods,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }
}
