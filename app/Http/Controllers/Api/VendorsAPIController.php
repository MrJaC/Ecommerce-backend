<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;
use App\Categories;
use App\Subcategories;
use App\VendorProfile;
use App\Customers;
use App\Products;

class VendorsAPIController extends Controller
{
    public function index()
    {
        $vendors = app(Vendor::class)->getVendors();


        return response()->json($vendors);
    }

    public function getMyVendors(Request $request){
        $id = $request->id;
        $current = app(Vendor::class)->getUserVendor($id);
        error_log(print_r($current,true));
        return response()->json([
            'message' => 'Got',
            'data' => $current
        ],201);

    }
    public function getMyVendorProducts(Request $request){
        $ven_id = $request->id;

        $myProducts = app(Vendor::class)->getMyVendorProducts($ven_id);

        if($myProducts){
            return response()->json([
                'status' => 'Ok',
                'data' =>  $myProducts
            ],201);
        }else{
            return response()->json([
                'status' => 'Failed',
                'message' => 'No Products'
            ],201);
        }
    }
    public function getVendor(Request $request){
        $ven_id = $request->id;

        $vendorData = app(Vendor::class)->getVendorDetail($ven_id);

        if($vendorData){
            return response()->json([
                'status' => 'Ok',
                'data' =>  $vendorData
            ],201);
        }else{
            return response()->json([
                'status' => 'Failed',
                'message' => 'No Products',
                'data' => 0
            ],201);
        }
    }
    public function addVendorProduct(Request $request){

        $data = array(
            'product_name' => $request->prod_name,
            'product_price' => $request->prod_price,
            'product_cat' => $request->prod_cat,
            'product_subcat' => $request->prod_subcat,
            'product_description' => $request->prod_desc,
            'product_sku' => $request->prod_sku,
            //'product_main_image' => $fileName,
            'product_amount' => $request->prod_amount,
            'user_id' => $request->user_id,
            'vendor_id' => $request->vend_id
        );

        error_log(print_r($data,true));
        $addProd = app(Products::class)->addProd($data);

        if($addProd){
            return response()->json([
                'status' => 'Accepted',
                'message' => 'Added Product'
            ],201);
        }else{
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Product'
            ],201);
        }
    }


    //addVendor
    public function addVendor(Request $request){

        $data = array(
            'vendor_business_name'      => $request->business_name,
            'user_id'                   => $request->user_id,
            'vendor_mobile'             => $request->mobile,
            'vendor_landline'           => $request->landline,
            'vendor_address_street'     => $request->streetAddress,
            'vendor_address_number'     => $request->streetNumber,
            'vendor_address_suburb'     => $request->suburb,
            'vendor_address_postcode'   => $request->postcode,
            'vendor_email'              => $request->email,
            'vendor_website'            => $request->website,
            'about'              => $request->about,
            'approval_status'           => 0

        );


        $check = app(Vendor::class)->checkVendor($request->user_id)->isEmpty();
        error_log(print_r($check,true));
        if($check){
            //add vendor
            //app(VendorProfile::class)->add($data);
            app(VendorProfile::class)->add($data);
            return response()->json([
                'status' => 'Sent for ',
                'message' => 'Vendor Added'
            ],201);

        }else{
            return response()->json([
                'status' => 'Failed',
                'message' => 'Vendor already exists'
            ], 201);


        }
    }
}
