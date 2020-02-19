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
            'categories.id',
            'categories.cat_name',
            'categories.cat_img',
            'subcategories.sub_id',
            'subcategories.cat_id',
            'subcategories.subcat_name',
        )
        ->leftJoin('categories','products.product_cat', '=', 'categories.id')
        ->leftJoin('subcategories', 'products.product_subcat', '=', 'subcategories.sub_id')
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
    public function editProduct($id,$data){
        $prod = DB::table('products')->where('id', $id)->update($data);
        return $prod;
    }
    public function deleteProd($id){
        $q = DB::table('products')->where('prod_id', $id)->delete();
        return $q;
    }
}
