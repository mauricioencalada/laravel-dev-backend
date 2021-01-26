<?php

namespace App\Http\Controllers\Cecy;

use App\Http\Controllers\Controller;
use App\Models\Cecy\Institution;
use App\Models\Ignug\State;
use App\Models\Ignug\Image;
use Illuminate\Http\Request;
use App\Models\Cecy\Authorities;


class InstitutionsController extends Controller
{
    public function index(Request $request)
    {
        //$institutions = Institution::all();
        $institutions = Institution::with('state','authorities')->get();

        return response()->json([
            'data' => $institutions,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function show( $id)
    { 
        $institutions=Institution::find($id);
        return response()->json([
            'data' => $institutions,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
  
    }
    
    public function filter(Request $request)
    {
        $institutions = Institution::where('name', $request->name)->orderBy('name')->get();
        return response()->json([
            'data' => $institutions,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $dataAutorities = $data['authorities'];
        $dataInstitutions = $data['institutions'];

        $institutions = new Institution( $dataInstitutions );
        $institutions->code=$dataInstitutions['code'];
        $institutions->ruc=$dataInstitutions['ruc'];
        $institutions->name=$dataInstitutions['name'];
        $institutions->logo='assets/pages';
        $institutions->slogan=$dataInstitutions['slogan'];
        $institutions-> authorities()->associate(Authorities::findorfail($dataAutorities['id']));
        $institutions-> state()->associate(State::where('code', '1')->first());
        //return $institutions;
        $institutions -> save(); 
        return response()->json([
            'data' => $institutions,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);

/*

$data = $request->all();

        institutions::create($data);
        return response()->json([
            'data' => [
                'attributes' => $data,
                'type' => 'institutions'
            ]
        ], 201);
*/




        /*$data = $request->json()->all();
        $dataImage = $data['image'];
        $dataState = $data['institutions'];
        

        $institutions = new institutions();
        $institutions->name=$datainstitutions['name'];
        $institutions->slogan=$datainstitutions['slogan'];
        $institutions->code=$datainstitutions['code'];

        $state = State::findOrFail($dataState['id']);
        $logo = Image::findOrFail($dataImage['id']);
        $institutions->state()->associate('state');
        $institutions->authoritie()->associate('authoritie');
        $institutions -> save();

        */
    }

    public function update(Request $request, $id, Institution $institutions)
    {
        $data = $request->json()->all();
        $dataAutorities = $data['logo'];
        $dataInstitutions = $data['institutions'];

        $institutions = Institution::findOrfail($id);
        $institutions->code=$dataInstitutions['code'];
        $institutions->ruc=$dataInstitutions['ruc'];
        $institutions->name=$dataInstitutions['name'];
        $institutions->slogan=$dataInstitutions['slogan'];

        $institutions-> autorities()->associate(Authorities::findorfail($dataAutorities['id']));

        $institutions->save();
        return response()->json([
            'data' => $institutions,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function destroy($id)
    {
        $state = State::where('code', '2')->first();
        $institutions = Institution::findOrFail($id);
        $institutions->state_id = 2;
        $institutions->save();
        return response()->json([
            'data' => $institutions,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }
}
