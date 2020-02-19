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
        error_log(print_r($data, true));
        // Log::debug('Data');
        return view('subcategories/subcategories', ['subcategories' => $data]);
    }
    public function create()
    {
        //get cat data

        $cat = app(Categories::class)->getCat();

        return view('subcategories/create-subcategory', ['catgeory' => $cat]);
    }
    public function add(Request $request)
    {

        $catid = $request->input('cat-id');
        $subcat = $request->input('subcat-name');

        $data = array(
            'cat_id' => $catid,
            'subcat_name' => $subcat
        );
        $q = app(SubCategories::class)->add($data);
        Log::debug('Data', $data);
        return redirect('/subcategories');
    }
    public function subCatEdit($id, $name)
    {
        $cat = app(Categories::class)->getCat();
        $curData = app(SubCategories::class)->getCurrData($id);
        error_log(print_r($id,true));
        error_log(print_r('cur',true));
        error_log(print_r($curData,true));
        return view('subcategories/edit-subcategory', ['id' => $id, 'name' => $name, 'categories' => $cat, 'currentCat' => $curData]);
    }
    public function update(Request $request)
    {

        error_log(print_r($request->id, true));
        $data = array(
            'subcat_name' => $request->input('subcat-name'),
            'cat_id' => $request->input('cat-id')

        );
        $q = app(SubCategories::class)->editSubCat($request->id, $data);
        return redirect('/subcategories');
    }
}
