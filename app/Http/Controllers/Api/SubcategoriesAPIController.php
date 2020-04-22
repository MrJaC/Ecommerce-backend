<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;
use App\SubCategories;
class SubcategoriesAPIController extends Controller
{
    public function index()
    {
        $data = app(SubCategories::class)->getData();


        if($data){
            return response()->json(
                [
                    'message' => 'success',
                    'data' => $data

                ],201);
        }else{
            return response()->json(
                ['message' => 'No data'],201
            );
        }
    }

    public function getSubCat(Request $request){
        $id = $request->id;
        $data = app(Subcategories::class)->getSubcats($id);
        error_log(print_r($request->id,true));
        error_log(print_r($data,true));
        if($data){
            return response()->json(
                [
                    'message' => 'success',
                    'data' => $data

                ],201);
        }else{
            return response()->json(
                ['message' => 'No data'],201
            );
        }


    }
}
