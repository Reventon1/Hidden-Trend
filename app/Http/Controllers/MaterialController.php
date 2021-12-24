<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Symfony\Component\Mime\Message;

class MaterialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    public function showAll() {
        $materials = Material::all();
        foreach($materials as $material) {
            $material['materials'] = Material::all()->where('material_id', '==', $material['id'])->values();
        }
        return response()->json($materials, 200);
    }

    public function add(Request $request){
        $material_name = $request->input("material_name");
        $material_info = $request->input("material_info");


        $material = new Material();


        $material->material_name = $material_name;
        $material->material_info = $material_info;
        $material->save();

        return response()->json($material, 200);
    }


    public function edit(Request $request, $material_id){
        $material_name = $request->input("material_name");
        $material_info = $request->input("material_info");


        $material = Material::find($material_id);


        $material->material_name = $material_name;
        $material->material_info = $material_info;
        $material->save();

        return response()->json($material, 200);
    }


    public function show($material_id) {
        $material = Material::find($material_id);
        return response()->json($material, 200);
    }


    public function delete($material_id) {
        $material = Material::find($material_id);
        $material->delete();
        return response()->json(["message" => "Deleted"], 200);
    }


}
