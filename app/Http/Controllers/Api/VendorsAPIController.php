<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendor;
use App\Categories;
use App\Subcategories;
use App\VendorProfile;
use App\Customers;
class VendorsAPIController extends Controller
{
    public function index()
    {
        $vendors = app(Vendor::class)->getVendors();


        return response()->json($vendors);
    }
}
