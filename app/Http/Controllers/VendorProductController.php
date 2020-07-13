<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Vendor;
use App\Categories;
use App\Subcategories;
use App\VendorProfile;
use App\Customers;
use App\Products;

class VendorProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //get vendor products
    public function index($id, $name)
    {
        //get vendor products
        $vendorProducts = app(Vendor::class)->getMyVendorProducts($id);
        error_log(print_r($vendorProducts, true));
        //return view
        return view(
            'vendors/product-details/admin/vendor-products',
            [
                'id' => $id,
                'name' => $name,
                'vendor_products' => $vendorProducts
            ]
        );
    }
    // Vendor specific creation
    public function createVendorProduct($id, $name)
    {


        $cat = app(Categories::class)->getCat();
        $subcat = app(SubCategories::class)->getData();


        return view(
            'products/vendor/admin/products/create-product',
            [
                'id' => $id,
                'name' => $name,
                'category' => $cat,
                'subcategory' => $subcat,
            ]
        );
    }
    public function addVendorProduct(Request $request, $id, $name)
    {

        //assign all inputs to vars

        $prodName = $request->input('product-name');
        $prodPrice = $request->input('product-price');
        $prodCat = $request->input('prod-cat');
        $prodSubcat = $request->input('prod-subcat');
        $prodDescription = $request->input('description');
        $prodExcerpt = $request->input('excerpt');
        $prodSku = $request->input('product-sku');
        $prodStock = $request->input('product-stock');
        //$vendor = $request->input('vendor');

        $path = $request->file('product-main-image')->store('public/main-images');
        $fileName = str_replace("public/main-images/", "", $path);

        //get vendor id
        //$vendorID = app(Vendor::class)->getUserVendor($id);
        $data = array(
            'product_name' => $prodName,
            'product_price' => $prodPrice,
            'product_cat' => $prodCat,
            'product_subcat' => $prodSubcat,
            'product_description' => $prodDescription,
            'product_sku' => $prodSku,
            'product_excerpt' => $prodExcerpt,
            'product_main_image' => $fileName,
            'product_amount' => $prodStock,
            'user_id' => $id,
            'vendor_id' => $id
        );
        //add vendor products

        $insertdata = app(Products::class)->addProd($data);




        if ($insertdata == true) {
            return redirect()->route(
                'vendors.ven-details.vendor-products',
                [
                    'id' => $id,
                    'name' => $name
                ]

            )->with('message', 'Added Vendor Product');
        } else {
            return back()->with('message', 'Error adding vendor product VPC_Prod_Add_1');
        }
    }

    public function deleteVendorProduct(Request $request)
    {
        $q = app(Products::class)->deleteProd($request->id);
        if ($q == true) {
            return redirect()->route(
                'vendors.ven-details.vendor-products',
                [
                    'id' => $request->vendor_id,
                    'name' => $request->name
                ]

            )->with('message', 'Product deleted');
        } else {
            return back()->with('message', 'Failed Product delete');
        }
    }
    public function updateVendorProduct()
    {
    }
}
