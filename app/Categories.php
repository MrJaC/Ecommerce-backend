<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;


class Categories extends Model
{
    public function addCat($data){

        $query = DB::table('categories')->insert($data);
        if($query){
            return true;
        }
        else{
            return false;
        }

    }
    public function getCat(){
        $cat = DB::select('select * from categories');
        return $cat;
    }
    public function editCat($id,$data){
        $cat = DB::table('categories')->where('id', $id)->update($data);
        return $cat;

    }
}
