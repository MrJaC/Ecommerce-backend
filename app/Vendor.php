<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Vendor extends Model
{
    public function getVendors()
    {
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
            'vendors.approval_status',
            'vendors.about',
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
            ->leftJoin('categories', 'vendors.vendor_category', '=', 'categories.id')
            ->leftJoin('subcategories', 'vendors.vendor_subcategory', '=', 'subcategories.sub_id')
            ->leftJoin('users', 'vendors.user_id', '=', 'users.id')->get();
        return $vendor;
    }
    public function getAppVendors()
    {
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
            'vendors.approval_status',
            'vendors.about',
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
            ->leftJoin('categories', 'vendors.vendor_category', '=', 'categories.id')
            ->leftJoin('subcategories', 'vendors.vendor_subcategory', '=', 'subcategories.sub_id')
            ->leftJoin('users', 'vendors.user_id', '=', 'users.id')
            ->where('vendors.approval_status', '=', 2)
            ->get();
        return $vendor;
    }
    public function getPenVendors()
    {
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
            'vendors.approval_status',
            'vendors.about',
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
            ->leftJoin('categories', 'vendors.vendor_category', '=', 'categories.id')
            ->leftJoin('subcategories', 'vendors.vendor_subcategory', '=', 'subcategories.sub_id')
            ->leftJoin('users', 'vendors.user_id', '=', 'users.id')
            ->where('vendors.approval_status', '=', 0)
            ->get();
        return $vendor;
    }
    public function getRejVendors()
    {
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
            'vendors.approval_status',
            'vendors.about',
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
            ->leftJoin('categories', 'vendors.vendor_category', '=', 'categories.id')
            ->leftJoin('subcategories', 'vendors.vendor_subcategory', '=', 'subcategories.sub_id')
            ->leftJoin('users', 'vendors.user_id', '=', 'users.id')
            ->where('vendors.approval_status', '=', 3)
            ->get();
        return $vendor;
    }
    public function getVendorDetail($id)
    {
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
            'vendors.approval_status',
            'vendors.about',
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
            ->leftJoin('categories', 'vendors.vendor_category', '=', 'categories.id')
            ->leftJoin('subcategories', 'vendors.vendor_subcategory', '=', 'subcategories.sub_id')
            ->leftJoin('users', 'vendors.user_id', '=', 'users.id')
            ->where('vendors.id', '=', $id)
            ->get();
        return $vendor;
    }
    public function getDocuments($id)
    {
        $documents = DB::table('vendor_documents')->select(
            'vendors.id',
            'vendors.vendor_logo',
            'vendors.vendor_business_name',
            'vendors.user_id',
            'vendor_documents.vendor_doc_id',
            'vendor_documents.vendor_id',
            'vendor_documents.time_created',
            'vendor_documents.document_description',
            'vendor_documents.document_name',
            'vendor_documents.document_location'
        )
            ->leftJoin('vendors', 'vendors.id', '=', 'vendor_documents.vendor_id')
            ->where('vendor_documents.vendor_id', '=', $id)->get();
        return $documents;
    }
    public function getUserVendor($id)
    {
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
            ->leftJoin('categories', 'vendors.vendor_category', '=', 'categories.id')
            ->leftJoin('subcategories', 'vendors.vendor_subcategory', '=', 'subcategories.sub_id')
            ->leftJoin('users', 'vendors.user_id', '=', 'users.id')
            ->where('vendors.user_id', '=', $id)
            ->get();
        return $vendor;
    }
    public function deleteVendor($id)
    {
        $vendor = DB::table('vendors')->where('id', $id)->delete();

        return $vendor;
    }
    public function updateVendor($id, $data)
    {
        $vendor = DB::table('vendors')->where('id', $id)->update($data);
        if ($vendor == true) {
            return true;
        } else {
            return false;
        }
    }
    public function updateMyVendor($id, $data){
        $vendor = DB::table('vendors')->where('user_id', $id)->update($data);
        if ($vendor == true) {
            return true;
        } else {
            return false;
        }
    }
    public function getMyVendorProducts($id)
    {
        $vendor = DB::table('products')
            ->where('vendor_id', '=', $id)
            ->get();
        return $vendor;
    }
    //vendor check
    public function updateStatus($id, $data)
    {
        $vendor = DB::table('vendors')->where('id', $id)->update($data);
        if ($vendor == true) {
            return true;
        } else {
            return false;
        }
    }

    //Document Section
    public function addDocumentData($data)
    {

        if ($q = DB::table('vendor_documents')->insert($data)) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteDocument($id)
    {
        if ($q = DB::table('vendor_documents')->where('vendor_doc_id', $id)->delete()) {
            return true;
        } else {
            return false;
        }
    }
    public function checkDocument($id)
    {
    }
    //End Document Section
    public function checkVendor($id)
    {
        $vendor = DB::table('vendors')
            ->where('user_id', '=', $id)
            ->get();
        return $vendor;
    }
}
