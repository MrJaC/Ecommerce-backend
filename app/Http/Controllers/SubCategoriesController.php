<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\SubCategories;
use Illuminate\Support\Facades\Log;
class SubCategoriesController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the subcategories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = app(SubCategories::class)->getData();
       // Log::debug('Data');
        return view('subcategories/subcategories', ['subcategories' => $data]);
    }
    public function create()
    {
        //get cat data

        $cat = app(Categories::class)->getCat();

        return view('subcategories/create-subcategory', ['catgeory' => $cat]);
    }
    public function add(Request $request){

        $catid = $request->input('cat-id');
        $subcat = $request->input('subcat-name');

        $data = array(
            'cat_id' => $catid,
            'subcat_name' =>$subcat
        );
        $q = app(SubCategories::class)->add($data);
        Log::debug('Data', $data);
        return redirect('/subcategories');
    }
}
