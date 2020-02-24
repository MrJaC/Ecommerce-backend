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


        $request->validate([
            'product_main_image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        $prodName = $request->input('product-name');
        $prodPrice = $request->input('product-price');
        $prodCat = $request->input('prod-cat');
        $prodSubcat = $request->input('prod-subcat');
        $prodDescription = $request->input('description');
        $prodSky = $request->input('product-sku');
        $prodImg = $request->input('product-main-image');


        $data = array(
            'product_name' => $prodName,
            'product_price' => $prodPrice,
            'product_cat' => $prodCat,
            'product_subcat' => $prodSubcat,
            'product_description' => $prodDescription,
            'product_sku' => $prodSky,
            'product_main_image' => $prodImg
        );
        $q = app(Products::class)->addProd($data);
        return redirect('/products');
    }
    public function edit($id, $name){
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
    public function update(Request $request){

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
        $q = app(Products::class)->editProduct($request->id,$data);
        return redirect('/products');
      }
      public function delete(Request $request)
      {
          $q = app(Products::class)->deleteProd($request->id);
          return redirect('/products');
      }

      public function gallery(){
          return view('products/gallery');
      }
}
