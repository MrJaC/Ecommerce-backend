<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Subcategories;
use App\Vendor;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ProductsAPIController extends Controller
{
    public function index()
    {

        //return response()->json($prod);
        if ($prod = app(Products::class)->getProducts()->isEmpty()) {
            return response()->json([
                'message' => 'No Data',
            ], 401);
        } else {
            return response()->json([
                'message' => 'success',
                'data' => $prod
            ], 201);
        }
    }

    public function getProductID(Request $request)
    {

        if (!$data = app(Products::class)->getCurrProducts($request->id)) {
            return response()->json([
                'message' => 'No Data',
            ], 401);
        } else {
            return response()->json([
                'message' => 'sucess',
                'data' => $data
            ], 201);
        }
    }
}
