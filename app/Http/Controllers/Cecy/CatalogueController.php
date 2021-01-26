<?php

namespace App\Http\Controllers\Cecy;

use App\Http\Controllers\Controller;
use App\Models\Cecy\Catalogue;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{


    public function index(Request $request)
    {
        //$institutions = Institution::all();
        $catalegue = Catalogue::all();
        return response()->json( $catalegue);


        /*return response()->json([
                'data' => [
                    'type' => 'institutions',
                    'attributes' => $institutions
                ]]
            , 200);*/
    }

}
