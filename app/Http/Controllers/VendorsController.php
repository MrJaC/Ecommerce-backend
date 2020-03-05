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

class VendorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application vendors.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vendors = app(Vendor::class)->getVendors();

        error_log(print_r($vendors,true));
        return view('vendors/vendors', ['vendors' => $vendors]);
    }
    public function edit($id, $name)
    {
        $cat = app(Categories::class)->getCat();
        $subcat = app(SubCategories::class)->getData();
        $curProd = app(Vendor::class)->getVendorDetail($id);
        $customers = app(Customers::class)->getCustomers();
        error_log(print_r($id,true));
        error_log(print_r('Data',true));
        $data = array('id' => $id,
        'name' => $name,
        'category' => $cat,
        'subcategory' => $subcat,
        'current' => $curProd,
        'customers' => $customers);
        error_log(print_r($data,true));
        return view(
            'vendors/edit-vendor',
            [
                'id' => $id,
                'name' => $name,
                'category' => $cat,
                'subcategory' => $subcat,
                'current' => $curProd,
                'customers' => $customers
            ]
        );
    }
    public function delete(Request $request)
    {
        $v = app(Vendor::class)->deleteVendor($request->id);
        if ($v == true) {
            return redirect('/vendors')->with('message', 'Vendor deleted');
        } else {
            return back()->with('message', 'Failed vendor delete');
        }
    }

    public function create()
    {
        $cat = app(Categories::class)->getCat();
        $subcat = app(SubCategories::class)->getData();
        $customers = app(Customers::class)->getCustomers();
        return view('vendors/create-vendors', [
            'category' => $cat,
            'subcategory' => $subcat,
            'customers' => $customers
        ]);
    }
    public function add(Request $request)
    {
        //get user id
        $id = $request->input('user');

        $vendorName = $request->input('business-name');
        $vendorLandline = $request->input('landline');
        $vendorMobile = $request->input('mobile-number');
        $vendorAStreet = $request->input('address-street');
        $vendorAnumber = $request->input('address-number');
        $vendorASuburb = $request->input('address-suburb');
        $vendorAPstcode = $request->input('address-postcode');
        $vendorCategory = $request->input('prod-cat');
        $vendorSubCategory = $request->input('prod-subcat');
        $vendorWebsite = $request->input('website');
        $vendorEmail = $request->input('email');

        //image logo
        $path = $request->file('business-logo')->store('public/business-logo');
        $fileName = str_replace("public/business-logo/", "", $path);

        $data = array(
            'vendor_logo' => $fileName,
            'vendor_business_name' => $vendorName,
            'user_id' => $id,
            'vendor_mobile' => $vendorMobile,
            'vendor_category' => $vendorCategory,
            'vendor_subcategory' => $vendorSubCategory,
            'vendor_address_street' => $vendorAStreet,
            'vendor_address_number' => $vendorAnumber,
            'vendor_address_suburb' => $vendorASuburb,
            'vendor_address_postcode' => $vendorAPstcode,
            'vendor_website' => $vendorWebsite,
            'vendor_email' => $vendorEmail,
            'vendor_landline' => $vendorLandline
        );
        $q = app(VendorProfile::class)->add($data);

        if ($q == true) {
            return redirect('/vendors')->with('message', 'Created Vendor');
        } else {
            return back()->with('message', 'Error occured VP2');
        }
    }
}
