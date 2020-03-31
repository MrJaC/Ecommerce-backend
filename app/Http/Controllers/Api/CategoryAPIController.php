<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;
class CategoryAPIController extends Controller
{
    public function index(){
        $cat = app(Categories::class)->getCat();
       // error_log(print_r($cat,true));
        if (app(Categories::class)->getCat()->isEmpty()) {
            return response()->json([
                'message' => 'No Data',
            ], 401);
        } else {
            return response()->json([
                'message' => 'success',
                'data' =>  $cat
            ], 201);
        }
    }
}
