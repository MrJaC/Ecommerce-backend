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
            $prod = app(Products::class)->getProducts();
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

    public function getProdIDViaSub(Request $request){

    }
    public function addProd(Request $request){

        $prod = array(
            'user_id' => $request->user_id,
            'product_name' => $request->prod_name,
            'product_price' => $request->prod_price,
            'product_cat' => $request->prod_cat,
            'product_subcat' => $request->prod_subcat,
            'product_description' => $request->prod_desc,
            'product_sku' => $request->prod_sku,
            'product_amount' => $request->prod_amount,
            'vendor_id' => $request->user_vendor_id,
        );
        error_log(print_r($prod,true));

        if(!$data = app(Products::class)->addProd($prod)){
            return response()->json([
                'message' => 'Error adding product'
            ], 401);
        }else{
            return response()->json(['message' => 'Product Added!'],201);
        }


    }
}
