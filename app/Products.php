<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Products extends Model
{
    public function getProducts(){
        $prod = DB::table('products AS prod')
        ->leftJoin('categories AS cat', 'prod.product_cat', '=', 'cat.id')
        ->leftJoin('subcategories AS sub', 'prod.product_subcat', '=' , 'sub.sub_id')
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
        $q = DB::table('products')->where('id', $id)->delete();
        return $q;
    }
}
