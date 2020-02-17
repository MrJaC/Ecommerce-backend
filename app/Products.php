<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Products extends Model
{
    public function getProducts(){
        $prod = DB::select('select * from products');
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
}
