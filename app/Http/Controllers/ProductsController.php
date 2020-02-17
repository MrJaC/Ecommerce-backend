<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Subcategories;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
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
        return view('products/create-products', ['category' => $cat , 'subcategory' => $subcat]);
    }
    public function add(Request $request){

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
        $q = app(Products::class)->addProd($data);
        return redirect('/products');
    }
}
