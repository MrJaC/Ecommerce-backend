<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;
use App\SubCategories;
use App\Products;

class SubcategoriesAPIController extends Controller
{
    public function index()
    {
        $data = app(SubCategories::class)->getData();


        if ($data) {
            return response()->json(
                [
                    'message' => 'success',
                    'data' => $data

                ],
                201
            );
        } else {
            return response()->json(
                ['message' => 'No data'],
                201
            );
        }
    }

    public function getSubCat(Request $request)
    {
        $id = $request->id;
        $data = app(Subcategories::class)->getSubcats($id);
        if(app(Subcategories::class)->getSubcats($id)->isEmpty()){

           $data = array('none');
            return response()->json(
                [
                    'status' => 'Good',
                    'message' => 'No data',
                    'data' => $data
                ],201);
        }else{
            return response()->json([
                'status' => 'Good',
                'message' => 'Got Data',
                'data' => $data
            ]);
        }
    }
    public function getProdViaSub(Request $request)
    {
        $subID = $request->subID;
        $catID = $request->catID;



        if (app(Products::class)->getProdViaSub($subID, $catID)->isEmpty()) {

            return response()->json(
                ['message' => 'No data',
                'data' => 0],
                201
            );
        } else {
            $data = app(Products::class)->getProdViaSub($subID, $catID);
            error_log(print_r($data, true));
            return response()->json(
                [
                    'message' => 'success',
                    'data' => $data

                ],
                201
            );
        }
    }
}
