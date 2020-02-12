<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
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
        return view('categories/categories');
    }
    public function create()
    {
        return view('categories/create-category');
    }
    public function add(){

        $data = array(
            'cat_name' =>
        )
        return
    }
}
