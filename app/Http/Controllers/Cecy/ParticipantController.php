<?php

namespace App\Http\Controllers\Cecy;

use App\Http\Controllers\Controller;
use App\Models\Cecy\Participant;
use App\Models\Authentication\User;
use App\Models\Cecy\Catalogue;
use App\Models\Ignug\State;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        //$participant = Participant::all();
        $participant = Participant::with('user','state','participants')->get();
        return response()->json([
            'data' => $participant,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);


        /*return response()->json([
                'data' => [
                    'type' => 'participant',
                    'attributes' => $participant
                ]]
            , 200);*/
    }


    public function show( $id)
    { 
        $participant=Participant::find($id);
        return response()->json([
            'data' => $participant,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function filter(Request $request)
    {
        $participant = Participant::where('free', $request->free)->orderBy('id')->get();
        return response()->json([
            'data' => $participant,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $dataUser =  $data['user'];
        $dataType =  $data['person_type'];
        $dataParticipants = $data['participant'];

        $participant = new Participant( $dataParticipants );
        $participant-> user()->associate(User::findorfail($dataUser['id']));
        $participant-> participants()->associate(Catalogue::findorfail($dataType['id']));
        $participant-> state()->associate(State::where('code', '1')->first());
        $participant -> save();
        return response()->json([
            'data' => $participant,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);



       /* $data = $request->all();

        Participant::create($data);
        return response()->json([
            'data' => [
                'attributes' => $data,
                'type' => 'participant'
            ]
        ], 201);*/


        /*
        $data = $request->all();
        $dataUser =  $data['user'];
        $dataParticipant =  $data['participants'];
        $dataParticipants = $data['participant'];


        $participant = new Participant();


        $user = User::findOrFail($dataUser['id']);
        $participants = Catalogue::findOrFail($dataRole['id']);
        $state = State::findOrFail($dataState['id']);

        $participant->user()->associate('user');
        $participant->participants()->associate('participants');
        $participant->state()->associate('state');
        $participant -> save();
        return response()->json([
            'data' => [
                'attributes' => $data,
                'type' => 'participant'
            ]
        ], 201);

        */
    }

    public function update(Request $request, $id, Participant $Participant)
    {
        $data = $request->all();
        $dataUser =  $data['user'];
        $dataType =  $data['person_type'];
        $dataParticipants = $data['participant'];
        $participant = Participant::findOrfail($id);   
        $participant-> participants()->associate(Catalogue::findorfail($dataType['id']));
        
        $participant->save();


        
        return response()->json([
            'data' => $participant,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function destroy($id)
    {
        $state = State::where('code', '2')->first();
        $participant = Participant::findOrFail($id);
        $participant->state_id = 2; 
        $participant->save();
        return response()->json([
            'data' => $participant,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }
}
