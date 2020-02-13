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
        $data = DB::table('subcategories')
        ->leftJoin('categories', 'subcategories.cat_id', '=','categories.id')
        ->get();
        return $data;
    }
}
