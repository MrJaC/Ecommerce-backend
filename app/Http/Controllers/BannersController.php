<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
class BannersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $data = app(Banners::class)->getBanners();

        return view('banners/banners', ['data' => $data]);
    }
    public function add(Request $request){

        $bannerName = $request->input('banner-name');

        $path = $request->file('banner-item')->store('public/banners');
        $fileName = str_replace("public/banners/", "", $path);

        $data = array(
            'banner_name' => $bannerName,
            'banner_image' => $fileName
        );

        $q = app(Banners::class)->addData($data);
        if ($q == true) {
            return redirect('/banners')->with('message', 'Added Banner');
        } else {
            return back()->with('message', 'Error occured B1');
        }

    }
    public function delete(Request $request){
        $banner = app(Banners::class)->deleteBanner($request->id);
        if ($banner == true) {
            return redirect('/banners')->with('message', 'Delete Banner');
        } else {
            return back()->with('message', 'Error occured B2');
        }
    }
}
