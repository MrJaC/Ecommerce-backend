<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
class SubCategories extends Model
{
    public function add($data){

        $query = DB::table('subcategories')->insert($data);
        if($query){
            return true;
        }
        else{
            return false;
        }

    }
    public function getData(){
        $data = DB::table('subcategories AS subcat')
        ->leftJoin('categories AS cat', 'subcat.cat_id', '=','cat.id')
        ->get();
        error_log(print_r($data,true));
        return $data;
    }
    public function getCurrData($id){
        $data = DB::table('subcategories AS subcat')
        ->leftJoin('categories AS cat', 'subcat.cat_id', '=','cat.id')
        ->where('subcat.sub_id', '=' , $id)
        ->get();

        return $data;
    }
    public function editSubCat($id,$data){
        $subcat = DB::table('subcategories')->where('sub_id', $id)->update($data);
        return $subcat;

    }
}
