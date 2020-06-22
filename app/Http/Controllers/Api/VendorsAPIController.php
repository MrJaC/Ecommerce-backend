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
        $vendors = app(Vendor::class)->getAppVendors();


        return response()->json($vendors);
    }

    public function getMyVendors(Request $request)
    {
        $id = $request->id;
        $current = app(Vendor::class)->getUserVendor($id);
        error_log(print_r($current, true));
        return response()->json([
            'message' => 'Got',
            'data' => $current
        ], 201);
    }
    public function getMyVendorProducts(Request $request)
    {
        $ven_id = $request->id;

        $myProducts = app(Vendor::class)->getMyVendorProducts($ven_id);

        if ($myProducts) {
            return response()->json([
                'status' => 'Ok',
                'data' =>  $myProducts
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'No Products'
            ], 201);
        }
    }
    public function getVendor(Request $request)
    {
        $ven_id = $request->id;

        $vendorData = app(Vendor::class)->getVendorDetail($ven_id);

        if ($vendorData) {
            return response()->json([
                'status' => 'Ok',
                'data' =>  $vendorData
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'No Products',
                'data' => 0
            ], 201);
        }
    }
    public function addVendorProduct(Request $request)
    {

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

        error_log(print_r($data, true));
        $addProd = app(Products::class)->addProd($data);

        if ($addProd) {
            return response()->json([
                'status' => 'Accepted',
                'message' => 'Added Product'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Product'
            ], 201);
        }
    }


    //addVendor
    public function addVendor(Request $request)
    {

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
        error_log(print_r($check, true));
        if ($check) {
            //add vendor
            //app(VendorProfile::class)->add($data);
            app(VendorProfile::class)->add($data);
            return response()->json([
                'status' => 'Sent for ',
                'message' => 'Vendor Added'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Vendor already exists'
            ], 201);
        }
    }
    //edit vendor details
    public function editVendorName(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $user_id = $request->user_id;
        $data = array('vendor_business_name' => $request->v_name);

        $updateDetails = app(Vendor::class)->updateVendor($user_id, $data);
        if ($updateDetails == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Business Name Updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Business Name Update, try again'
            ], 201);
        }
    }
    public function editVendorMobile(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $user_id = $request->user_id;
        $data = array('vendor_mobile' => $request->v_mobile);

        $updateDetails = app(Vendor::class)->updateVendor($user_id, $data);
        if ($updateDetails == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Business Mobile Number Updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Business Mobile Numbed Update, try again'
            ], 201);
        }
    }
    public function editVendorLandline(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $user_id = $request->user_id;
        $data = array('vendor_landline' => $request->v_landline);

        $updateDetails = app(Vendor::class)->updateVendor($user_id, $data);
        if ($updateDetails == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Business Landline Updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Landline Update, try again'
            ], 201);
        }
    }
    public function editVendorEmail(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $user_id = $request->user_id;
        $data = array('vendor_emaile' => $request->v_email);

        $updateDetails = app(Vendor::class)->updateVendor($user_id, $data);
        if ($updateDetails == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Business Email Updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Email Update, try again'
            ], 201);
        }
    }
    public function editVendorStreetAddress(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $user_id = $request->user_id;
        $data = array('vendor_address_street' => $request->v_streetAddress);

        $updateDetails = app(Vendor::class)->updateVendor($user_id, $data);
        if ($updateDetails == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Business Address Updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Address Update, try again'
            ], 201);
        }
    }
    public function editVendorStreetNumber(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $user_id = $request->user_id;
        $data = array('vendor_address_number' => $request->v_streetNumber);

        $updateDetails = app(Vendor::class)->updateVendor($user_id, $data);
        if ($updateDetails == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Business Address Number Updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Address Number Update, try again'
            ], 201);
        }
    }
    public function editVendorSuburb(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $user_id = $request->user_id;
        $data = array('vendor_address_suburb' => $request->v_suburb);

        $updateDetails = app(Vendor::class)->updateVendor($user_id, $data);
        if ($updateDetails == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Business Suburb Updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Suburb Update, try again'
            ], 201);
        }
    }
    public function editVendorPostCode(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $user_id = $request->user_id;
        $data = array('vendor_address_postcode' => $request->v_postcode);

        $updateDetails = app(Vendor::class)->updateVendor($user_id, $data);
        if ($updateDetails == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Business Postcode Updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Postcode Update, try again'
            ], 201);
        }
    }
    public function editVendorWebsite(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $user_id = $request->user_id;
        $data = array('vendor_website' => $request->v_website);

        $updateDetails = app(Vendor::class)->updateVendor($user_id, $data);
        if ($updateDetails == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Business Website Updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Business Website Update, try again'
            ], 201);
        }
    }
    public function editVendorAbout(Request $request)
    {
        $vendor_id = $request->vendor_id;
        $user_id = $request->user_id;
        $data = array('about' => $request->v_about);

        $updateDetails = app(Vendor::class)->updateVendor($user_id, $data);
        if ($updateDetails == true) {
            return response()->json([
                'status' => 'Good',
                'message' => 'Business Description Updated'
            ], 201);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Failed Description Update, try again'
            ], 201);
        }
    }

    //end vendor details
}
