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

        $path = $request->file('product-main-image')->store('public/main-images');
        /*if ($files = $request->file('product-main-image')) {
            $destinationPath = 'public/images/'; // upload path
            $imageProductName = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imageProductName);
         }*/
        $data = array(
            'product_name' => $prodName,
            'product_price' => $prodPrice,
            'product_cat' => $prodCat,
            'product_subcat' => $prodSubcat,
            'product_description' => $prodDescription,
            'product_sku' => $prodSky,
            'product_main_image' => $path
        );
        //Log::debug('Check', $data);
        error_log(print_r($data, true));
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

        $data = array(
            'product_name' => $prodName,
            'product_price' => $prodPrice,
            'product_cat' => $prodCat,
            'product_subcat' => $prodSubcat
        );
        $q = app(Products::class)->editProduct($request->id, $data);
        return redirect('/products');
    }
    public function delete(Request $request)
    {
        $q = app(Products::class)->deleteProd($request->id);
        return redirect('/products');
    }

    public function gallery()
    {
        return view('products/gallery');
    }
}
