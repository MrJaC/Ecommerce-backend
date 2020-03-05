<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Vendor extends Model
{
    public function getVendors(){
        $vendor = DB::table('vendors')->select(
            'vendors.id AS vendorID',
            'vendors.vendor_logo',
            'vendors.vendor_business_name',
            'vendors.user_id',
            'vendors.vendor_mobile',
            'vendors.vendor_category',
            'vendors.vendor_subcategory',
            'vendors.vendor_address_street',
            'vendors.vendor_address_number',
            'vendors.vendor_address_suburb',
            'vendors.vendor_address_postcode',
            'vendors.vendor_website',
            'vendors.vendor_email',
            'vendors.vendor_landline',
            'categories.id',
            'categories.cat_name',
            'categories.cat_img',
            'subcategories.sub_id',
            'subcategories.cat_id',
            'subcategories.subcat_name',
            'users.id',
            'users.name',
            'users.email'
        )
        ->leftJoin('categories','vendors.vendor_category', '=', 'categories.id')
        ->leftJoin('subcategories', 'vendors.vendor_subcategory', '=', 'subcategories.sub_id')
        ->leftJoin('users', 'vendors.user_id', '=', 'users.id')->get();
        return $vendor;
    }

    public function getVendorDetail($id){
        $vendor = DB::table('vendors')->select(
            'vendors.id AS vendorID',
            'vendors.vendor_logo',
            'vendors.vendor_business_name',
            'vendors.user_id',
            'vendors.vendor_mobile',
            'vendors.vendor_category',
            'vendors.vendor_subcategory',
            'vendors.vendor_address_street',
            'vendors.vendor_address_number',
            'vendors.vendor_address_suburb',
            'vendors.vendor_address_postcode',
            'vendors.vendor_website',
            'vendors.vendor_email',
            'vendors.vendor_landline',
            'categories.id',
            'categories.cat_name',
            'categories.cat_img',
            'subcategories.sub_id',
            'subcategories.cat_id',
            'subcategories.subcat_name',
            'users.id',
            'users.name',
            'users.email'
        )
        ->leftJoin('categories','vendors.vendor_category', '=', 'categories.id')
        ->leftJoin('subcategories', 'vendors.vendor_subcategory', '=', 'subcategories.sub_id')
        ->leftJoin('users', 'vendors.user_id', '=', 'users.id')
        ->where('vendors.id', '=', $id)
        ->get();
        return $vendor;
    }
    public function deleteVendor($id){
        $vendor = DB::table('vendors')->where('id', $id)->delete();

        return $vendor;
    }
}
