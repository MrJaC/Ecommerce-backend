<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Products extends Model
{
    public function getProducts(){
        $prod = DB::table('products')
        ->select(
            'products.prod_id',
            'products.product_name',
            'products.product_price',
            'products.product_cat',
            'products.product_subcat',
            'products.product_main_image',
            'products.product_sku',
            'products.product_description',
            'products.product_amount',
            'products.vendor_id',
            'products.user_id',
            'categories.id',
            'categories.cat_name',
            'categories.cat_img',
            'subcategories.sub_id',
            'subcategories.cat_id',
            'subcategories.subcat_name',
            'vendors.id AS vendorID',
            'vendors.vendor_business_name'
        )
        ->leftJoin('categories','products.product_cat', '=', 'categories.id')
        ->leftJoin('subcategories', 'products.product_subcat', '=', 'subcategories.sub_id')
        ->leftJoin('vendors', 'products.vendor_id','=', 'vendors.id')
        ->get();
        error_log(print_r($prod,true));
        return $prod;
    }
    public function addProd($data){

        $query = DB::table('products')->insert($data);
        if($query){
            return true;
        }
        else{
            return false;
        }

    }
    public function addImage($data){
        $query = DB::table('product_gallery')->insert($data);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }
    public function getProductImages($id){
        $prod = DB::table('product_gallery')->where('product_id', '=', $id)->get();

        return $prod;
    }
    public function getCurrProducts($id){
        $prod = DB::table('products')
        ->select(
            'products.prod_id',
            'products.product_name',
            'products.product_price',
            'products.product_cat',
            'products.product_subcat',
            'products.product_main_image',
            'products.product_sku',
            'products.product_description',
            'products.product_amount',
            'products.user_id',
            'categories.id',
            'categories.cat_name',
            'categories.cat_img',
            'subcategories.sub_id',
            'subcategories.cat_id',
            'subcategories.subcat_name',
        )
        ->leftJoin('categories','products.product_cat', '=', 'categories.id')
        ->leftJoin('subcategories', 'products.product_subcat', '=', 'subcategories.sub_id')
        ->where('products.prod_id', '=', $id)
        ->get();
        return $prod;
    }
    public function getProdViaSub($subId,$catId){
        $prod = DB::table('products')
        ->select(
            'products.prod_id',
            'products.product_name',
            'products.product_price',
            'products.product_cat',
            'products.product_subcat',
            'products.product_main_image',
            'products.product_sku',
            'products.product_description',
            'products.product_amount',
            'products.user_id',
            'categories.id',
            'categories.cat_name',
            'categories.cat_img',
            'subcategories.sub_id',
            'subcategories.cat_id',
            'subcategories.subcat_name',
        )
        ->leftJoin('categories','products.product_cat', '=', 'categories.id')
        ->leftJoin('subcategories', 'products.product_subcat', '=', 'subcategories.sub_id')
        ->where('products.product_subcat', '=', $subId)
        ->where('products.product_cat', '=' , $catId)
        ->get();
        return $prod;
    }
    public function editProduct($id,$data){
        $prod = DB::table('products')->where('prod_id', $id)->update($data);
        return $prod;
    }
    public function deleteProd($id){
        $q = DB::table('products')->where('prod_id', $id)->delete();
        return $q;
    }
}
