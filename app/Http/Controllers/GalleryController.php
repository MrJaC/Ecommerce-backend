<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;



class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //crud

    public function delete(Request $request)
    {
        $id = $request->product_id;
        $name = $request->name;

        error_log((print_r($id,true)));
        error_log((print_r($name,true)));
        //delete gallery item
        if (app(Gallery::class)->deleteImage($request->id) == true) {
            return redirect()->route('products.product-gallery', ['id' => $id, 'name' => $name])->with('message', 'Gallery Image Deleted');
        } else {
            return back()->with('message', 'Error GD1: Cannot delete');
        }
    }
    public function addImage(Request $request)
    {

        $id = $request->id;
        $name = $request->name;

        $path = $request->file('gallery-image')->store('public/main-images/product-gallery');
        $fileName = str_replace("public/main-images/product-gallery/", "", $path);


        $data = array(
            'product_id' => $id,
            'product_img' => $fileName
        );

        $q = app(Gallery::class)->addImage($data);
        if ($q == true) {
            return redirect()->route('products.product-gallery', ['id' => $id, 'name' => $name])->with('message', 'Gallery Image Added');
        } else {
            return back()->with('message', 'Failed Image upload');
        }
    }
}
