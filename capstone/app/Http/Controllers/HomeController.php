<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;


class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function index()
    {
        //$cat = Category::all();
        $cat = Category::orderBy('name','ASC')->paginate(10);
        $items = Item::orderBy('title','ASC')->paginate(10);
        return view('product.productIndex')->with('items', $items)->with('cat',$cat);
    }
    public function index2()
    {
        return view('home2');
    }
}
