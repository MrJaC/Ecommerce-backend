<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Vendor;
use App\Categories;
use App\Subcategories;
use App\VendorProfile;
use App\Customers;

class VendorProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //get vendor products
    public function index($id, $name)
    {
        //get vendor products
        $vendorProducts = app(Vendor::class)->getMyVendorProducts($id);
        error_log(print_r($vendorProducts,true));
        //return view
        return view(
            'vendors/product-details/admin/vendor-products',
            [
                'id' => $id,
                'name' => $name,
                'vendor_products' => $vendorProducts
            ]
        );
    }


}
