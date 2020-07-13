<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Gallery extends Model
{
    //Product Gallery Functions

    public function deleteImage($id){
        $q = DB::table('product_gallery')->where('id', $id)->delete();

        if($q){
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
    //End Product Gallery Functions

    //Vendor Gallery Functions
    public function deleteVendorGalleryImage($id){
        $q = DB::table('vendor_gallery')->where('ven_gal_id', $id)->delete();

        if($q){
            return true;
        }
        else{
            return false;
        }
    }
    public function addVendorGalleryImage($data){
        $query = DB::table('vendor_gallery')->insert($data);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }
    public function getVendorGallery($id){
        $prod = DB::table('vendor_gallery')->where('ven_gal_id', '=', $id)->get();

        return $prod;
    }
    //End Vendor Gallery Functions
}
