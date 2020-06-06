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
        $data = DB::Table('subcategories')->select(
            'subcategories.sub_id',
            'subcategories.cat_id',
            'subcategories.subcat_name',
            'subcategories.image',
            'categories.id',
            'categories.cat_name',
            'categories.cat_img'
        )
        ->leftJoin('categories', 'subcategories.cat_id', '=', 'categories.id')
        ->get();
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
    public function deleteCat($id){
        $subcat = DB::table('subcategories')->where('sub_id', $id)->delete();
        return $subcat;
    }

    public function getSubcats($id){
        $subcat = DB::table('subcategories')->where('cat_id', '=', $id)->get();

        return $subcat;
    }
}
