<?php

namespace App\Http\Controllers\Cecy;

use App\Http\Controllers\Controller;
use App\Models\Cecy\Authorities;
use App\Models\Ignug\State;
use App\Models\Cecy\Catalogue;
use App\Models\Authentication\Role ;
use App\Models\Authentication\User ;
use Illuminate\Http\Request;

class AuthoritiesController extends Controller
{
    public function index(Request $request)
    {
        //$authorities = Authorities::all();
        $authorities = Authorities::with('user','status','position','state')->get();

        return response()->json([
            'data' => $authorities,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }
    
    public function show( $id)
    { 
        $authorities=Authorities::find($id);
        return response()->json([
            'data' => $authorities,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);  
    }

    public function filter(Request $request)
    {
        $authorities = Authorities::where('name', $request->name)->orderBy('name')->get();
        return response()->json([
            'data' => $authorities,
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
        $dataStatus =  $data['status'];
        $dataPosition =  $data['position'];
        $dataAuthorities = $data['authorities'];

        $authorities = new Authorities( $dataAuthorities);
        $authorities-> state()->associate(State::where('code', '1')->first());
        $authorities-> user()->associate(User::findorfail($dataUser['id']));
        $authorities-> position()->associate(Catalogue::findorfail($dataPosition['id']));// error associate
        $authorities-> status()->associate(Catalogue::findorfail($dataStatus['id']));
        //return  $authorities;
        
        $authorities-> save();
        return response()->json([
            'data' => $authorities,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);



        /*
        $data = $request->all();

        Authorities::create($data);
        return response()->json([
            'data' => [
                'attributes' => $data,
                'type' => 'authorities'
            ]
        ], 201);
        ///cambio


        
        $data = $request->json()->all();
        $dataAuthorities = $data['authorities'];
        $dataUser= $data['authorities'];
        $dataRole= $data['authorities'];
        $dataState = $data['authorities'];
        $dataPosition = $data['authorities'];


        $authorities = new Authorities();
        $authorities->start_position=$dataAuthorities['start_position'];
        $authorities->end_position=$dataAuthorities['end_position'];


        $user = User::findOrFail($dataUser['id']);
        $role = Role::findOrFail($dataRole['id']);
        $state = State::findOrFail($dataState['id']);
        $position = Institucion::findOrFail($dataInstitucion['id']);
        $authorities->user()->associate('user');
        $authorities->role()->associate('role');
        $authorities->state()->associate('state');a
        $authorities->tasks()->associate('position');
        $authorities -> save();
        return response()->json([
            'data' => [
                'attributes' => $data,
                'type' => 'authorities'
            ]
        ], 201);

        

*/


    }

    public function update(Request $request, $id, authorities $Authorities)
    {
        $data = $request->all();
        $dataUser =  $data['user'];
        $dataStatus =  $data['status'];
        $dataPosition =  $data['position'];
        $dataAuthorities = $data['authorities'];

        $authorities = Authorities::findOrfail($id);  
        $authorities->start_position = $dataAuthorities['start_position'];
        $authorities->end_position = $dataAuthorities['end_position']; 
        $authorities-> user()->associate(User::findorfail($dataUser['id']));
        $authorities-> position()->associate(Catalogue::findorfail($dataPosition['id']));
        $authorities-> status()->associate(Catalogue::findorfail($dataStatus['id']));


        return response()->json([
            'data' => $authorities,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function destroy($id)
    {
        $state = State::where('code', '2')->first();
        $authorities = Authorities::findOrFail($id);
        $authorities->state_id = 2; 
        $authorities->save();
        return response()->json([
            'data' => $authorities,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }
}
