<?php

namespace App\Http\Controllers;

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

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        if (Auth::user()->role == 1) {
            $prod = app(Products::class)->getProducts();
            return view('products/products', ['products' => $prod]);
        } elseif (Auth::user()->role == 4) {
            $vendorID = app(Vendor::class)->getUserVendor($id);
            $prod = app(Vendor::class)->getMyVendorProducts($vendorID[0]->vendorID);
            error_log(print_r($prod, true));
            return view('products/products', ['products' => $prod]);
        }
    }
    public function create()
    {
        $cat = app(Categories::class)->getCat();
        $subcat = app(SubCategories::class)->getData();
        $vendors = app(Vendor::class)->getVendors();

        $id = Auth::id();
        $vendorID = app(Vendor::class)->getUserVendor($id);
        error_log(print_r($vendorID, true));
        return view('products/create-products', ['category' => $cat, 'subcategory' => $subcat, 'vendors' => $vendors]);
    }
    public function add(Request $request)
    {
        $prodName = $request->input('product-name');
        $prodPrice = $request->input('product-price');
        $prodCat = $request->input('prod-cat');
        $prodSubcat = $request->input('prod-subcat');
        $prodDescription = $request->input('description');
        $prodSky = $request->input('product-sku');
        $prodExcerpt = $request->input('excerpt');
        $prodStock = $request->input('product-stock');
        $vendor = $request->input('vendor');
        $path = $request->file('product-main-image')->store('public/main-images');
        $fileName = str_replace("public/main-images/", "", $path);


        $id = Auth::id();
        $vendorID = app(Vendor::class)->getUserVendor($id);

        if (Auth::user()->role == 4) {
            $data = array(
                'product_name' => $prodName,
                'product_price' => $prodPrice,
                'product_cat' => $prodCat,
                'product_subcat' => $prodSubcat,
                'product_description' => $prodDescription,
                'product_excerpt' => $prodExcerpt,
                'product_sku' => $prodSky,
                'product_main_image' => $fileName,
                'product_amount' => $prodStock,
                'user_id' => $id,
                'vendor_id' => $vendorID[0]->vendorID
            );
        } else {
            $data = array(
                'product_name' => $prodName,
                'product_price' => $prodPrice,
                'product_cat' => $prodCat,
                'product_subcat' => $prodSubcat,
                'product_description' => $prodDescription,
                'product_excerpt' => $prodExcerpt,
                'product_sku' => $prodSky,
                'product_main_image' => $fileName,
                'product_amount' => $prodStock,
                'user_id' => $id,
                'vendor_id' => $vendor
            );
        }

        //Log::debug('Check', $data);

        $q = app(Products::class)->addProd($data);

        if ($q == true) {
            return redirect('/products')->with('message', 'Product added');
        } else {
            return back()->with('message', 'Failed product add');
        }
        //return redirect('/products');
    }
    public function edit($id, $name)
    {
        $cat = app(Categories::class)->getCat();
        $subcat = app(SubCategories::class)->getData();
        $curProd = app(Products::class)->getCurrProducts($id);

        return view('products/edit-products', [
            'id' => $id,
            'name' => $name,
            'categories' => $cat,
            'subcategories' => $subcat,
            'currentprod' => $curProd
        ]);
    }
    public function update(Request $request)
    {

        $prodName = $request->input('product-name');
        $prodPrice = $request->input('product-price');
        $prodCat = $request->input('prod-cat');
        $prodSubcat = $request->input('prod-subcat');
        $prodDescription = $request->input('description');
        $prodSky = $request->input('product-sku');
        $prodStock = $request->input('product-stock');
        $path = $request->file('product-main-image')->store('public/main-images');
        $fileName = str_replace("public/main-images/", "", $path);
        $data = array(
            'product_name' => $prodName,
            'product_price' => $prodPrice,
            'product_cat' => $prodCat,
            'product_subcat' => $prodSubcat,
            'product_description' => $prodDescription,
            'product_sku' => $prodSky,
            'product_main_image' => $fileName,
            'product_amount' => $prodStock,
        );
        $q = app(Products::class)->editProduct($request->id, $data);
        return redirect('/products');
    }
    public function delete(Request $request)
    {
        $q = app(Products::class)->deleteProd($request->id);
        if ($q == true) {
            return redirect('/products')->with('message', 'Product deleted');
        } else {
            return back()->with('message', 'Failed product delete');
        }
    }

    public function gallery($id, $name)
    {
        $curProd = app(Products::class)->getCurrProducts($id);
        $imageGallery = app(Products::class)->getProductImages($id);
        return view('products/gallery', [
            'id' => $id,
            'name' => $name,
            'currentprod' => $curProd,
            'gallery' => $imageGallery
        ]);
    }
    public function addImage($id, $name)
    {
        return view('products/gallery-add', [
            'id' => $id,
            'name' => $name
        ]);
    }
    public function view($id, $name)
    {

        $curProd = app(Products::class)->getCurrProducts($id);
        $imageGallery = app(Products::class)->getProductImages($id);
        error_log(print_r($curProd, true));
        return view('products/product-view', [
            'id' => $id,
            'name' => $name,
            'currentprod' => $curProd,
            'gallery' => $imageGallery
        ]);
    }
    public function imageUpload(Request $request)
    {

        $path = $request->file('gallery-image')->store('public/main-images');
        $fileName = str_replace("public/main-images/", "", $path);


        $data = array(
            'product_id' => $request->id,
            'product_img' => $fileName
        );

        $q = app(Products::class)->addImage($data);
        if ($q == true) {
            return redirect('/products')->with('message', 'Product Image added');
        } else {
            return back()->with('message', 'Failed Image upload');
        }
    }

    // Featured Products
    public function isFeatured(Request $request)
    {
        $item = $request->item;
        error_log(print_r($item,true));
        $name = $request->name;
        $id = $request->id;
        $data = array(
            'featured_prod' => $item
        );
        if (app(Products::class)->updateFeatured($id, $data) == true) {
            $message = $name . ' is now featured';
            return redirect('/products')->with('message', $message);
        } else {
            return back()->with('message', 'Error status could not be updated Prod_ERROR_FEATURE');
        }
    }


    // End Featured Products
    //defunct
    public function displayImage($filename)
    {
        $path = app(Storage::get('storage/' . $filename));



        if (!File::exists($path)) {

            abort(404);
        }



        $file = File::get($path);

        $type = File::mimeType($path);



        $response = Response::make($file, 200);

        $response->header("Content-Type", $type);



        return $response;
    }
}
