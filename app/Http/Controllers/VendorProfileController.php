<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Subcategories;
use App\VendorProfile;
use App\Gallery;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class VendorProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $cat = app(Categories::class)->getCat();
        $subcat = app(SubCategories::class)->getData();


        return view(
            'vendor-profile/vendor-profile',
            [
                'category' => $cat,
                'subcategory' => $subcat
            ]
        );
    }
    public function add(Request $request)
    {
        //get user id
        $id = Auth::id();

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
            return redirect('/')->with('message');
        } else {
            return back()->with('message', 'Error occured VP1');
        }
    }

    //vendor gallery functions
    public function addVendorGalleryImage(Request $request)
    {
        $id = $request->id;
        $name = $request->name;

        $path = $request->file('vendor-gallery-image')->store('public/vendor/vendor-gallery');
        $fileName = str_replace("public/vendor/vendor-gallery", "", $path);


        $data = array(
            'vendor_id' => $id,
            'vendor_img' => $fileName
        );

        $q = app(Gallery::class)->addImage($data);
        if ($q == true) {
            return redirect()->route('products.product-gallery', ['id' => $id, 'name' => $name])->with('message', 'Gallery Image Added');
        } else {
            return back()->with('message', 'Failed Image upload');
        }
    }
    public function deleteVendorGalleryImage(Request $request)
    {
    }

    //end vendor gallery functions
}
