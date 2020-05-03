<?php

namespace App\Http\Controllers;
use App\Category;
use App\Item;
use App\items_sold;
use App\order_info;
use App\shopping_cart;
use Image;
use Storage;
use Session;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cat = Category::all();
        $cat = Category::orderBy('name','ASC')->paginate(10);
        $items = Item::orderBy('title','ASC')->paginate(10);
        return view('product.productIndex')->with('items', $items)->with('cat',$cat);
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        $cat = Category::orderBy('name','ASC')->paginate(10);
        $categozied = Item::where('category_id', $id)->get();
        //$item = Item::find($id);
        return view('product.productIndex')->with('cat', $cat)->with('items',$categozied)->with('categozied',$categozied);
    }
    public function detail($id)
    {
        $cat = Category::orderBy('name','ASC')->paginate(10);
        //$categozied = Item::where('category_id', $id)->get();
        $item = Item::find($id);
        return view('product.details')->with('cat', $cat)->with('item',$item);
    }

    

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function check_order(Request $request)
    { 
        //dd(storage_path());;
        //validate the data
        // if fails, defaults to create() passing errors
        $session_id = Session::getId();
        $this->validate($request, ['firstName'=>'required|string|max:255',
                                    'lastName'=>'required|string|max:255',
                                   'phone'=>'required|numeric',
                                   'email'=>'required|string|max:255']); 

        //send to DB (use ELOQUENT)
        $order = new order_info;
        $order->firstName = $request->firstName;
        $order->lastName = $request->lastName;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->session_id = $session_id;
        

        $order->save(); //saves to DB
        //$order_id = order_info::where('session_id', $session_id)->where('email',$request->email)->where('phone',$request->phone)->get();
        
        Session::flash('success','The order has been added');

        //$shopId = shopping_cart::find($request->cart_id);
        //$cart = shopping_cart::where('item_id', $request->cart_id)->get();
        $session_id = Session::getId();
        $ip = Session::get('ip');
        $cart = shopping_cart::where('session_id', $session_id)->where('ip',$ip)->get();
      
        //$cart = shopping_cart::all();
        foreach ($cart as $data){
            $sold = new items_sold;
            $sold->item_id = $data->item_id;

            $item = Item::find($data->item_id);
            $sold->price = $item->price;
            $sold->squantity = $data->uquantity;
            $sold->order_id = $order->id;
            $sold->save();
            $data->delete();
        }
        //dd($cart);

        //redirect
        return redirect()->route('products.thankyou', $order->id);
    }


    public function thankyou($id, Request $request)
    {
       $session_id = $request->session()->getID();

       //dd($session_id);
       // $ip = Session::get('ip');
        if ($session_id == ""){
            Session::flash('success','Expired Session');
            return redirect()->route('products.index'); 
            //return view('product.productIndex'); 
        }else {
        //     $item = Item::where('session_id',$session_id);
        //     $number = 0;
        //    //$list_items= items_sold::where('item_id', $id)->get();
        //    foreach ($item as $items){
        //         $items_ordered = items_sold::where('item_id', $items->id)->get();
        //         //$item_cost = $items_ordered->price;
        //         $items_ordered_name = Item::where('id', $items_ordered->id)->get();
        //         //$item_name = $items_ordered_name->title;
        //         $cust_detail = order_info::where('id', $items_ordered->order_id)->get();
                
                
        //    }
           $order = order_info::where('id',$id)->first();
           //dd($order);
           $sold = items_sold::where('order_id',$id)->get();
           //$sold1 = Item::where('id',$sold->item_id)->get();
        //    foreach ($sold1 as $sold2){
        //        $item_name = Item::where('id',$sold2->item_id)->get();
        //    }
           //dd($sold);
           $number =0;
           $sum =0;


        //    Session::forget();
        //    Session::flush();
        //    session_unset( $session_id );
            $request->session()->regenerate();
        
           //return view('product.thankyou')->with('items_ordered ',$items_ordered)->with('items_ordered_name ',$items_ordered_name)->with('cust_detail',$cust_detail)->with('number',$number); 
           return view('product.thankyou')->with('items_ordered',$sold)->with('order',$order)->with('number',$number)->with('sum',$sum);

           //dd('there');
           //return view('product.thankyou');
        }

    }
        
    //}

    public function view_order()
    {
        $viewOrder= items_sold::all(); 
        //dd($viewOrder);

        return view('product.vieworder')->with('viewOrder',$viewOrder);
    }

    public function destroy($id)
    {
        //
    }

   
}
