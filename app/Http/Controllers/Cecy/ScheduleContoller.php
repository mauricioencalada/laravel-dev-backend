<?php

namespace App\Http\Controllers\Cecy;

use App\Http\Controllers\Controller;
use App\Models\Cecy\Schedule;
use App\Models\Cecy\Catalogue;
use App\Models\Ignug\State;
use Illuminate\Http\Request;

class ScheduleContoller extends Controller
{
    public function index(Request $request)
    {
        //$schedule = Schedule::all();
        $schedule = Schedule::with('state','day')->get();
        
        return response()->json([
            'data' => $schedule,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
        
    }
    public function show( $id)
    { 
        $schedule=Schedule::find($id);
        return response()->json([
            'data' => $schedule,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
  
    }

    public function filter(Request $request)
    {
        $schedule = Schedule::where('name', $request->name)->orderBy('name')->get();
        return response()->json([
            'data' => $schedule,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $dataDya =  $data['day'];
        $dataSchedule= $data['schedule'];

        $schedule = new Schedule( $dataSchedule );
        $schedule-> state()->associate(State::where('code', '1')->first());
        $schedule-> day()->associate(Catalogue::findorfail($dataDya['id']));
        $schedule -> save();
        return response()->json([
            'data' => $schedule,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);



        /*  $data = $request->all();

        Schedule::create($data);
        return response()->json([
            'data' => [
                'attributes' => $data,
                'type' => 'schedule'
            ]
        ], 201);*/



          /*
        $data = $request->all();
        $dataDya =  $data['day'];
        $dataSchedule =  $data['schedule'];

        $schedule = new Schedule();
        $schedule->start_time=$dataSchedule['start_time'];
        $schedule->end_time=$dataSchedule['end_time'];
        $schedule->place=$dataSchedule['place'];
        
        $day = Catalogue::findOrFail($dataDya['id']);
        $state = State::findOrFail($dataState['id']);
      
        $schedule->day()->associate('participants');
        $schedule->state()->associate('state');
        $schedule -> save();
        return response()->json([
            'data' => [
                'attributes' => $data,
                'type' => 'schedule'
            ]
        ], 201);

        */
    }

    public function update(Request $request, $id, Schedule $Schedule)
    {
        $data = $request->json()->all();
        $dataDya =  $data['day'];
        $dataSchedule= $data['schedule'];

        $schedule = Schedule::findOrfail($id);   
        $schedule->start_time = $dataSchedule['start_time'];
        $schedule->end_time = $dataSchedule['end_time'];

        $schedule-> day()->associate(Catalogue::findorfail($dataDya['id']));

        $schedule->save();  

        return response()->json([
            'data' => $schedule,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function destroy($id)
    {
        $state = State::where('code', '2')->first();
        $schedule = Schedule::findOrFail($id);
        $schedule->state_id = 2;
        $schedule->save();
        return response()->json([
            'data' => $schedule,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }
}
