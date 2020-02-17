<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

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

        $data = array(
            'cat_name' => $catName
        );
        $q = app(Categories::class)->addCat($data);
        return redirect('/categories');
    }
    public function delete(Request $request){
        $urId = $request;
        echo route('delete.id', ['id' => 1]);
        Log::debug('message');
        Log::debug($urId);
    }

    public function catEdit($id, $name){



      return view('categories/edit-category', ['id' => $id ,'name' => $name]);
    }
    public function update(Request $request, $id){

        error_log(print_r($request->id,true));

        return redirect('/categories');
    }
}
