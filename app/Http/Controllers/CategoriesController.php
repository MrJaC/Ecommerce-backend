<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
class CategoriesController extends Controller
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
     * Show the categories.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       //get data
       $cat = app(Categories::class)->getCat();

        return view('categories/categories', ['category' => $cat]);
    }
    public function create()
    {
        return view('categories/create-category');
    }
    public function add(Request $request){

        $catName = $request->input('cat-name');
        $path = $request->file('cat-img')->store('public/cat');
        $fileName = str_replace("public/cat/", "", $path);
        $data = array(
            'cat_name' => $catName,
            'cat_img' => $fileName
        );
        $q = app(Categories::class)->addCat($data);
        if($q == true){
            return redirect('/categories')->with('message', 'Category added');
        }
        else{
            return back()->with('message', 'Failed category add');
        }

    }

    public function catEdit($id, $name){

      return view('categories/edit-category', ['id' => $id ,'name' => $name]);
    }
    public function update(Request $request){

        error_log(print_r($request->id,true));
        $data = array(
            'cat_name' => $request->input('cat-name')

        );
        $q = app(Categories::class)->editCat($request->id,$data);
        if($q == true){
            return redirect('/categories')->with('message', 'Category updated');
        }
        else{
            return back()->with('message', 'Failed category update');
        }
    }
    public function delete(Request $request)
    {
        $q = app(Categories::class)->deleteCat($request->id);
        if($q == true){
            return redirect('/categories')->with('message', 'Category deleted');
        }
        else{
            return back()->with('message', 'Failed category delete');
        }
    }
}
