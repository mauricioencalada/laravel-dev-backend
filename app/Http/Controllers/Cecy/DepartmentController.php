<?php

namespace App\Http\Controllers\Cecy;

use App\Http\Controllers\Controller;
use App\Models\Cecy\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $department = Departments::all();

        return response()->json([
                'data' => [
                    'type' => 'department',
                    'attributes' => $department
                ]]
            , 200);
    }

    public function filter(Request $request)
    {
        $department_data = Departments::where('name', $request->name)->orderBy('name')->get();
        return response()->json([
                'data' => [
                    'type' => 'department_data',
                    'attributes' => $department_data
                ]]
            , 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Departments::create($data);
        return response()->json([
            'data' => [
                'attributes' => $data,
                'type' => 'department_data'
            ]
        ], 201);
    }

    public function update(Request $request, $id, Departments $Departments)
    {
        $data = $request->all();

        $DepartmentData = Departments::where('id', $id)->update($data);
        return response()->json([
            'data' => [
                'type' => 'department_data',
                'attributes' => $data
            ]
        ], 200);
    }

    public function destroy($id)
    {
        $department_data = Departments::destroy($id);
        return response()->json([
            'data' => [
                'attributes' => $id,
                'type' => 'department_data'
            ]
        ], 201);
    }
}
