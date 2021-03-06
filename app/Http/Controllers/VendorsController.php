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
use App\Gallery;

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

        error_log(print_r($vendors, true));
        return view('vendors/vendors', ['vendors' => $vendors]);
    }
    public function edit($id, $name)
    {
        $cat = app(Categories::class)->getCat();
        $subcat = app(SubCategories::class)->getData();
        $curProd = app(Vendor::class)->getVendorDetail($id);
        $customers = app(Customers::class)->getCustomers();
        $gallery  = app(Gallery::class)->getVendorGallery($id);
        error_log(print_r($id, true));
        error_log(print_r('Data', true));
        $data = array(
            'id' => $id,
            'name' => $name,
            'category' => $cat,
            'subcategory' => $subcat,
            'current' => $curProd,
            'customers' => $customers
        );
        error_log(print_r($data, true));
        return view(
            'vendors/edit-vendor',
            [
                'id' => $id,
                'name' => $name,
                'category' => $cat,
                'subcategory' => $subcat,
                'current' => $curProd,
                'customers' => $customers,
                'gallery' => $gallery
            ]
        );
    }

    public function documents($id, $name)
    {

        $data = app(Vendor::class)->getDocuments($id);
        error_log(print_r($data, true));


        return view(
            'vendors/documents',
            [
                'name' => $name,
                'id' => $id,
                'data' => $data
            ]
        );
    }
    public function documentAdd(Request $request)
    {

        $curProd = app(Vendor::class)->getVendorDetail($request->id);

        $docName = $request->input('document-name');
        $docDesc = $request->input('document-description');
        $docItem = $request->input('document-item');
        //image logo
        $path = $request->file('document-item')->store('public/vendor/vendor-documents');
        $fileName = str_replace("public/vendor/vendor-documents/", "", $path);
        $document = array(
            'vendor_id' => $request->id,
            'user_id' => $curProd[0]->user_id,
            'document_description' => $docDesc,
            'document_name' => $docName,
            'document_location' => $fileName,
        );
        $q = app(Vendor::class)->addDocumentData($document);
        if ($q == true) {
            return redirect()->route('vendors.documents', ['id' => $request->id, 'name' => $curProd[0]->vendor_business_name])->with('message', 'Added document');
        } else {
            return back()->with('message', 'Error occured D1');
        }
    }
    public function documentDelete(Request $request)
    {
        $doc = app(Vendor::class)->deleteDocument($request->id);
        $curProd = app(Vendor::class)->getVendorDetail($request->venID);
        if ($doc == true) {
            return redirect()->route('vendors.documents', ['id' => $request->id, 'name' => $curProd[0]->vendor_business_name])->with('message', 'Deleted document');
        } else {
            return back()->with('message', 'Error occured D2');
        }
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

    public function update(Request $request)
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
        $fileName = "";
        //image logo

        if ($request->file('business-logo') != null) {
            $path = $request->file('business-logo')->store('public/business-logo');
            $fileName = str_replace("public/business-logo/", "", $path);
        } else {
            $curProd = app(Vendor::class)->getVendorDetail($request->id);
            foreach ($curProd as $cur) {
                $fileName = $cur->vendor_logo;
            }
        }


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
        error_log(print_r('update', true));
        error_log(print_r($data, true));
        $q = app(Vendor::class)->updateVendor($request->id, $data);

        if ($q == true) {
            return redirect('/vendors')->with('message', 'Updated Vendor');
        } else {
            return back()->with('message', 'Error occured V3');
        }
    }

    //approval methods
    public function vendorApproved()
    {

        $vendors = app(Vendor::class)->getAppVendors();

        return view('vendors/status/approved', ['vendors' => $vendors]);
    }
    public function vendorPending()
    {
        $vendors = app(Vendor::class)->getPenVendors();

        return view('vendors/status/pending', ['vendors' => $vendors]);
    }
    public function vendorRejected()
    {
        $vendors = app(Vendor::class)->getRejVendors();

        return view('vendors/status/rejected', ['vendors' => $vendors]);
    }
    public function approve(Request $request)
    {
        $vendor_id = $request->id;
        $approval_status = 2;
        $data = array(
            'approval_status' => $approval_status
        );

        if (app(Vendor::class)->updateStatus($vendor_id, $data) == true) {
            return redirect('/vendors')->with('message', 'Status updated');
        } else {
            return back()->with('message', 'Error status could not be updated EVApprove_1');
        }
    }
    public function deny(Request $request)
    {

        $vendor_id = $request->id;
        $approval_status = 3;
        $data = array(
            'approval_status' => $approval_status
        );

        if (app(Vendor::class)->updateStatus($vendor_id, $data) == true) {
            return redirect('/vendors')->with('message', 'Status updated');
        } else {
            return back()->with('message', 'Error status could not be updated EVApprove_2');
        }
    }
    public function pending(Request $request)
    {

        $vendor_id = $request->id;
        $approval_status = 0;
        $data = array(
            'approval_status' => $approval_status
        );

        if (app(Vendor::class)->updateStatus($vendor_id, $data) == true) {
            return redirect('/vendors')->with('message', 'Status updated');
        } else {
            return back()->with('message', 'Error status could not be updated EVApprove_3');
        }
    }
}
