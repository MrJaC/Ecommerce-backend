<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Subcategories;
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
        $prod = app(Products::class)->getProducts();
        return view('products/products', ['products' => $prod]);
    }
    public function create()
    {
        $cat = app(Categories::class)->getCat();
        $subcat = app(SubCategories::class)->getData();
        return view('products/create-products', ['category' => $cat, 'subcategory' => $subcat]);
    }
    public function add(Request $request)
    {
        $prodName = $request->input('product-name');
        $prodPrice = $request->input('product-price');
        $prodCat = $request->input('prod-cat');
        $prodSubcat = $request->input('prod-subcat');
        $prodDescription = $request->input('description');
        $prodSky = $request->input('product-sku');
        $prodStock = $request->input('product-stock');
        $path = $request->file('product-main-image')->store('main-images');
        /*if ($files = $request->file('product-main-image')) {
            $destinationPath = 'public/images/'; // upload path
            $imageProductName = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imageProductName);
         }*/

        //get user auth id

        $id = Auth::id();
        $data = array(
            'product_name' => $prodName,
            'product_price' => $prodPrice,
            'product_cat' => $prodCat,
            'product_subcat' => $prodSubcat,
            'product_description' => $prodDescription,
            'product_sku' => $prodSky,
            'product_main_image' => $path,
            'product_amount' => $prodStock,
            'user_id' => $id
        );
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
        $data = array(
            'product_name' => $prodName,
            'product_price' => $prodPrice,
            'product_cat' => $prodCat,
            'product_subcat' => $prodSubcat,
            'product_description' => $prodDescription,
            'product_sku' => $prodSky,
            //'product_main_image' => $path,
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
        return view('products/gallery', [
            'id' => $id,
            'name' => $name,
            'currentprod' => $curProd
        ]);
    }
    public function addImage($id, $name){
        return view('products/gallery-add', [
            'id' => $id,
            'name' => $name,
        ]);
    }
    public function view($id, $name)
    {

        $curProd = app(Products::class)->getCurrProducts($id);

        error_log(print_r($curProd, true));
        return view('products/product-view', [
            'id' => $id,
            'name' => $name,
            'currentprod' => $curProd
        ]);
    }
    public function displayImage($filename)
    {
        $path = app(Storage::get('storage/'.$filename));



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
