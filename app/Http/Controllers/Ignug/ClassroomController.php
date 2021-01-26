<?php

namespace App\Http\Controllers\Ignug;

use App\Http\Controllers\Controller;
use App\Models\Ignug\Classroom;
use App\Models\Ignug\State;
use App\Models\Ignug\Image;

use App\Models\Ignug\Catalogue;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;

class ClassroomController extends Controller
{
    public function index(Request $request)
    {
        //$classroom = Classroom::all();
        $classroom = Classroom::with('type','state')->get();

        return response()->json([
            'data' => $classroom,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }
    

    public function filter(Request $request)
    {
        $classroom = Classroom::where('id', $request->id)->orderBy('id')->get();
        return response()->json([
            'data' => $classroom,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }
    public function show( $id)
    { 
        $classroom=Classroom::find($id);
        return response()->json([
            'data' => $classroom,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
  
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $dataType =  $data['type'];
        $dataClassroom = $data['classroom'];

        $classroom = new Classroom( $dataClassroom );
        $classroom->name = $dataClassroom['name'];
        $classroom->icon = 'assets/pages';
        $classroom->code = $dataClassroom['code'];
        $classroom->capacity = $dataClassroom['capacity'];
         
    
        $classroom-> type()->associate(Catalogue::findorfail($dataType['id']));
        $classroom-> state()->associate(State::where('code', '1')->first());
        
        //$classroom-> state()->associate(State::where('code', '1')->first());
        $classroom -> save();
        $data['classroom']['id'] = $classroom->id;


        return response()->json([
            'data' => $classroom,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function update(Request $request, $id, Classroom $classroom)
    {


        $data = $request->json()->all();
        $dataType =  $data['type'];
        $dataClassroom = $data['classroom'];

        $classroom = Classroom::findOrfail($id);   
        $classroom->name = $dataClassroom['name'];
        $classroom->icon = $dataClassroom['icon'];
        $classroom->code = $dataClassroom['code'];
        $classroom->capacity = $dataClassroom['capacity'];

        $type = Catalogue::findOrFail($dataType);
        $classroom-> type()->associate(Catalogue::findorfail($dataType['id']));
        
        $classroom->save();
        return response()->json([
            'data' => $classroom,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
        /*$data = $request->all();

        $classroom = Classroom::where('id', $id)->update($data);
        return response()->json([
            'data' => [
                'type' => 'classroom',
                'attributes' => $data
            ]
        ], 200);
*/
        /*$data = $request->all();
        $dataType =  $data['type'];
        $dataStatus =  $data['state'];
        $dataClassroom = $data['classroom'];

        $classroom =  Classroom::findOrFail($id);
        $classroom ->update($dataClassroom);
        $state = State::findOrFail($dataStatus);
        $type = Catalogue::findOrFail($dataType);
        $classroom->state()->associate($state);
        $classroom->type()->associate($state);
        $classroom->save();
        return response()->json([   
            'data' => [
                'type' => 'classroom',
                'attributes' => $data
            ]
        ], 200);    */
    }

    public function destroy( Request $request, $id )
    {
        $state = State::where('code', '2')->first();
        $classroom = Classroom::findOrFail($id);
        $classroom->state_id = 2;
        $classroom->save();
        return response()->json([
            'data' => $classroom,
            'msg' => [
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]], 200);
    }

    public function upload(Request $request)
    {

        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:5120',
            'name' => 'required|max:255',
            'description' => 'required|max:500',
        ]);

        return Image::upload(Classroom::find($request->classroom_id), $request);


        
    }


}
    