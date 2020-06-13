<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
class Banners extends Model
{
    public function getBanners(){
        $ban = DB::select('select * from banners');

        return $ban;
    }
    public function addData($data){
        $q = DB::table('banners')->insert($data);
        if($q){
            return true;
        }
        else{
            return false;
        }
    }
    public function deleteBanner($id){
        $banner = DB::table('banners')->where('id', $id)->delete();

        if($banner){
            return true;
        }
        else{
            return false;
        }
    }
}
